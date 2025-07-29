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
        $user = $_SESSION['session_loginuser'];
        $bookId = $_GET['id'];
    
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
        $alreadyBorrowed = $this->db->raw("SELECT * FROM borrowBook 
        WHERE user_id = :user_id AND book_id = :book_id AND status = 'borrowed'", [
            'user_id' => $user['id'],
            'book_id' => $bookId
        ]);


        if (!empty($alreadyBorrowed)) {
            $_SESSION['modal'] = 'already_borrowed';
            redirect('pages/category');
            return;
        }

        $borrow = new BorrowBookModel();
        $borrow->setBookID($bookId);
        $borrow->setUserID($user['id']);
        $borrow->setBorrowDate($now);
        $borrow->setDueDate($dueDate);
        $borrow->setReturnDate(null);
        $borrow->setRenewDate(null);
        $borrow->setStatus('borrowed');

        $result = $this->db->create('borrowBook', $borrow->toArray());

        if ($result) {
            $newQty = (int)$book['available_quantity'] - 1;
            $statusDesc = ($newQty == 0) ? 'Not Available' : 'Available';

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
        if (!isset($_GET['id'])) {
            setMessage('error', 'Invalid request');
            redirect('pages/history');
            return;
        }

        $borrowId = $_GET['id'];
        $borrowRecord = $this->db->getById('borrowBook', $borrowId);

        if (!$borrowRecord) {
            setMessage('error', 'Borrow record not found');
            redirect('pages/history');
            return;
        }

        $bookId = $borrowRecord['book_id'];
        $returnDate = date('Y-m-d H:i:s');

        // Update borrowBook status
        $updated = $this->db->update('borrowBook', $borrowId, [
            'return_date' => $returnDate,
            'status' => 'returned'
        ]);

        if ($updated) {
            $book = $this->db->getById('books', $bookId);
            if ($book) {
                $newAvailable = $book['available_quantity'] + 1;
                $statusDesc = ($newAvailable == 0) ? 'Not Available' : 'Available';
                $dataUpdate = [
                    'available_quantity' => $newAvailable,
                    'status_description' => $statusDesc
                ];

                $this->db->update('books', $bookId, $dataUpdate);
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
        $borrowId = $_GET['id'];

        $borrowRecord = $this->db->getById('borrowBook', $borrowId);
        if (!$borrowRecord || !isset($borrowRecord['due_date'])) {
            setMessage('error', 'Due Date not found');
            redirect('pages/history');
            exit;
        }

        // Calculate the renew date
        $originalDate = !empty($borrowRecord['renew_date']) ? $borrowRecord['renew_date'] : $borrowRecord['due_date'];

        // Calculate new renew_date: 7 days after the original date
        $renewDate = date('Y-m-d H:i:s', strtotime("$originalDate +7 days"));

        $status = 'renewed';
        $renewCount = isset($borrowRecord['renew_count']) ? (int)$borrowRecord['renew_count'] + 1 : 1;

        if ($renewCount > 3) {
            setMessage('error', 'Maximum number of renewals reached');
            redirect('pages/history');
            exit;
        }

        $updateData = [
            'renew_date' => $renewDate,
            'renew_count' => $renewCount,
            'status' => $status
        ];

        $updated = $this->db->update('borrowBook', $borrowId, $updateData);
        if ($updated) {
            setMessage('success', 'Book renewed successfully');
        } else {
            setMessage('error', 'Failed to renew book');
        }

        redirect('pages/history');
        exit;
    }
}
