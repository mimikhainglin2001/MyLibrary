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

    // public function home()
    // {
    //     $this->view('pages/index');
    // }

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

    public function literarybook()
    {
        $this->view('pages/literarybook');
    }
     public function historicalbook()
    {
        $this->view('pages/historicalbook');
    }
    public function educationbook()
    {
        $this->view('pages/educationbook');
    }
     public function romancebook()
    {
        $this->view('pages/romancebook');
    }
     public function horrorbook()
    {
        $this->view('pages/horrorbook');
    }
     public function cartoonbook()
    {
        $this->view('pages/cartoonbook');
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
      public function history()
    {
        $this->view('pages/history');
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
