<?php

class Pages extends Controller
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function index()
    {
        $this->view('pages/index');
    }

    public function home()
    {
        $this->view('pages/index');
    }

    public function login()
    {
        $this->view('pages/login');
    }

    public function register()
    {
        $this->view('pages/register');
    }
    public function category()
    {
        $this->view('pages/category');
    }

    public function literaryBook()
    {
        $this->view('pages/literaryBook');
    }
     public function historicalBook()
    {
        $this->view('pages/historicalBook');
    }
    public function educationBook()
    {
        $this->view('pages/educationBook');
    }
     public function romanceBook()
    {
        $this->view('pages/romanceBook');
    }
     public function horrorBook()
    {
        $this->view('pages/horrorBook');
    }
     public function cartoonBook()
    {
        $this->view('pages/cartoonBook');
    }
      public function contact()
    {
        $this->view('pages/contact');
    }
     public function forgotPassword()
    {
        $this->view('pages/forgotPassword');
    }
      public function otp()
    {
        $this->view('pages/otp');
    }
     public function changePassword()
    {
        $this->view('pages/changePassword');
    }
  
        public function admin()
    {
        $this->view('pages/login');
    }
         public function profile()
    {
        $this->view('pages/profile');
    }

    public function dashboard()
    {
        $income = $this->db->incomeTransition();
        $expense = $this->db->expenseTransition();

        $data = [
            'income' => isset($income['amount']) ? $income : ['amount' => 0],
            'expense' => isset($expense['amount']) ? $expense : ['amount' => 0]
        ];

        $this->view('pages/dashboard', $data);
    }

}
