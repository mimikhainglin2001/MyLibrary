<?php
class CategoryModel{
    private $id;
    private $name;
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function toArray(){
        return[
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }
}
?>