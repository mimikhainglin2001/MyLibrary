<?php
require_once APPROOT . '/middleware/authmiddleware.php';
class ConfirmReservation extends Controller
{
    private $db;
    public function __construct()
    {
        AuthMiddleware::adminOnly();
        $this->db = new Database();
        $this->model('ConfirmReservationModel');
    }
    public function confirmreservation()
    {

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
}
