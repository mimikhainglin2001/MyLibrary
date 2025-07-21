<?php 

class Auth extends Controller{
    private $db;

    public function __construct(){
        $this->model('UserModel');
        $this->db = new Database();
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['email']) && isset($_POST['password'])){
                session_start();
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = base64_encode($password);

                $ischeck = $this->db->loginCheck($email,$password);
                $name = $ischeck['name'] ?? '';
                
                
                if($ischeck && $ischeck['role_id'] == 1){
                    $_SESSION['name'] = $ischeck['name'];
                    redirect('admin/adminDashboard');
                }elseif($ischeck && $ischeck['role_id'] == 2){
                    $_SESSION['name'] = $ischeck['name'];
                    redirect('pages/category');
                }
                else{
                    setMessage('error','Invalid Username & Password');
                    redirect('pages/login');
                }

            }
        }
    }
    public function formRegister()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            isset($_POST['email_check']) &&
            $_POST['email_check'] == 1
        ) {
            $email = $_POST['email'];
            // call columnFilter Method from Database.php
            $isUserExist = $this->db->columnFilter('users', 'email', $email);
            if ($isUserExist) {
                echo 'Sorry! email has already taken. Please try another.';
            }
        }
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $email = $_POST['email'];

            $checkmail = $this->db->columnFilter('users','email',$email);
            if($checkmail){
                setMessage('error' , 'Email is already exit');
                redirect('pages/register');
            }else{
                $name = $_POST['name'];
                $roll = $_POST['rollno'];
                $gender = $_POST['gender'];
                $year  = $_POST['year'];
                $password = $_POST['password'];
                $confirmpassword = $_POST['confirm_password'];

                if($password !== $confirmpassword){
                    setMessage('error' , 'password does not match');
                    redirect('pages/register');
                }else{
                    $password = base64_encode($password);

                    $user = new UserModel();
                    $user->setName($name);
                    $user->setEmail($email);
                    $user->setRollno($roll);
                    $user->setGender($gender);
                    $user->setYear($year);
                    $user->setIsConfirmed(0);
                    $user->setIsActive(0);
                    $user->setIsLogin(0);
                    $user->setToken(0);
                    $user->setDate( date('Y-m-d H:i:s', time()));
                    $user->setPassword($password);
                    $user->setrole_id(2); // Assuming 2 is the role_id for normal users
                    $user->setotp(null);
                    $user->setotp_expiry(null);

                    $insert = $this->db->create('users' , $user->toArray());
                    if($insert){
                       
                        $mail = new Mail();
                        $sentmail = $mail->verifyMail($email,$name);
                        setMessage('success','Mail is sent');
                        redirect('pages/login');
                    }else{
                        setMessage('error','Failed to register');
                        redirect('pages/register');
                    }

                }
                

            }

        }
    }
     public function verify($token = null)
    {
        echo "Incoming token: $token<br>";
        if (!$token) {
            setMessage('error', 'Verification token missing!');
            redirect('');
            return;
        }

        $user = $this->db->columnFilter('users', 'token', $token);
        // var_dump($user);
        // exit();

        if ($user) {
            $success = $this->db->setLogin($user[0]['id']);

            if ($success) {
                setMessage(
                    'success',
                    'Successfully Verified. Please log in!'
                );
            } else {
                setMessage('error', 'Fail to Verify. Please try again!');
            }
        } else {
            setMessage('error', 'Incorrect Token. Please try again!');
        }

        redirect('');
    }


    public function forgotPassword(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            session_start();
        $email = $_POST['email'];

        $ischeck = $this->db->columnFilter('users','email',$email);
        if($ischeck){
            $otp = str_pad(rand(0,999999),6,'0',STR_PAD_LEFT);
            $otp_expiry = date('Y-m-d H:m:i');
         
            $store = $this->db->storeotp($email,$otp,$otp_expiry);
            if($store){
                $new = new Mail();
                $sentotp = $new->sendotp($email,$otp);
                if($sentotp){
                    $_SESSION['post_email'] = $email;
                    redirect('pages/otp');
                }
            }else{
                echo "error";
                die();
            }


        }else{
            echo "not have";
            die();
        }
    }
    }

    public function verify_otp(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $email = $_SESSION['post_email'];
           
        $otp = implode('', $_POST['otp']); 
        
        $chekcotp = $this->db->checkotp($email,$otp);
        if($chekcotp){
           redirect('pages/changepassword');
        }else{
           setMessage('error','Invalid OTP');
           redirect('pages/forgetpassword');
        }
        }
    }

}

?>