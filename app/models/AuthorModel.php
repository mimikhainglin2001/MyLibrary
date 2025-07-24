<?php
class AuthorModel{
    private $name;
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function toArray(){
        return [
            'name' => $this->getName()
        ];
    }
}
?>