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
        $literaryBooks = $this->db->getLiteraryBooks('book_details','category_name',$categoryName = 'Literary Book');
        
        $data = [
            'literaryBooks' => $literaryBooks
        ];
        $this->view('pages/literarybook', $data);
    }
     public function historicalbook()
    {
        $historicalBooks = $this->db->getHistoricalBooks('book_details', 'category_name', $categoryName = 'Historical Book');
        $data = [
            'historicalBooks' => $historicalBooks
        ];
        $this->view('pages/historicalbook', $data);
    }
    public function educationbook()
    {
        $educationBooks = $this->db->getEducationBooks('book_details', 'category_name', $categoryName = 'Education/References Book');
        $data = [
            'educationBooks' => $educationBooks
        ];
        $this->view('pages/educationbook', $data);
    }
     public function romancebook()
    {
        $romanceBooks = $this->db->getRomanceBooks('book_details', 'category_name', $categoryName = 'Romance Book');
        $data = [
            'romanceBooks' => $romanceBooks
        ];
        $this->view('pages/romancebook', $data);
    }
     public function horrorbook()
    {
        $horrorBooks = $this->db->getHorrorBooks('book_details', 'category_name', $categoryName = 'Horror Book');
        $data =[
            'horrorBooks' => $horrorBooks
        ];
        $this->view('pages/horrorbook', $data);
    }
     public function cartoonbook()
    {
        $cartoonBooks = $this->db->getCartoonBooks('book_details', 'category_name', $categoryName = 'Cartoon Book');
        $data = [
            'cartoonBooks' => $cartoonBooks
        ];
        $this->view('pages/cartoonbook', $data);
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
