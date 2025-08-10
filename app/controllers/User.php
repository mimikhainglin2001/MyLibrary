<?php

require_once APPROOT . '/middleware/authmiddleware.php';

class User extends Controller
{
    private $db;
    private $user;
    public function __construct()
    {
        AuthMiddleware::userOnly();
        $this->user = $_SESSION['session_loginuser'] ?? null;
        $this->db = new Database();
        $this->model('UserModel');
    }
    private function renderBooksByCategory(string $categoryName, string $viewName, string $dataKey)
    {
        AuthMiddleware::userOnly();

        $allBooks = $this->db->readAll('book_details');

        // Filter only the books in this category
        $books = array_filter($allBooks, function ($book) use ($categoryName) {
            return isset($book['category_name']) && $book['category_name'] === $categoryName;
        });

        $this->view("pages/{$viewName}", [$dataKey => $books]);
    }

    public function literarybook()
    {
        $this->renderBooksByCategory('Literary Book', 'literarybook', 'literaryBooks');
    }

    public function historicalbook()
    {
        $this->renderBooksByCategory('Historical Book', 'historicalbook', 'historicalBooks');
    }

    public function educationbook()
    {
        $this->renderBooksByCategory('Education/References Book', 'educationbook', 'educationBooks');
    }

    public function romancebook()
    {
        $this->renderBooksByCategory('Romance Book', 'romancebook', 'romanceBooks');
    }

    public function horrorbook()
    {
        $this->renderBooksByCategory('Horror Book', 'horrorbook', 'horrorBooks');
    }

    public function cartoonbook()
    {
        $this->renderBooksByCategory('Cartoon Book', 'cartoonbook', 'cartoonBooks');
    }

    // History 
    public function history()
    {
        AuthMiddleware::userOnly();

        $user = $_SESSION['session_loginuser'] ?? null;

        if (!$user) {
            setMessage('error', 'User not found.');
            redirect('pages/login');
            return;
        }

        $userId = $user['id'] ?? null;
        $userName = $user['name'] ?? null;

        if (!$userId || !$userName) {
            setMessage('error', 'User information incomplete.');
            redirect('pages/login');
            return;
        }

        // Get all reserved and borrowed books
        $allReserved = $this->db->readAll('reservation_view');
        $allBorrowed = $this->db->readAll('borrow_full_view');

        // Filter by user_id for reserved books
        $reservedBooks = array_filter($allReserved, function ($item) use ($userId) {
            return isset($item['user_id']) && $item['user_id'] == $userId;
        });

        // Filter by user name for borrowed books
        $borrowedBooks = array_filter($allBorrowed, function ($item) use ($userName) {
            return isset($item['name']) && $item['name'] === $userName;
        });

        $data = [
            'borrowedBooks' => $borrowedBooks,
            'reservedBooks' => $reservedBooks
        ];

        $this->view('pages/history', $data);
    }


    public function userProfile()
    {
        AuthMiddleware::userOnly();

        // Get logged-in user's ID from session
        $id = is_array($_SESSION['session_loginuser'])
            ? $_SESSION['session_loginuser']['id']
            : $_SESSION['session_loginuser'];

        // Fetch user by ID from "users" table
        $loginuser = $this->db->getById('users', $id);

        $data = [
            'loginuser' => $loginuser
        ];

        $this->view('pages/userProfile', $data);
    }


    // edit profile
    public function editProfile($id)
    {
        AuthMiddleware::userOnly();

        $user = $this->db->getById('users', $id);
        if (!$user) {
            setMessage('error', 'User not found.');
            redirect('user/userProfile');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('pages/editProfile', ['user' => $user]);
            return;
        }

        $name   = trim($_POST['name'] ?? '');
        $email  = trim($_POST['email'] ?? '');
        $gender = trim($_POST['gender'] ?? '');
        $rollno = trim($_POST['rollno'] ?? '');
        $year   = trim($_POST['year'] ?? '');

        // Validate required fields
        if ($name === '' || $email === '') {
            setMessage('error', 'Name and Email are required.');
            redirect('pages/editProfile');
            return;
        }

        $updatedUser = [
            'name'   => $name,
            'email'  => $email,
            'gender' => $gender,
        ];

        $updated = $this->db->update('users', $id, $updatedUser);

        if (!$updated) {
            setMessage('error', 'User update failed.');
        } else {
            setMessage('success', 'User updated successfully.');
        }

        redirect('user/userProfile');
    }


    public function changeUserPassword()
    {
        AuthMiddleware::userOnly();

        $user = $_SESSION['session_loginuser'] ?? null;
        if (!$user) {
            setMessage('error', 'User not found.');
            redirect('pages/login');
            return;
        }

        $currentPassword = trim($_POST['currentPassword'] ?? '');
        $newPassword     = trim($_POST['newPassword'] ?? '');
        $confirmPassword = trim($_POST['confirmPassword'] ?? '');

        // Validate all fields are filled
        if ($currentPassword === '' || $newPassword === '' || $confirmPassword === '') {
            setMessage('error', 'All fields are required.');
            redirect('pages/changeUserPassword');
            return;
        }

        // Fetch user record to verify current password
        $dbUser = $this->db->getById('users', $user['id']);
        if (!$dbUser || base64_encode($currentPassword) !== $dbUser['password']) {
            setMessage('error', 'Current password is incorrect.');
            redirect('pages/changeUserPassword');
            return;
        }

        // Validate password match
        if ($newPassword !== $confirmPassword) {
            setMessage('error', 'Passwords must match.');
            redirect('pages/changeUserPassword');
            return;
        }

        // Validate password length
        if (strlen($newPassword) < 6) {
            setMessage('error', 'Password length must be at least 6 characters.');
            redirect('pages/changeUserPassword');
            return;
        }

        // Encode and update password
        $updatedPassword = base64_encode($newPassword);
        $updated = $this->db->update('users', $user['id'], ['password' => $updatedPassword]);

        if ($updated) {
            setMessage('success', 'Password changed successfully.');
        } else {
            setMessage('error', 'Failed to change password.');
        }

        redirect('user/userProfile');
    }
}