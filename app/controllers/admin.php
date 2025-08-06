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
    $admins = $this->db->getAllAdmins('users',1);
    $data = [
        'admins' => $admins
    ];
    $this->view('admin/adminlist', $data);
}


    public function manageMember()
    {
        $members = $this->db->getAllMembers('users',2);
        $data = [
            'members' => $members
        ];
        $this->view('admin/manageMember', $data);
    }
    public function manageBook()
    {
        $booklist = $this->db->getBookList('book_details');
        $data = [
            'booklist' => $booklist
        ];
        $this->view('admin/manageBook', $data);
    }
    public function issueBook()
    {
        $borrowBookList = $this->db->getBorrowBookList('borrow_full_view');
        $data = [
            'borrowBookList' => $borrowBookList
        ];
        $this->view('admin/issueBook', $data);
    }
    public function addnewBook()
    {
        $this->view('admin/addnewBook');
    }
    public function returnBook()
    {
        $returnBookList = $this->db->getReturnBookList('borrow_full_view');
        $data = [
            'returnBookList' => $returnBookList
        ];
        $this->view('admin/returnBook', $data);
    }
    public function reservation()
    {
        $reservedBookList = $this->db->getReservedBookList('reservation_view');
        $data = [
            'reservedBookList' => $reservedBookList
        ];
        $this->view('admin/reservation',$data);
    }
    public function profile()
    {
        $id = is_array($_SESSION['session_loginuser']) ? $_SESSION['session_loginuser']['id'] : $_SESSION['session_loginuser'];
        $loginuser = $this->db->getUserWithRoleById($id);

        $data = [
            'loginuser' => $loginuser
        ];

        $this->view('admin/profile', $data);
    }
    public function editAdminProfile()
    {
        $id = is_array($_SESSION['session_loginuser']) ? $_SESSION['session_loginuser']['id'] : $_SESSION['session_loginuser'];
        $loginuser = $this->db->getUserWithRoleById($id);
        $data = [
            'loginuser' => $loginuser
        ];

        $this->view('admin/editAdminProfile', $data);
    }
    // admin edit profile
    public function editProfile($id)
    {
        $user = $this->db->getById('users', $id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedata = [
                'name'   => $_POST['name'],
                'email'  => $_POST['email'],
                'gender' => $_POST['gender']
            ];

            if ($this->db->update('users', $id, $updatedata)) {
                setMessage('success', 'Profile updated successfully');
                redirect('admin/profile');
            } else {
                setMessage('error', 'Failed to update profile');
            }
        }


        $data = ['loginuser' => $user];
        $this->view('admin/editAdminProfile', $data);
    }
    // edit Member List
    public function editMemberList($id)
    {
        $user = $this->db->getById('users', $id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            // var_dump($name);
            // die();
            $year = $_POST['year'];
            $status = $_POST['id'];

            $updateUser = [
                'name' => $name,
                'year' => $year,
                'id' => $status

            ];

            $updated = $this->db->update('users', $id, $updateUser);
            // var_dump($updated);
            // die();

            if (!$updated) {
                setMessage('error', 'Failed to update member list');
                //redirect('admin/manageMember');
            } else {
                setMessage('success', 'Member List updated successfully');
                redirect('admin/manageMember');
            }
        }
    }

    // Delete Member List
    public function deleteMemberList($id)
    {
        $user = $this->db->getById('users', $id);
        // var_dump($id);exit;
        if (!$user) {
            setMessage('error', 'User not found');
            redirect('admin/manageMember');
            return;
        }

        $deleted = $this->db->delete('users', $id);

        if ($deleted) {
            setMessage('success', 'Member deleted successfully');
        } else {
            setMessage('error', 'Failed to delete member');
        }

        redirect('admin/manageMember');
    }

    // Changed Admin Password in admin profile
    public function changeAdminPassword(){
        $this->view('admin/changeAdminPassword');
    }

    public function changePassword(){
        $user = $_SESSION['session_loginuser'];
        // var_dump($user);

        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if(!$currentPassword || !$newPassword || !$confirmPassword){
            setMessage('error', 'All fields are required');
            redirect('admin/changeAdminPassword');
            return;
        }

        if($newPassword !== $confirmPassword){
            setMessage('error', 'Passwords must be match');
            //redirect('admin/changeAdminPassword');
        }

        if(strlen($newPassword < 6)){
            setMessage('error', 'Password length must be more than 6');
            //redirect('admin/changeAdminPassword');
        }

        $updatedPassword = base64_encode($newPassword);
        $updated = $this->db->update('users', $user['id'], ['password' => $updatedPassword]);
        setMessage('success', 'Password changed successfully');
        redirect('admin/profile/');

    }
    // Edit Admin List
    public function editadminlist($id)
    {
        $user = $this->db->getById('users', $id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            // var_dump($name);
            // die();
            $department = $_POST['department'];
            $status = $_POST['id'];

            $updateUser = [
                'name' => $name,
                'department' => $department,
                'id' => $status

            ];

            $updated = $this->db->update('users', $id, $updateUser);
            // var_dump($updated);
            // die();

            if (!$updated) {
                setMessage('error', 'Failed to update member list');
                //redirect('admin/adminlist');
            } else {
                setMessage('success', 'Member List updated successfully');
                redirect('admin/adminlist');
            }
        }
    }

    // Delete Admin List
    public function deleteadminlist($id)
    {
        $user = $this->db->getById('users', $id);
        // var_dump($id);exit;
        if (!$user) {
            setMessage('error', 'User not found');
            redirect('admin/adminlist');
            return;
        }

        $deleted = $this->db->delete('users', $id);

        if ($deleted) {
            setMessage('success', 'Member deleted successfully');
        } else {
            setMessage('error', 'Failed to delete member');
        }

        redirect('admin/adminlist');
    }
}
