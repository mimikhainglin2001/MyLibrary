<?php
class BorrowBookModel{
    private $book_id;
    private $user_id;
    private $borrow_date;
    private $due_date;

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
    public function toArray(){
        return  [
            'book_id' => $this->getBookID(),
            'user_id' => $this->getUserID(),
            'borrow_date' => $this->getBorrowDate(),
            'due_date' => $this->getDueDate()
        ];
    }
}
?>