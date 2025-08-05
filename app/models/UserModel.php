<?php
require_once __DIR__ .'/BaseModel.php';
class UserModel extends BaseModel
{
    public $name;
    public $email;
    protected $password;
    public $is_confirmed;
    public $is_active;
    public $is_login;
    public $date;
    public $rollno;
    public $department;
    public $gender;
    public $year;
    public $role_id;

    protected $otp;
    public $otp_expiry;
}
?>
