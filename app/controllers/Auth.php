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
    // public function index()
    // {
    //     // Example: redirect to login page
    //     redirect('auth/login');
    // }
    public function index()
    {
        // some default behavior
    }
    // Login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                // session_start();
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = base64_encode($password);

                $ischeck = $this->db->loginCheck($email, $password);

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
    // Form Register
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
    // Admin register
    public function adminRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];

            // Check if email already exists
            $checkmail = $this->db->columnFilter('users', 'email', $email);
            if ($checkmail) {
                setMessage('error', 'Email already exists');
                redirect('pages/adminregister');
                return; // stop execution
            }

            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $department = $_POST['department'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirm_password'];

            // Check if passwords match
            if ($password !== $confirmpassword) {
                setMessage('error', 'Password does not match');
                redirect('pages/adminregister');
                return; // stop execution
            }

            // Hash password securely
            $password = base64_encode($password);
            $user = new UserModel();
            $user->name = $name;
            $user->email = $email;
            $user->gender = $gender;
            $user->department = $department;
            $user->year = null;
            $user->password = $password;
            $user->is_active = 0;
            $user->is_login = 0;
            $user->date = date('Y-m-d H:i:s');
            $user->role_id = 1;
            $user->otp = null;
            $user->otp_expiry = null;

            $insert = $this->db->create('users', $user->toArray());

            if ($insert) {
                $mail = new Mail();
                $sentMail = $mail->verifyMail($email, $name);
                setMessage('success', 'Mail is sent');
                redirect('admin/adminlist');
                return;
            } else {
                setMessage('error', 'Failed to register');
                redirect('admin/adminregister');
                return;
            }
        }
    }


    //Register
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            // Check if email already exists
            $checkmail = $this->db->columnFilter('users', 'email', $email);
            if ($checkmail) {
                setMessage('error', 'Email already exists.');
                redirect('pages/register');
                return;
            }

            $name = $_POST['name'];
            $roll = $_POST['rollno'];
            $gender = $_POST['gender'];
            $year  = $_POST['year'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirm_password'];

            if ($password !== $confirmpassword) {
                setMessage('error', 'Password does not match.');
                redirect('pages/register');
                return;
            }

            // Encrypt or hash the password (base64 is NOT secure)
            $password = base64_encode($password);// ✅ Use secure hashing

            $user = new UserModel();
            $user->name = $name;
            $user->email = $email;
            $user->rollno = $roll;
            $user->gender = $gender;
            $user->year = $year;
            $user->is_active = 0;
            $user->is_login = 0;
            $user->date = date('Y-m-d H:i:s');
            $user->password = $password;
            $user->role_id = 2;
            $user->otp = null;
            $user->otp_expiry = null;

            $insert = $this->db->create('users', $user->toArray());

            if ($insert) {
                $mail = new Mail();
                $sentmail = $mail->verifyMail($email, $name);
                setMessage('success', 'Mail is sent.');
                redirect('pages/login');
            } else {
                setMessage('error', 'Failed to register.');
                redirect('pages/register');
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

    // Forgot Password
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
    // Verify OTP
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
                redirect('pages/otp');
            }
        }
    }

    // public function resendOtp()
    // {
    //     if (!isset($_SESSION['post_email'])) {
    //         setMessage('error', 'Session expired. Please login again.');
    //         redirect('auth/login');
    //         return;
    //     }

    //     $newOtp = rand(100000, 999999);
    //     $_SESSION['otp'] = $newOtp;

    //     $userEmail = $_SESSION['post_email'];

    //     if (mail($userEmail, "Your OTP Code", "Your OTP is: $newOtp")) {
    //         setMessage('success', 'A new OTP has been sent to your email.');
    //     } else {
    //         setMessage('error', 'Failed to send OTP. Please try again.');
    //     }

    //     redirect('pages/otp');
    // }



    //Changed Password
    public function changedPassword()
    {
        $user = $_SESSION['post_email'];
        // var_dump($user);
        // die();
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (!$password || !$confirmPassword) {
            setMessage('error', 'All fields are required.');
            redirect('pages/changePassword');
            return;
        }

        if ($password !== $confirmPassword) {
            setMessage('error', 'Passwords do not match.');
            redirect('pages/changePassword');
            return;
        }

        if (strlen($password) < 6) {
            setMessage('error', 'Password must be at least 6 characters.');
            redirect('pages/changePassword');
            return;
        }

        $updatedPassword = base64_encode($password);
        // echo $user['id'];
        // die();
        $update = $this->db->columnFilter('users', 'email', $user);
        // var_dump($update);
        // die();

        $this->db->update('users', $update['id'], ['password' => $updatedPassword]);
        // var_dump($updatedPassword);
        // die();

        setMessage('success', 'Password changed successfully. Please log in again.');
        redirect('pages/login');
    }

    // edit profile
    public function editProfile($id)
    {
        $user = $this->db->getById('users', $id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $rollno = $_POST['rollno'];
            $year = $_POST['year'];

            $updatedUser = [
                'name' => $name,
                'email' => $email,

            ];

            $updated = $this->db->update('users', $id, $updatedUser);
            // var_dump($updated);
            // die();
            if (!$updated) {
                setMessage('error', 'User Updated Failed');
                redirect('pages/editProfile');
            } else {
                setMessage('success', 'User Updated Successfully');
                redirect('pages/userProfile');
            }
        }
    }

    public function changeUserPassword()
    {
        $user = $_SESSION['session_loginuser'];
        // var_dump($user);

        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if (!$currentPassword || !$newPassword || !$confirmPassword) {
            setMessage('error', 'All fields are required');
            redirect('pages/userProfile');
            return;
        }

        if ($newPassword !== $confirmPassword) {
            setMessage('error', 'Passwords must be match');
            //redirect('pages/changeUserPassword');
        }

        if (strlen($newPassword < 6)) {
            setMessage('error', 'Password length must be more than 6');
            //redirect('pages/changeUserPassword');
        }

        $updatedPassword = base64_encode($newPassword);
        $updated = $this->db->update('users', $user['id'], ['password' => $updatedPassword]);
        setMessage('success', 'Password changed successfully');
        redirect('pages/userProfile');
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['session_loginuser']);
        session_destroy();
        redirect('pages/home');
    }
}
