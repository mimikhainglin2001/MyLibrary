<?php

class Auth extends Controller
{
    private $db;

    public function __construct()
    {
        $this->model('UserModel');
        $this->model('BorrowBookModel');
        $this->db = new Database();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                // session_start();
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = base64_encode($password);

                $ischeck = $this->db->loginCheck($email, $password);

                // $name = $ischeck['name'] ?? '';

                // var_dump($email);exit;

                // if($ischeck && $ischeck['role_id'] == Admin){
                //     $_SESSION['name'] = $ischeck['name'];
                //     redirect('admin/adminDashboard');
                // }elseif($ischeck && $ischeck['role_id'] == user){
                //     $_SESSION['name'] = $ischeck['name'];
                //     redirect('pages/category');
                // }
                // else{
                //     setMessage('error','Invalid Username & Password');
                //     redirect('pages/login');
                // }

                if (!$ischeck) {
                    setMessage('error', 'Invalid email and password');
                    redirect('pages/login');
                } else {
                    $this->db->setLogin($ischeck['id']);

                    $_SESSION['session_loginuser'] = $ischeck;

                    if ($ischeck) {

                        switch ($ischeck['role_id']) {
                            case Admin:
                                redirect('admin/adminDashboard');
                                break;

                            case user:
                                redirect('pages/home');
                                break;

                            default:
                                // Optional: handle unknown roles
                                setMessage('error', 'Invalid Username & Password');
                                redirect('pages/login');
                                break;
                        }
                    }
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

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            $checkmail = $this->db->columnFilter('users', 'email', $email);
            if ($checkmail) {
                setMessage('error', 'Email is already exist');
                redirect('pages/register');
            } else {
                $name = $_POST['name'];
                $roll = $_POST['rollno'];
                $gender = $_POST['gender'];
                $year  = $_POST['year'];
                $password = $_POST['password'];
                $confirmpassword = $_POST['confirm_password'];

                if ($password !== $confirmpassword) {
                    setMessage('error', 'password does not match');
                    redirect('pages/register');
                } else {

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
                    $user->setDate(date('Y-m-d H:i:s', time()));
                    $user->setPassword($password);
                    $user->setrole_id(2); // Assuming 2 is the role_id for normal users
                    $user->setotp(null);
                    $user->setotp_expiry(null);

                    $insert = $this->db->create('users', $user->toArray());
                    //    var_dump($insert);
                    //    die();
                    if ($insert) {
                        $mail = new Mail();
                        $sentmail = $mail->verifyMail($email, $name);
                        setMessage('success', 'Mail is sent');
                        redirect('pages/login');
                    } else {
                        setMessage('error', 'Failed to register');
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


    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //session_start();
            $email = $_POST['email'];

            $ischeck = $this->db->columnFilter('users', 'email', $email);

            if (!$ischeck) {
                echo "Email not found.";
                die();
            }

            $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $otp_expiry = date('Y-m-d H:i:s');

            $store = $this->db->storeotp($email, $otp, $otp_expiry);

            switch ($store) {
                case true:
                    $mail = new Mail();
                    $sentotp = $mail->sendotp($email, $otp);

                    switch ($sentotp) {
                        case true:
                            $_SESSION['post_email'] = $email;
                            redirect('pages/otp');
                            break;

                        default:
                            echo "Failed to send OTP email.";
                            break;
                    }
                    break;

                default:
                    echo "Failed to store OTP.";
                    break;
            }
        }
    }


    public function verify_otp()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_SESSION['post_email'];

            $otp = implode('', $_POST['otp']);

            $chekcotp = $this->db->checkotp($email, $otp);
            if ($chekcotp) {
                redirect('pages/changepassword');
            } else {
                setMessage('error', 'Invalid OTP');
                redirect('pages/forgetpassword');
            }
        }
    }


    public function borrow()
    {
        $name = $_SESSION['session_loginuser'];
        $id = $_GET['id'];
        date_default_timezone_set('Asia/Yangon');
        $currentDate = date('Y-m-d H:i:s');
        $dueDate = date('Y-m-d H:i:s', strtotime('+7 days'));
        $returnDate = date('Y-m-d H:i:s');
        $renewDate = null;
        $status = 'borrowed';


        $user = new BorrowBookModel();
        $user->setBookID($id);
        $user->setUserID($name['id']);
        $user->setBorrowDate($currentDate);
        $user->setDueDate($dueDate);
        $user->setReturnDate(null);
        $user->setRenewDate($renewDate);
        $user->setStatus($status);

        $borrowed = $this->db->create('borrowBook', $user->toArray());
        if ($borrowed) {
            setMessage('success', 'Book borrowed successfully');
            redirect('pages/history');
        }
    }

    public function return()
    {
        $book_id = $_GET['book_id'];
        $return_date = date('Y=m=d H:i:s');
        $status = 'returned';
        $update_data = [
            'return_date' => $return_date,
            'status' => $status,
        ];
        $updated = $this->db->update('borrowBook', 'book_id', $update_data);
        if ($updated) {
            setMessage('success', 'Book returned successfully');
            redirect('pages/history');
        } else {
            setMessage('error', 'Return Failed');
        }
    }




    public function logout()
    {
        session_start();
        unset($_SESSION['session_loginuser']);
        session_destroy();
        redirect('pages/home');
    }
}
