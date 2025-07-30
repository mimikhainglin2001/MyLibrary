<?php
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
        $user = $_SESSION['session_loginuser'] ?? null;
        $bookId = $_GET['id'] ?? null;

        if (!$user || !$bookId) {
            setMessage('error', 'Invalid user or book');
            return;
        }

        date_default_timezone_set('Asia/Yangon');
        $now = date('Y-m-d H:i:s');
        $dueDate = date('Y-m-d H:i:s', strtotime('+7 days'));

        $book = $this->db->getById('books', $bookId);
        if (!$book) {
            setMessage('error', 'Book not found');
            return;
        }

        if ((int)$book['available_quantity'] <= 0) {
            setMessage('error', 'Book is currently not available');
            return;
        }

        $countBorrows = $this->db->raw(
            "SELECT COUNT(*) FROM borrowBook WHERE user_id = :user_id AND status = 'borrowed'",
            ['user_id' => $user['id']]
        );
        if($countBorrows['count'] >2 ){
            setMessage('error', 'You can borrow up to 2 books at a time');
            redirect('pages/category');
        }

        $alreadyBorrowed = $this->db->raw(
            "SELECT 1 FROM borrowBook WHERE user_id = :user_id AND book_id = :book_id AND status = 'borrowed' LIMIT 1",
            params: ['user_id' => $user['id'], 'book_id' => $bookId]
        );

        if (!empty($alreadyBorrowed)) {
            $_SESSION['modal'] = 'already_borrowed';
            redirect('pages/category');
            return;
        }

        $borrowData = [
            'book_id' => $bookId,
            'user_id' => $user['id'],
            'borrow_date' => $now,
            'due_date' => $dueDate,
            'return_date' => null,
            'renew_date' => null,
            'status' => 'borrowed'
        ];

        if ($this->db->create('borrowBook', $borrowData)) {
            $newQty = max(0, (int)$book['available_quantity'] - 1);
            $statusDesc = $newQty === 0 ? 'Not Available' : 'Available';

            $this->db->update('books', $bookId, [
                'available_quantity' => $newQty,
                'status_description' => $statusDesc
            ]);

            setMessage('success', 'Book Borrowed Successfully');
            redirect('pages/history');
        } else {
            setMessage('error', 'Failed to borrow book');
            redirect('pages/literarybook');
        }
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


    // // Check Overdue
    // public function checkOverdue()
    // {

    //     $borrowedBooks = $this->db->columnFilter('borrowBook', 'status', 'borrowed');

    //     $today = date('Y-m-d');

    //     foreach ($borrowedBooks as $borrow) {
    //         $dueDate = $borrow['due_date'];


    //         if ($dueDate < $today) {
    //             $this->db->update('borrowBook', $borrow['id'], [
    //                 'status' => 'overdue'
    //             ]);
    //         }
    //     }


    //     setMessage('success', 'Overdue books updated successfully.');
    //     redirect('pages/history');
    // }

    // // History
    // public function history()
    //     {
    //         $this->checkOverdue(); // Check for overdue books first

    //         $userId = $_SESSION['session_loginuser']['id'];
    //         $borrowedBooks = $this->db->columnFilter('borrowBook', 'user_id', $userId);

    //         // Optional summary count
    //         $summary = [
    //             'currentlyBorrowed' => 0,
    //             'totalBorrowed' => 0,
    //             'returned' => 0,
    //             'overdue' => 0,
    //         ];

    //         foreach ($borrowedBooks as $b) {
    //             $summary['totalBorrowed']++;
    //             if ($b['status'] === 'borrowed') $summary['currentlyBorrowed']++;
    //             if ($b['status'] === 'returned') $summary['returned']++;
    //             if ($b['status'] === 'overdue') $summary['overdue']++;
    //         }

    //         $this->view('pages/history', [
    //             'borrowedBooks' => $borrowedBooks,
    //             'summary' => $summary
    //         ]);
    //     }



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
}
