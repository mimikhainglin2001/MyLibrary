<?php
require_once APPROOT . '/middleware/authmiddleware.php';
class BorrowBook extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('BorrowBookModel');
        $this->db = new Database();
    }

    //Borrow Book
    public function borrow()
    {
        try {
            AuthMiddleware::userOnly();

            $user   = $_SESSION['session_loginuser'] ?? null;
            $bookId = $_GET['id'] ?? null;

            // Invalid request
            if (!$user || !$bookId) {
                return $this->failRedirect('Invalid user or book.', 'pages/category');
            }

            date_default_timezone_set('Asia/Yangon');
            $now     = date('Y-m-d H:i:s');
            $dueDate = date('Y-m-d H:i:s', strtotime('+7 days'));

            // Book does not exist
            $book = $this->db->getById('books', $bookId);
            if (!$book) {
                return $this->failRedirect('Book not found.', 'pages/category');
            }

            // Already borrowed this book
            $existingBorrow = $this->db->columnFilter('borrowBook', 'book_id', $bookId);
            if (
                $existingBorrow &&
                $existingBorrow['user_id'] == $user['id'] &&
                $existingBorrow['status'] === 'borrowed'
            ) {
                return $this->failRedirect('You have already borrowed this book.', 'user/history');
            }

            // Already borrowed 2 books
            $firstBorrow = $this->db->columnFilter('borrowBook', 'user_id', $user['id']);
            if ($firstBorrow && $firstBorrow['status'] === 'borrowed') {
                $secondBorrow = $this->db->columnFilter('borrowBook', 'user_id', $user['id']);
                if (
                    $secondBorrow &&
                    $secondBorrow['status'] === 'borrowed' &&
                    $secondBorrow['id'] !== $firstBorrow['id']
                ) {
                    return $this->failRedirect('You have already borrowed 2 books. Please return one.', 'user/history');
                }
            }

            // Create borrow record
            $borrowData = [
                'book_id'     => $bookId,
                'user_id'     => $user['id'],
                'borrow_date' => $now,
                'due_date'    => $dueDate,
                'return_date' => null,
                'renew_date'  => null,
                'status'      => 'borrowed'
            ];

            if (!$this->db->create('borrowBook', $borrowData)) {
                return $this->failRedirect('Failed to borrow book. Please try again later.', 'user/history');
            }

            return $this->successRedirect('Book borrowed successfully.', 'user/history');
        } catch (PDOException $e) {
            return $this->failRedirect($e->getMessage(), 'pages/category');
        } catch (Exception $e) {
            return $this->failRedirect('An unexpected error occurred.', 'pages/category');
        }
    }

    private function failRedirect(string $message, string $location, string $type = 'error')
    {
        setMessage($type, $message);
        redirect($location);
    }

    private function successRedirect(string $message, string $location)
    {
        setMessage('success', $message);
        redirect($location);
    }

    //Return Book
    public function returnBook()
    {
        try {
            AuthMiddleware::userOnly();

            $borrowId = $_GET['id'] ?? null;
            if (!$borrowId) {
                return $this->failRedirect('Invalid request', 'user/history');
            }

            $borrowRecord = $this->db->getById('borrowBook', $borrowId);
            if (!$borrowRecord) {
                return $this->failRedirect('Borrow record not found', 'user/history');
            }

            // Prevent returning a book that's already returned
            if ($borrowRecord['status'] === 'returned') {
                return $this->failRedirect('This book is already returned', 'user/history');
            }

            $returnDate = date('Y-m-d H:i:s');

            if (!$this->db->update('borrowBook', $borrowId, [
                'return_date' => $returnDate,
                'status'      => 'returned'
            ])) {
                return $this->failRedirect('Failed to return book', 'user/history');
            }

            $this->updateReservationQuantity($borrowRecord['book_id']);
            $this->updateBookAvailability($borrowRecord['book_id']);

            return $this->successRedirect('Book returned successfully', 'user/history');
        } catch (PDOException $e) {
            return $this->failRedirect($e->getMessage(), 'user/history');
        } catch (Exception $e) {
            return $this->failRedirect('An unexpected error occurred.', 'user/history');
        }
    }

    private function updateReservationQuantity(int $bookId): void
    {
        try {
            $reservation = $this->db->columnFilter('reservations', 'book_id', $bookId);
            if (!$reservation) {
                return;
            }

            $newQuantity = max(0, (int)$reservation['available_quantity'] + 1);
            $this->db->update('reservations', $reservation['id'], [
                'available_quantity' => $newQuantity
            ]);
        } catch (Exception $e) {
            error_log("Failed to update reservation quantity: " . $e->getMessage());
        }
    }

    private function updateBookAvailability(int $bookId): void
    {
        try {
            $book = $this->db->getById('books', $bookId);
            if (!$book) {
                return;
            }

            $newAvailable = max(0, (int)$book['available_quantity'] + 1);
            $statusDesc   = $newAvailable > 0 ? 'Available' : 'Not Available';

            $this->db->update('books', $bookId, [
                'available_quantity' => $newAvailable,
                'status_description' => $statusDesc
            ]);
        } catch (Exception $e) {
            error_log("Failed to update book availability: " . $e->getMessage());
        }
    }

    //Renew Book
    public function renew()
    {
        try {
            AuthMiddleware::userOnly();

            $borrowId = $_GET['id'] ?? null;
            if (!$borrowId) {
                return $this->failRedirect('Invalid request', 'user/history');
            }

            $borrowRecord = $this->db->getById('borrowBook', $borrowId);
            if (!$borrowRecord || empty($borrowRecord['due_date'])) {
                return $this->failRedirect('Due date not found', 'user/history');
            }

            // Prevent renewing if book is already returned
            if ($borrowRecord['status'] === 'returned') {
                return $this->failRedirect('Cannot renew a returned book', 'user/history');
            }

            $renewCount = (int)($borrowRecord['renew_count'] ?? 0) + 1;
            if ($renewCount > 3) {
                return $this->failRedirect('Maximum number of renewals reached', 'user/history');
            }

            $originalDate = $borrowRecord['renew_date'] ?? $borrowRecord['due_date'];
            $newRenewDate = date('Y-m-d H:i:s', strtotime("$originalDate +7 days"));

            $updated = $this->db->update('borrowBook', $borrowId, [
                'renew_date'  => $newRenewDate,
                'renew_count' => $renewCount,
                'status'      => 'renewed',
            ]);

            if (!$updated) {
                return $this->failRedirect('Failed to renew book', 'user/history');
            }

            return $this->successRedirect('Book renewed successfully', 'user/history');
        } catch (PDOException $e) {
            return $this->failRedirect($e->getMessage(), 'user/history');
        } catch (Exception $e) {
            return $this->failRedirect('An unexpected error occurred.', 'user/history');
        }
    }

    // Check Over due
    public function checkOverdue()
    {
        try {
            AuthMiddleware::adminOnly();

            $today = date('Y-m-d');
            $borrowRecords = $this->db->readAll('borrowBook');

            $overdueRecords = array_filter($borrowRecords, function ($record) use ($today) {
                if (!in_array($record['status'], ['borrowed', 'renewed'])) {
                    return false;
                }

                $dueDate = $record['renew_date'] ?: $record['due_date'];
                if (!$dueDate) {
                    return false;
                }

                return strtotime($dueDate) < strtotime($today);
            });

            foreach ($overdueRecords as $record) {
                $updated = $this->db->update('borrowBook', $record['id'], ['status' => 'overdue']);
                if (!$updated) {
                    error_log("Failed to update borrowBook ID " . $record['id']);
                }
            }
        } catch (PDOException $e) {
            error_log("PDO Exception in checkOverdue: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Exception in checkOverdue: " . $e->getMessage());
        }
    }
}
