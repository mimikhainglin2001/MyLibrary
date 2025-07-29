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

            var_dump($user);
            die();
            if (!$user) {
                setMessage('error', 'User not found');
                redirect('admin/manageMember');
                return;
            }
            if ((strtolower($user['user_status_id']) !== 'active')) {
                $deleted = $this->db->delete('users', $id);
                var_dump($deleted);
                die();
                if ($deleted) {
                    setMessage('success', 'Not active member deleted successfully');
                    redirect('admin/manageMember');
                } else {
                    setMessage('error', 'Failed to delete member');
                }
            } else {
                setMessage('error', 'Active members cannot be deleted');
            }
            redirect('admin/manageMember');
        }
    }

