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
        $name = $_SESSION['session_loginuser'];
        $id = $_GET['id'];
        date_default_timezone_set('Asia/Yangon');
        $currentDate = date('Y-m-d H:i:s');
        $dueDate = date('Y-m-d H:i:s', strtotime('+7 days'));
        $status = 'borrowed';

        // Fetch book from DB
        $book = $this->db->getById('books', $id);

        // Check availability
        if ($book && $book['available_quantity'] > 0 && $book['total_quantity'] > 0) {

            // Prepare borrow model
            $borrow = new BorrowBookModel();
            $borrow->setBookID($id);
            $borrow->setUserID($name['id']);
            $borrow->setBorrowDate($currentDate);
            $borrow->setDueDate($dueDate);
            $borrow->setReturnDate(null);
            $borrow->setRenewDate(null);
            $borrow->setStatus($status);


            $borrowed = $this->db->create('borrowBook', $borrow->toArray());

            if ($borrowed) {

                $newQuantity = $book['available_quantity'] - 1;
                $newTotalQuantity = $book['total_quantity'] - 1;


                $this->db->update('books', $id, [
                    'available_quantity' => $newQuantity,
                    'total_quantity' => $newTotalQuantity

                ]);

                setMessage('success', 'Book Borrowed Successfully');
                redirect('pages/history');
            } else {
                setMessage('error', 'Failed to borrow book');
                redirect('pages/literarybook');
            }
        } else {
            setMessage('error', 'Book is currently not available');
            redirect('pages/literarybook');
        }
    }





    //Return Book
    public function return()
    {
        $borrowId = $_GET['id'];
        // var_dump($borrowId);
        // die();
        $bookId = $_GET['id'];
        $returnDate = date('Y-m-d H:i:s');
        $status = 'returned';

        $updateData = [
            'return_date' => $returnDate,
            'status' => $status
        ];

        $updated = $this->db->update('borrowBook', $borrowId, $updateData);
        if ($updated) {
            setMessage('success', 'Book returned Successfully');
            redirect('pages/history');
        }
    }

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
