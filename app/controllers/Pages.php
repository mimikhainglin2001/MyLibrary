<?php
require_once APPROOT .'/middleware/authmiddleware.php';
class Pages extends Controller
{

    private $db;
    private $user;
   public function __construct()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $this->user = $_SESSION['session_loginuser'] ?? null;

    $this->db = new Database();
}

    public function index()
    {
        $this->view('pages/welcome');
    }

    public function home()
    {
        $this->view('pages/home');
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
        AuthMiddleware::userOnly();
        $this->view('pages/category');
    }

    public function literarybook()
    {
        AuthMiddleware::userOnly();
        $literaryBooks = $this->db->getbookcategory('book_details', 'category_name', $categoryName = 'Literary Book');

        $data = [
            'literaryBooks' => $literaryBooks
        ];
        foreach ($data['literaryBooks'] as &$book) {
            $available = (int)($book['available_quantity'] ?? 0);
           // $total = (int)($book['total_quantity'] ?? 0);

            if ($available === 0) {
                $book['status_description'] = 'Not Available';
            } else {
                $book['status_description'] = 'Available';
            }
        }

        $this->view('pages/literarybook', $data);
    }
    public function historicalbook()
    {
        AuthMiddleware::userOnly();
        $historicalBooks = $this->db->getbookcategory('book_details', 'category_name', $categoryName = 'Historical Book');
        $data = [
            'historicalBooks' => $historicalBooks
        ];
        foreach ($data['historicalBooks'] as &$book) {
            $available = (int)($book['available_quantity'] ?? 0);
            //$total = (int)($book['total_quantity'] ?? 0);

            if ($available === 0) {
                $book['status_description'] = 'Not Available';
            } else {
                $book['status_description'] = 'Available';
            }
        }
        $this->view('pages/historicalbook', $data);
    }
    public function educationbook()
    {
        AuthMiddleware::userOnly();
        $educationBooks = $this->db->getbookcategory('book_details', 'category_name', $categoryName = 'Education/References Book');
        $data = [
            'educationBooks' => $educationBooks
        ];
        foreach ($data['educationBooks'] as &$book) {
            $available = (int)($book['available_quantity'] ?? 0);
            //$total = (int)($book['total_quantity'] ?? 0);

            if ($available === 0) {
                $book['status_description'] = 'Not Available';
            } else {
                $book['status_description'] = 'Available';
            }
        }
        $this->view('pages/educationbook', $data);
    }
    public function romancebook()
    {
        AuthMiddleware::userOnly();
        $romanceBooks = $this->db->getbookcategory('book_details', 'category_name', $categoryName = 'Romance Book');
        $data = [
            'romanceBooks' => $romanceBooks
        ];
        foreach ($data['romanceBooks'] as &$book) {
            $available = (int)($book['available_quantity'] ?? 0);
            //$total = (int)($book['total_quantity'] ?? 0);

            if ($available === 0) {
                $book['status_description'] = 'Not Available';
            } else {
                $book['status_description'] = 'Available';
            }
        }
        $this->view('pages/romancebook', $data);
    }
    public function horrorbook()
    {
        AuthMiddleware::userOnly();
        $horrorBooks = $this->db->getbookcategory('book_details', 'category_name', $categoryName = 'Horror Book');
        $data = [
            'horrorBooks' => $horrorBooks
        ];
        foreach ($data['horrorBooks'] as &$book) {
            $available = (int)($book['available_quantity'] ?? 0);
            //$total = (int)($book['total_quantity'] ?? 0);

            if ($available === 0) {
                $book['status_description'] = 'Not Available';
            } else {
                $book['status_description'] = 'Available';
            }
        }
        $this->view('pages/horrorbook', $data);
    }
    public function cartoonbook()
    {
        AuthMiddleware::userOnly();
        $cartoonBooks = $this->db->getbookcategory('book_details', 'category_name', $categoryName = 'Cartoon Book');
        $data = [
            'cartoonBooks' => $cartoonBooks
        ];
        foreach ($data['cartoonBooks'] as &$book) {
            $available = (int)($book['available_quantity'] ?? 0);
            //$total = (int)($book['total_quantity'] ?? 0);

            if ($available === 0) {
                $book['status_description'] = 'Not Available';
            } else {
                $book['status_description'] = 'Available';
            }
        }
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
    //      public function profile()
    // {
    //     $this->view('pages/profile');
    // }
    public function history()
    {
        AuthMiddleware::userOnly();
        $name = $this->user;
        $isid = $this->db->getBorrowBook('borrow_full_view', $name['name']);
        $reserved = $this->db->getReservationBook('reservation_view',$name['name']);
        $data = [
            'borrowedBooks' => $isid,
            'reservedBooks' => $reserved
        ];
     
        $this->view('pages/history', $data);
    }
    public function userProfile()
    {
        AuthMiddleware::userOnly();
        $id = is_array($_SESSION['session_loginuser']) ? $_SESSION['session_loginuser']['id'] : $_SESSION['session_loginuser'];
        $loginuser = $this->db->getUserWithRoleById($id);

        $data = [
            'loginuser' => $loginuser
        ];

        $this->view('pages/userProfile', $data);
    }
    public function editProfile()
    {
        AuthMiddleware::userOnly();
        $id = is_array($_SESSION['session_loginuser']) ? $_SESSION['session_loginuser']['id'] : $_SESSION['session_loginuser'];
        $loginuser = $this->db->getUserWithRoleById($id);
        $data = [
            'loginuser' => $loginuser
        ];
        $this->view('pages/editProfile', $data);
    }
    public function changeUserPassword()
    {
        $this->view('pages/changeUserPassword');
    }

    
}
