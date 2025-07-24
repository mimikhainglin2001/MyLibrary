<?php
class Book extends Controller
{
    private $db;

    public function __construct()
    {
        $this->model('BookModel'); // optional if autoloading
        $this->db = new Database();
    }

    public function registerBook() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
            setMessage('error', 'Invalid request.');
            redirect('admin/addnewBook');
            return;
        }

        $requiredFields = ['id', 'title', 'author', 'isbn', 'category', 'total_quantity'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                setMessage('error', 'All fields are required.');
                redirect('admin/addnewBook');
                return;
            }
        }

        $isbn = $_POST['isbn'];
        if ($this->db->columnFilter('books', 'isbn', $isbn)) {
            setMessage('error', 'This book already exists.');
            redirect('admin/addnewBook');
            return;
        }

        // Handle image upload
        // $imagePath = '/public/images/img1.jpg'; 
        // if (!empty($_FILES['image']['name'])) {
        //     $uploadDir = 'public/images/';
        //     $imageName = uniqid('book_') . '_' . basename($_FILES['image']['name']);
        //     $imagePath = $uploadDir . $imageName;

        //     if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        //         setMessage('error', 'Failed to upload image.');
        //        // redirect('admin/addnewBook');
        //         return;
        //     }
        // }

        $book = new BookModel();
        $book->setTitle($_POST['title']);
        $book->setAuthorID($_POST['author']);
        $book->setIsbn($isbn);
        $book->setCategoryID($_POST['category']);
        $book->setTotalQuantity($_POST['total_quantity']);
        $book->setAvailableQuantity($_POST['total_quantity']); // assume full stock
        $book->setStatus('available');
        //$book->setImage($imagePath);

        $insert = $this->db->create('books', $book->toArray());
        var_dump($insert);
        die();
        if ($insert) {
            setMessage('success', 'Book added successfully.');
            redirect('admin/manageBook');
        } else {
            setMessage('error', 'Failed to add book.');
            redirect('admin/addnewBook');
        }
    }
}
?>
