<?php
require_once APPROOT . '/middleware/authmiddleware.php';
class BorrowBook extends Controller
{
    private $db;
    public function __construct()
    {
        // AuthMiddleware::userOnly();
        $this->model('BorrowBookModel');
        $this->model('ReservationModel');
        $this->db = new Database();
    }


    //Borrow Book
    public function borrow()
    {
        AuthMiddleware::userOnly();

        $user = $_SESSION['session_loginuser'] ?? null;
        $bookId = $_GET['id'] ?? null;
        if (!$user || !$bookId) {
            return $this->failRedirect('Invalid user or book.', 'pages/category');
        }

        date_default_timezone_set('Asia/Yangon');
        $now = date('Y-m-d H:i:s');
        $dueDate = date('Y-m-d H:i:s', strtotime('+7 days'));

        if (!$this->db->getById('books', $bookId)) {
            return $this->failRedirect('Book not found.', 'pages/category');
        }

        if ($this->db->countBorrowedBooksByUser($user['id']) >= 2) {
            return $this->failRedirect('You have already borrowed 2 books. Please return one.', 'pages/history');
        }

        if ($this->db->hasUserBorrowedBook($user['id'], $bookId)) {
            return $this->failRedirect('You have already borrowed this book.', 'pages/history');
        }

        $borrowData = [
            'book_id'     => $bookId,
            'user_id'     => $user['id'],
            'borrow_date' => $now,
            'due_date'    => $dueDate,
            'return_date' => null,
            'renew_date'  => null,
            'status'      => 'borrowed'
        ];

        try {
            if (!$this->db->create('borrowBook', $borrowData)) {
                return $this->failRedirect('Failed to borrow book. Please try again later.', 'pages/history');
            }
        } catch (PDOException $e) {
            return $this->failRedirect($e->getMessage(), 'pages/category');
        }

        return $this->successRedirect('Book borrowed successfully.', 'pages/history');
    }

    private function failRedirect(string $message, string $location, string $type = 'error')
    {
        setMessage($type, $message);
        redirect($location);
        return;
    }

    private function successRedirect(string $message, string $location)
    {
        setMessage('success', $message);
        redirect($location);
        return;
    }

    //Return Book
    public function return()
    {
        AuthMiddleware::userOnly();

        $borrowId = $_GET['id'] ?? null;
        if (!$borrowId) {
            return $this->failRedirect('Invalid request', 'pages/history');
        }

        $borrowRecord = $this->db->getById('borrowBook', $borrowId);
        if (!$borrowRecord) {
            return $this->failRedirect('Borrow record not found', 'pages/history');
        }

        $returnDate = date('Y-m-d H:i:s');

        $updated = $this->db->update('borrowBook', $borrowId, [
            'return_date' => $returnDate,
            'status' => 'returned'
        ]);

        if (!$updated) {
            return $this->failRedirect('Failed to return book', 'pages/history');
        }

        $this->updateReservationQuantity($borrowRecord['book_id']);
        $this->updateBookAvailability($borrowRecord['book_id']);

        return $this->successRedirect('Book returned successfully', 'pages/history');
    }

    private function updateReservationQuantity(int $bookId): void
    {
        $reservation = $this->db->columnFilter('reservations', 'book_id', $bookId);
        if (!$reservation) {
            return;
        }

        $newQuantity = $reservation['available_quantity'] + 1;
        $this->db->update('reservations', $reservation['id'], ['available_quantity' => $newQuantity]);
    }

    private function updateBookAvailability(int $bookId): void
    {
        $book = $this->db->getById('books', $bookId);
        if (!$book) {
            return;
        }

        $newAvailable = (int)$book['available_quantity'] + 1;
        $statusDesc = $newAvailable === 0 ? 'Not Available' : 'Available';

        $this->db->update('books', $bookId, [
            'available_quantity' => $newAvailable,
            'status_description' => $statusDesc
        ]);
    }


    //Renew Book
    public function renew()
    {
        AuthMiddleware::userOnly();
        $borrowId = $_GET['id'] ?? null;
        if (!$borrowId) {
            setMessage('error', 'Invalid request');
            redirect('pages/history');
            return;
        }

        $borrowRecord = $this->db->getById('borrowBook', $borrowId);
        if (!$borrowRecord || empty($borrowRecord['due_date'])) {
            setMessage('error', 'Due Date not found');
            redirect('pages/history');
            return;
        }

        $originalDate = $borrowRecord['renew_date'] ?? $borrowRecord['due_date'];
        $renewCount = (int)($borrowRecord['renew_count'] ?? 0) + 1;

        if ($renewCount > 3) {
            setMessage('error', 'Maximum number of renewals reached');
            redirect('pages/history');
            return;
        }

        $updateData = [
            'renew_date'  => date('Y-m-d H:i:s', strtotime("$originalDate +7 days")),
            'renew_count' => $renewCount,
            'status'      => 'renewed',
        ];

        $updated = $this->db->update('borrowBook', $borrowId, $updateData);

        setMessage($updated ? 'success' : 'error', $updated ? 'Book renewed successfully' : 'Failed to renew book');
        redirect('pages/history');
    }

