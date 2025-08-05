<?php
class BorrowBook extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('BorrowBookModel');
        $this->model('ReservationModel');
        $this->db = new Database();
    }


    //Borrow Book
    public function borrow()
    {
        $user = $_SESSION['session_loginuser'] ?? null;
        $bookId = $_GET['id'] ?? null;

        if (!$user || !$bookId) {
            return $this->failRedirect('Invalid user or book.', 'pages/category');
        }

        date_default_timezone_set('Asia/Yangon');
        $now = date('Y-m-d H:i:s');
        $dueDate = date('Y-m-d H:i:s', strtotime('+7 days'));

        $book = $this->db->getById('books', $bookId);
        if (!$book) {
            return $this->failRedirect('Book not found.', 'pages/category');
        }

        if ((int)$book['available_quantity'] <= 0) {
            return $this->failRedirect('This book is currently not available. You may reserve it.', 'pages/reservePage?id=' . $bookId, 'info');
        }

        $borrowCount = $this->db->raw(
            "SELECT COUNT(*) as count FROM borrowBook WHERE user_id = :uid AND status = 'borrowed'",
            ['uid' => $user['id']]
        )['count'] ?? 0;

        if ($borrowCount >= 2) {
            return $this->failRedirect('You have already borrowed 2 books. Please return one.', 'pages/romancebook');
        }

        $alreadyBorrowed = $this->db->raw(
            "SELECT 1 FROM borrowBook WHERE user_id = :uid AND book_id = :bid AND status = 'borrowed' LIMIT 1",
            ['uid' => $user['id'], 'bid' => $bookId]
        );

        if ($alreadyBorrowed) {
            return $this->failRedirect('You have already borrowed this book.', 'pages/history');
        }

        $borrowData = [
            'book_id'      => $bookId,
            'user_id'      => $user['id'],
            'borrow_date'  => $now,
            'due_date'     => $dueDate,
            'return_date'  => null,
            'renew_date'   => null,
            'status'       => 'borrowed'
        ];

        if ($this->db->create('borrowBook', $borrowData)) {
            $newQty = max(0, $book['available_quantity'] - 1);
            $this->db->update('books', $bookId, [
                'available_quantity' => $newQty,
                'status_description' => $newQty ? 'Available' : 'Not Available'
            ]);

            return $this->successRedirect('Book borrowed successfully.', 'pages/history');
        }

        return $this->failRedirect('Failed to borrow book. Please try again later.', 'pages/history');
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
        $borrowId = $_GET['id'] ?? null;

        if (!$borrowId) {
            setMessage('error', 'Invalid request');
            redirect('pages/history');
            return;
        }

        $borrowRecord = $this->db->getById('borrowBook', $borrowId);
        if (!$borrowRecord) {
            setMessage('error', 'Borrow record not found');
            redirect('pages/history');
            return;
        }



        $returnDate = date('Y-m-d H:i:s');

        $updated = $this->db->update('borrowBook', $borrowId, [
            'return_date' => $returnDate,
            'status' => 'returned'
        ]);

        if ($updated) {

            $reservedbook = $this->db->columnFilter('reservations', 'book_id', $borrowRecord['book_id']);
            if ($reservedbook) {
                $newquantity = $reservedbook['available_quantity'] + 1;

                $isadd = $this->db->update('reservations', $reservedbook['id'], ['available_quantity' => $newquantity]);
                var_dump($isadd);
                die();
            }


            $book = $this->db->getById('books', $borrowRecord['book_id']);
            if ($book) {
                $newAvailable = (int)$book['available_quantity'] + 1;
                $statusDesc = $newAvailable === 0 ? 'Not Available' : 'Available';

                $this->db->update('books', $borrowRecord['book_id'], [
                    'available_quantity' => $newAvailable,
                    'status_description' => $statusDesc
                ]);
            }

            setMessage('success', 'Book returned successfully');
        } else {
            setMessage('error', 'Failed to return book');
        }

        redirect('pages/history');
    }

    //Renew Book
    public function renew()
    {
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
        $users = $_SESSION['session_loginuser'];
        $userId = $users['id'];
        $id = $_GET['id'];
        // Check the user already reserved the book

        $existingReserve = $this->db->raw(
            "SELECT 1 FROM reservations WHERE user_id = :user_id AND book_id = :book_id AND status = 'pending' ",
            [
                'user_id' => $users['id'],
                'book_id' => $id
            ]
        );

        if ($existingReserve) {
            echo "<script>alert('You have already reserved this book.');window.location.href='" . URLROOT . "/pages/history';</script>";
            return;
        }
        $user = new ReservationModel();
        $user->book_id = $id;
        $user->available_quantity = 0;
        $user->user_id = $userId;
        date_default_timezone_set('Asia/Yangon');
        $user->reserved_at = date('Y-m-d H:i:s');
        $user->status = 'pending';
        $this->db->create('reservations', $user->toArray());
        redirect('pages/history');
    }

    public function confirmreservation()
    {
        $user_id = $_GET['user_id'] ?? null;
        $book_id = $_GET['book_id'] ?? null;
        $available_quantity = $_GET['available_quantity'] ?? null;

        $reservationid = $this->db->columnFilter('reservations', 'book_id', $book_id);

        $new_quantity = $available_quantity - 1;

        $update_new_quantity = $this->db->updateByBookId('reservations', $reservationid['book_id'], ['available_quantity' => $new_quantity]);

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

        // if()

        // $id = $this->db->getReservation($user_id,$book_id);
        // var_dump($id);
        // die();
    }

    public function cancel()
    {
        $reservationId = $_GET['id'];
        // var_dump($reservationId);
        // die();

        if (!$reservationId) {
            setMessage('error', 'Reservations does not found');
            redirect('pages/history');
        }
        $deleteReservation = $this->db->delete('reservations', $reservationId);
        // var_dump($deleteReservation);
        // die();

        if (!$deleteReservation) {
            setMessage('error', 'Failed to delete reservations ');
            redirect('pages/history');
        } else {
            setMessage('success', 'Successfully delete reservations');
            redirect('pages/history');
        }
    }
}
