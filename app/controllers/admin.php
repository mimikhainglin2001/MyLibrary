<?php 
class Admin extends Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
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
        $this->view('admin/issueBook');
    }
    public function addnewBook()
    {
        $this->view('admin/addnewBook');
    }
     public function returnBook()
    {
        $this->view('admin/returnBook');
    }
      public function reservation()
    {
        $this->view('admin/reservation');
    }
     public function profile()
    {   
       $loginuser = $this->db->getById('users',$_SESSION['session_loginuser']);
    //    var_dump($loginuser);die();
       $data = [
            'loginuser' => $loginuser
       ];
        $this->view('admin/profile' , $data);
    }

    // Additional admin methods can be added here
}


?>