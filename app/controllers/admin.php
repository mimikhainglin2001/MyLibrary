<?php
class Admin extends Controller
{
    private $db;
    public function __construct()
    {
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
    
    public function manageMember()
    {
        $members = $this->db->getAllMembers('users');
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
        $this->view('admin/reservation');
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
}
