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
        $this->view('admin/manageMember');
    }
    public function manageBook()
    {
        $this->view('admin/manageBook');
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

    // Additional admin methods can be added here
}


?>