<?php
class Book extends Controller
{
    private $db;

    public function __construct()
    {
        $this->model('BookModel'); // optional if autoloading
        $this->model('AuthorModel'); // optional if autoloading
        $this->db = new Database();
    }

    public function registerBook()
{
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        setMessage('error', 'Invalid request.');
        return;
    }

  
    $requiredFields = ['title', 'author', 'isbn', 'category', 'total_quantity'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            setMessage('error', 'All fields are required.');
            return;
        }
    }

    
    $isbn = $_POST['isbn'];
    if ($this->db->columnFilter('books', 'isbn', $isbn)) {
        setMessage('error', 'This book already exists.');
        redirect('admin/addnewBook');
    }

    $categoryName = $_POST['category'];
    $getcategoryid = $this->db->columnFilter('categories', 'name', $categoryName);
    $categoryId = $getcategoryid ? $getcategoryid['id'] : null;

    if (!$categoryId) {
        setMessage('error', 'Invalid category.');
        return;
    }

    $authorName = $_POST['author'];
    $getauthorid = $this->db->columnFilter('authors', 'name', $authorName);
    if ($getauthorid) {
        $authorId = $getauthorid['id'];
    } else {
        $authorModel = new AuthorModel();
        $authorModel->setName($authorName);
        $this->db->create('authors', $authorModel->toArray());

        // Get the newly created author ID
        $getauthorid = $this->db->columnFilter('authors', 'name', $authorName);
        $authorId = $getauthorid['id'];
    }

    $imagePath = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'public/images/';
    $originalName = basename($_FILES['image']['name']);
    $imageName = uniqid('book_') . '_' . $originalName;
    $targetPath = $uploadDir . $imageName;


    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $imagePath = $targetPath;
    } else {
        setMessage('error', ' Failed to move uploaded file.');
        return;
    }
} else {
    setMessage('error', ' Image not uploaded or error occurred.');
    return;
}

    $book = new BookModel();
    $book->setTitle($_POST['title']);
    $book->setAuthorID($authorId);
    $book->setIsbn($isbn);
    $book->setCategoryID($categoryId);
    $book->setTotalQuantity($_POST['total_quantity']);
    $book->setAvailableQuantity(null); 
    $book->setStatusID(1);
    $book->setImage($imagePath);

    $insert = $this->db->create('books', $book->toArray());

    if ($insert) {
        setMessage('success', ' Book added successfully.');
        // redirect('admin/manageBook');
    } else {
        setMessage('error', ' Failed to add book.');
        // redirect('admin/addnewBook');
    }
}
}

?>
