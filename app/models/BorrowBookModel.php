<?php
require_once __DIR__ .'/BaseModel.php';
class BorrowBookModel extends BaseModel{
    protected $book_id;
    protected $user_id;
    protected $borrow_date;
    protected $due_date;
    protected $return_date;
    protected $renew_date;
    protected $status;
    
}
?>