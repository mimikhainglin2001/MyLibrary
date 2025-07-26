<?php
class BorrowBookModel{
    private $book_id;
    private $user_id;
    private $borrow_date;
    private $due_date;
    private $return_date;
    private $renew_date;
    private $status;
    public function setBookID($book_id){
        $this->book_id = $book_id;
    }
    public function getBookID(){
        return $this->book_id;
    }
    public function setUserID($user_id){
        $this->user_id = $user_id;
    }
    public function getUserID(){
        return $this->user_id;
    }
    public function setBorrowDate($borrow_date){
        $this->borrow_date = $borrow_date;
    }
    public function getBorrowDate(){
        return $this->borrow_date;
    }
    public function setDueDate($due_date){
        $this->due_date = $due_date;
    }
    public function getDueDate(){
        return $this->due_date;
    }
    public function setReturnDate($return_date){
        $this->return_date = $return_date;
    }
    public function getReturnDate(){
        return $this->return_date;
    }
    public function setRenewDate($renew_date){
        $this->renew_date = $renew_date;
    }
    public function getRenewDate(){
        return $this->renew_date;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getStatus(){
        return $this->status;
    }

    public function toArray(){
        return  [
            'book_id' => $this->getBookID(),
            'user_id' => $this->getUserID(),
            'borrow_date' => $this->getBorrowDate(),
            'due_date' => $this->getDueDate(),
            'return_date' => $this->getReturnDate(),
            'renew_date' => $this->getRenewDate(),
            'status' => $this->getStatus()
        ];
    }
}
?>