    // Reserve 
    public function reserve()
    {
        AuthMiddleware::userOnly();

        $user = $_SESSION['session_loginuser'] ?? null;
        $bookId = $_GET['id'] ?? null;

        if (!$user || !$bookId) {
            $this->redirectWithMessage('Invalid user or book.', 'pages/category', 'error');
            return;
        }

        // Check if user already has a pending reservation for this book
        $existingReserve = $this->db->hasReservation($user['id'], $bookId, 'pending');
        if ($existingReserve) {
            $this->redirectWithMessage('You have already reserved this book.', 'pages/history', 'error');
            return;
        }

        date_default_timezone_set('Asia/Yangon');
        $reservationData = [
            'book_id'           => $bookId,
            'available_quantity' => 0,
            'user_id'           => $user['id'],
            'reserved_at'       => date('Y-m-d H:i:s'),
            'status'            => 'pending',
        ];

        if ($this->db->create('reservations', $reservationData)) {
            $this->redirectWithMessage('Book reserved successfully.', 'pages/history', 'success');
        } else {
            $this->redirectWithMessage('Failed to reserve book. Please try again later.', 'pages/history', 'error');
        }
    }

    // Redirect with session message, no external helpers used
    private function redirectWithMessage(string $message, string $location, string $type = 'error')
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];

        header("Location: /$location");  // <-- add slash here
        exit();
    }


    // Confirm Reservation

    public function confirmreservation()
    {
        AuthMiddleware::adminOnly();
        $user_id = $_GET['user_id'] ?? null;
        $book_id = $_GET['book_id'] ?? null;
        $available_quantity = $_GET['available_quantity'] ?? null;

        $reservationid = $this->db->columnFilter('reservations', 'book_id', $book_id);

        $new_quantity = $available_quantity - 1;

        $update_new_quantity = $this->db->columnFilter('reservations', $reservationid['book_id'], ['available_quantity' => $new_quantity]);

        $user = new BorrowBookModel();
        $user->book_id = $book_id;
        $user->user_id = $user_id;
        $user->borrow_date = date('Y-m-d H:i:s');
        $user->due_date = date('Y-m-d H:i:s', strtotime('+7 days'));
        $user->return_date = null;
        $user->renew_date = null;
        $user->status = 'borrowed';

        $iscreated = $this->db->create('borrowBook', $user->toArray());

        $isdelete = $this->db->delete('reservations', $reservationid['id']);

        $reserver_again_check = $this->db->columnFilter('reservations', 'book_id', $book_id);
        if (!$reserver_again_check) {
            $book_update = $this->db->update('books', $book_id, ['available_quantity' => $new_quantity]);
        }

        header("Location: " . URLROOT . "/admin/reservation");
        exit;
    }
    //Cancel Reservation
    public function cancelreservation()
    {
        AuthMiddleware::userOnly();
        $reservationId = $_GET['id'];

        if (!$reservationId) {
            setMessage('error', 'Reservations does not found');
            redirect('pages/history');
        }
        $deleteReservation = $this->db->delete('reservations', $reservationId);

        if (!$deleteReservation) {
            setMessage('error', 'Failed to delete reservations ');
            redirect('pages/history');
        } else {
            setMessage('success', 'Successfully delete reservations');
            redirect('pages/history');
        }
    }

    public function checkOverdue()
    {
        AuthMiddleware::adminOnly();

        $now = date('Y-m-d');
        $allRecords = $this->db->readAll('borrowBook');
        $overdueRecords = [];

        foreach ($allRecords as $record) {
            if (!in_array($record['status'], ['borrowed', 'renewed'])) {
                continue;
            }

            $compareDate = $record['renew_date'] ?: $record['due_date'];

            if ($compareDate && strtotime($compareDate) < strtotime($now)) {
                $overdueRecords[] = $record;
            }
        }

        foreach ($overdueRecords as $record) {
            $success = $this->db->update('borrowBook', $record['id'], ['status' => 'overdue']);
            if (!$success) {
                error_log("Failed to update borrowBook ID " . $record['id']);
            }
        }
    }

    // mi mi 
}
