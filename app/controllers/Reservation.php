<?php
class  ReservationModel extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database();
        $this->model('ReservationModel');
    }

    public function reserveBook(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user_id = $_SESSION['user_id'];
            $book_id = $_POST['book_id'];   
        }
    }
}
?>