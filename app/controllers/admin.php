<?php
require_once APPROOT . '/middleware/authmiddleware.php';
class Admin extends Controller
{
    private $db;
    public function __construct()
    {
        AuthMiddleware::adminOnly();
        $this->db = new Database();
    }
    public function index()
    {
        // Redirect to admin profile or dashboard
        redirect('admin/profile');
    }

    public function adminDashboard()
    {
        $this->view('admin/adminDashboard');
    }
    public function adminregister()
    {
        $this->view('admin/adminregister');
    }

    public function adminlist()
    {
        $allUsers = $this->db->readAll('users');
        $admins = [];

        foreach ($allUsers as $user) {
            if ((int)$user['role_id'] === 1) { // Admin role
                $admins[] = $this->db->getById('users', $user['id']);
            }
        }

        $data = ['admins' => $admins];
        $this->view('admin/adminlist', $data);
    }

    public function manageMember()
    {
        $allUsers = $this->db->readAll('users');
        $members = [];

        foreach ($allUsers as $user) {
            if ((int)$user['role_id'] === 2) { // Member role
                $members[] = $this->db->getById('users', $user['id']);
            }
        }

        $data = ['members' => $members];
        $this->view('admin/manageMember', $data);
    }

    public function manageBook()
    {
        $booklist = $this->db->readAll('book_details');
        $data = ['booklist' => $booklist];
        $this->view('admin/manageBook', $data);
    }

    public function issueBook()
    {
        $borrowBookList = $this->db->readAll('borrow_full_view');
        $data = ['borrowBookList' => $borrowBookList];
        $this->view('admin/issueBook', $data);
    }

    public function addnewBook()
    {
        $this->view('admin/addnewBook');
    }

    public function returnBook()
    {
        $returnBookList = $this->db->readAll('borrow_full_view');
        $data = ['returnBookList' => $returnBookList];
        $this->view('admin/returnBook', $data);
    }

    public function reservation()
    {
        $reservedBookList = $this->db->readAll('reservation_view');
        $data = ['reservedBookList' => $reservedBookList];
        $this->view('admin/reservation', $data);
    }

    public function profile()
    {
        $id = is_array($_SESSION['session_loginuser']) ? $_SESSION['session_loginuser']['id'] : $_SESSION['session_loginuser'];

        $loginuser = $this->db->getById('users', $id);

        if (!$loginuser) {
            setMessage('error', 'User not found.');
            redirect('login'); // or another page suitable for your app
            exit;
        }

        $data = [
            'loginuser' => $loginuser
        ];

        $this->view('admin/profile', $data);
    }


    public function editAdminProfile()
    {
        $id = is_array($_SESSION['session_loginuser']) ? $_SESSION['session_loginuser']['id'] : $_SESSION['session_loginuser'];
        $user = $this->db->getById('users', $id);

        if (!$user) {
            setMessage('error', 'User not found');
            redirect('admin/profile');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedData = [
                'name'   => $_POST['name'] ?? $user['name'],
                'email'  => $_POST['email'] ?? $user['email'],
                'gender' => $_POST['gender'] ?? $user['gender'],
            ];

            if (!$this->db->update('users', $id, $updatedData)) {
                setMessage('error', 'Failed to update profile');
                $data = ['loginuser' => $user];
                $this->view('admin/editAdminProfile', $data);
                return;
            }

            setMessage('success', 'Profile updated successfully');
            redirect('admin/profile');
            return;
        }
        $data = ['loginuser' => $user];
        $this->view('admin/editAdminProfile', $data);
    }

    // edit Member List
    public function editMemberList($id)
    {
        $user = $this->db->getById('users', $id);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // Optionally, you might want to load a view here with $user data
            return;
        }

        $updateUser = [
            'name' => $_POST['name'] ?? $user['name'],
            'year' => $_POST['year'] ?? $user['year'],
            'id'   => $_POST['id'] ?? $user['id'], // Be careful updating 'id', usually it's primary key!
        ];

        if (!$this->db->update('users', $id, $updateUser)) {
            setMessage('error', 'Failed to update member list');
            // Optionally redirect or load view here
            return;
        }

        setMessage('success', 'Member List updated successfully');
        redirect('admin/manageMember');
    }



    // Delete Member List
    public function deleteMemberList($id)
    {
        $user = $this->db->getById('users', $id);

        if (!$user) {
            setMessage('error', 'User not found');
            redirect('admin/manageMember');
            return;
        }

        if (!$this->db->delete('users', $id)) {
            setMessage('error', 'Failed to delete member');
            redirect('admin/manageMember');
            return;
        }

        setMessage('success', 'Member deleted successfully');
        redirect('admin/manageMember');
    }


    // Changed Admin Password in admin profile
    public function changeAdminPassword()
    {
        $this->view('admin/changeAdminPassword');
    }

    public function changePassword()
    {
        $user = $_SESSION['session_loginuser'];

        $currentPassword = $_POST['currentPassword'] ?? null;
        $newPassword = $_POST['newPassword'] ?? null;
        $confirmPassword = $_POST['confirmPassword'] ?? null;

        if (!$currentPassword || !$newPassword || !$confirmPassword) {
            setMessage('error', 'All fields are required');
            redirect('admin/changeAdminPassword');
            return;
        }

        if ($newPassword !== $confirmPassword) {
            setMessage('error', 'Passwords must match');
            redirect('admin/changeAdminPassword');
            return;
        }

        if (strlen($newPassword) < 6) {
            setMessage('error', 'Password length must be more than 6');
            redirect('admin/changeAdminPassword');
            return;
        }

        $updatedPassword = base64_encode($newPassword);
        $updated = $this->db->update('users', $user['id'], ['password' => $updatedPassword]);

        if ($updated) {
            setMessage('success', 'Password changed successfully');
        } else {
            setMessage('error', 'Failed to change password');
        }

        redirect('admin/profile');
    }

    // Edit Admin List
    public function editadminlist($id)
    {
        $user = $this->db->getById('users', $id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? null;
            $department = $_POST['department'] ?? null;
            $status = $_POST['id'] ?? null;

            $updateUser = [
                'name'       => $name,
                'department' => $department,
                'id'         => $status,
            ];

            $updated = $this->db->update('users', $id, $updateUser);

            if (!$updated) {
                setMessage('error', 'Failed to update admin list');
                // You may want to redirect here if needed, e.g. redirect('admin/adminlist');
                return;
            }

            setMessage('success', 'Admin list updated successfully');
            redirect('admin/adminlist');
        }
    }


    // Delete Admin List
    public function deleteadminlist($id)
    {
        $user = $this->db->getById('users', $id);

        if (!$user) {
            setMessage('error', 'Admin not found');
            redirect('admin/adminlist');
            return;
        }

        $deleted = $this->db->delete('users', $id);

        if (!$deleted) {
            setMessage('error', 'Failed to delete admin');
        } else {
            setMessage('success', 'Admin deleted successfully');
        }

        redirect('admin/adminlist');
    }
}
