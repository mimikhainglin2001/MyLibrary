<?php
require_once APPROOT .'/middleware/authmiddleware.php';
class  ReservationModel extends Controller{
    private $db;
    public function __construct(){
        AuthMiddleware::userOnly();
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