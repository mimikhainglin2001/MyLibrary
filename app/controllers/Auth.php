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
    public function index()
    {
        // some default behavior
    }
    // Login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['email']) || empty($_POST['password'])) {
            return;
        }

        $email = $_POST['email'];
        $password = base64_encode($_POST['password']);

        $user = $this->db->loginCheck($email, $password);
        if (!$user) {
            setMessage('error', 'Invalid email and password');
            redirect('pages/login');
            return;
        }

        // Set login session
        $this->db->setLogin($user['id']);
        $_SESSION['session_loginuser'] = $user;

        // Role-based redirect
        switch ($user['role_id']) {
            case Admin:
                redirect('admin/adminDashboard');
                break;
            case user:
                redirect('pages/category');
                break;
            default:
                setMessage('error', 'Invalid Username & Password');
                redirect('pages/login');
                break;
        }
    }

    // Form Register
    public function formRegister()
    {
        if (
            $_SERVER['REQUEST_METHOD'] !== 'POST' ||
            empty($_POST['email_check']) ||
            $_POST['email_check'] != 1
        ) {
            return;
        }

        $email = $_POST['email'] ?? '';
        if (!$email) {
            return;
        }
        // Check if user already exists
        if ($this->db->columnFilter('users', 'email', $email)) {
            echo 'Sorry! Email has already been taken. Please try another.';
        }
    }

    // Admin register
    public function adminRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }
        $email = $_POST['email'] ?? '';
        // Fail fast if email already exists
        if ($this->db->columnFilter('users', 'email', $email)) {
            setMessage('error', 'Email already exists');
            redirect('pages/adminregister');
            return;
        }

        $name = $_POST['name'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $department = $_POST['department'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Fail if passwords do not match
        if ($password !== $confirmPassword) {
            setMessage('error', 'Password does not match');
            redirect('pages/adminregister');
            return;
        }

        // Fail if password is too short
        if (strlen($password) < 6) {
            setMessage('error', 'Password must be at least 6 characters.');
            redirect('pages/adminregister');
            return;
        }

        // Encode password (replace with password_hash in production)
        $encodedPassword = base64_encode($password);

        $params = [
            $name,
            $email,
            $department,
            $gender,
            $encodedPassword,
            0,
            0,
            0,
            date('Y-m-d H:i:s'),
            1,
            null,
            null
        ];

        if (!$this->db->storeprocedure('InsertUser', $params)) {
            setMessage('error', 'Failed to register');
            redirect('admin/adminregister');
            return;
        }

        (new Mail())->verifyMail($email, $name);
        setMessage('success', 'Mail is sent');
        redirect('admin/adminlist');
    }

    //Register
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $email = $_POST['email'] ?? '';

        // Fail if email exists
        if ($this->db->columnFilter('users', 'email', $email)) {
            setMessage('error', 'Email already exists.');
            redirect('pages/register');
            return;
        }

        $name = $_POST['name'] ?? '';
        $roll = $_POST['rollno'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $year = $_POST['year'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $department = $_POST['department'] ?? '';

        // Fail if passwords do not match
        if ($password !== $confirmPassword) {
            setMessage('error', 'Password does not match.');
            redirect('pages/register');
            return;
        }

        // Optional: check password length
        if (strlen($password) < 6) {
            setMessage('error', 'Password must be at least 6 characters.');
            redirect('pages/register');
            return;
        }

        // Encode password (replace with password_hash in production)
        $encodedPassword = base64_encode($password);

        $params = [
            $name,
            $email,
            $roll,
            $department,
            $gender,
            $year,
            $encodedPassword,
            0,
            0,
            0,
            date('Y-m-d H:i:s'),
            2,
            null,
            null
        ];

        if (!$this->db->storeprocedure('InsertUser', $params)) {
            setMessage('error', 'Failed to register');
            redirect('pages/register');
            return;
        }

        (new Mail())->verifyMail($email, $name);
        setMessage('success', 'Mail is sent');
        redirect('pages/login');
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

        if (!$user) {
            setMessage('error', 'Incorrect Token. Please try again!');
            redirect('');
            return;
        }

        $success = $this->db->setLogin($user[0]['id']);

        if (!$success) {
            setMessage('error', 'Fail to Verify. Please try again!');
            redirect('');
            return;
        }

        setMessage('success', 'Successfully Verified. Please log in!');
        redirect('');
    }

    // Forgot Password
    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $email = $_POST['email'] ?? '';

        $userExists = $this->db->columnFilter('users', 'email', $email);

        if (!$userExists) {
            echo "Email not found.";
            exit;
        }

        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $otp_expiry = date('Y-m-d H:i:s');

        if (!$this->db->storeotp($email, $otp, $otp_expiry)) {
            echo "Failed to store OTP.";
            exit;
        }

        $mail = new Mail();

        if (!$mail->sendotp($email, $otp)) {
            echo "Failed to send OTP email.";
            exit;
        }

        $_SESSION['post_email'] = $email;
        redirect('pages/otp');
    }

    // Verify OTP
    public function verify_otp()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $email = $_SESSION['post_email'] ?? null;
        if (!$email) {
            setMessage('error', 'Session expired. Please try again.');
            redirect('pages/otp');
            return;
        }

        $otp = implode('', $_POST['otp'] ?? []);

        if ($this->db->checkotp($email, $otp)) {
            redirect('pages/changepassword');
        } else {
            setMessage('error', 'Invalid OTP');
            redirect('pages/otp');
        }
    }

    //Changed Password
    public function changedPassword()
    {
        $email = $_SESSION['post_email'] ?? null;

        if (!$email) {
            setMessage('error', 'Session expired. Please try again.');
            redirect('pages/changePassword');
            return;
        }

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

        $user = $this->db->columnFilter('users', 'email', $email);
        if (!$user) {
            setMessage('error', 'User not found.');
            redirect('pages/changePassword');
            return;
        }

        $this->db->update('users', $user['id'], ['password' => $updatedPassword]);

        setMessage('success', 'Password changed successfully. Please log in again.');
        redirect('pages/login');
    }

    public function logout()
    {
        $id = $_SESSION['session_loginuser']['id'] ?? null;
        if ($id) {
            $this->db->unsetLogin($id);
        }

        session_destroy();
        $this->view('pages/login');
        exit();
    }
}
