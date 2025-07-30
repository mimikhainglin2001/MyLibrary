<?php
class ReservationModel{
    private $user_id;
    private $book_id;
    private $reserved_at;
    private $status;

    public function setUserID($user_id){
        $this->user_id = $user_id;
    }
    public function getUserID(){
        return $this->user_id;
    }
    public function setBookID($book_id){
        $this->book_id = $book_id;
    }
    public function getBookID(){
        return $this->book_id;
    }
    public function setReservedAt($reserved_at){
        $this->reserved_at = $reserved_at;
    }
    public function getReservedAt(){
        return $this->reserved_at;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getStatus(){
        return $this->status;
    }

    public function toArray(){
        return  [
            'user_id' => $this->getUserID(),
            'book_id' => $this->getBookID(),
            'reserved_at' => $this->getReservedAt(),
            'status' => $this->getStatus()
        ];
    }
}
?>