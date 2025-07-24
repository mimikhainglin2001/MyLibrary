<?php
class BookModel {
    private $title;
    private $isbn;
    private $category_id;
    private $author_id;
    private $total_quantity;
    private $available_quantity;
    private $status_id;
    private $image; 
    

    public function setTitle($title){
        $this->title = $title;
    }
    public function getTitle(){
        return $this->title;
    }

    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }
    public function getIsbn(){
        return $this->isbn;
    }

    public function setCategoryID($category_id){
        $this->category_id = $category_id;
    }
    public function getCategoryID(){
        return $this->category_id;
    }

    public function setAuthorID($author_id){
        $this->author_id = $author_id;
    }
    public function getAuthorID(){
        return $this->author_id;
    }

    public function setTotalQuantity($total_quantity){
        $this->total_quantity = $total_quantity;
    }
    public function getTotalQuantity(){
        return $this->total_quantity;
    }

    public function setAvailableQuantity($available_quantity){
        $this->available_quantity = $available_quantity;
    }
    public function getAvailableQuantity(){
        return $this->available_quantity;
    }

    public function setStatusID($status_id) {
        $this->status_id = $status_id;
    }
    public function getStatusID(){
        return $this->status_id;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    public function getImage() {
        return $this->image;
    }

    public function toArray(){
        return [
            'title' => $this->getTitle(),
            'isbn' => $this->getIsbn(),
            'category_id' => $this->getCategoryID(),
            'author_id' => $this->getAuthorID(),
            'total_quantity' => $this->getTotalQuantity(),
            'available_quantity' => $this->getAvailableQuantity(),
            'status_id' => $this->getStatusID(),
            'image' => $this->getImage()
        ];
    }
}
?>
