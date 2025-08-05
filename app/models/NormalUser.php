<?php
require_once __DIR__ .'/BaseModel.php';

class NormalUser extends UserModel
{
    protected $maxBooks = 2;
    protected $maxDays = 7;
    public function getUserType(){
        return 'Normal User';
    }
}
?>