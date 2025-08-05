<?php
require_once __DIR__.'/BaseModel.php';
class ReservationModel extends BaseModel{
    public $user_id;
    public $book_id;
    public $available_quantity;
    public $reserved_at;
    public $status;
   
}
?>