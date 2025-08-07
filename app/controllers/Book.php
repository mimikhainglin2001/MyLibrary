<?php
require_once APPROOT . '/middleware/authmiddleware.php';
class Book extends Controller
{
    private $db;

    public function __construct()
    {
        AuthMiddleware::adminOnly();
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

        $required = ['title', 'author', 'isbn', 'category', 'total_quantity'];
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                setMessage('error', 'All fields are required.');
                return;
            }
        }

        $title = $_POST['title'];
        $authorName = $_POST['author'];
        $isbn = $_POST['isbn'];
        $categoryName = $_POST['category'];
        $totalQty = (int)$_POST['total_quantity'];

        if ($this->db->columnFilter('books', 'isbn', $isbn)) {
            setMessage('error', 'This book already exists.');
            return redirect('admin/addnewBook');
        }

        $category = $this->db->columnFilter('categories', 'name', $categoryName);
        if (!$category) {
            setMessage('error', 'Invalid category.');
            return;
        }

        $author = $this->db->columnFilter('authors', 'name', $authorName);
        if (!$author) {
            $authorModel = new AuthorModel();
            $authorModel->setName($authorName);
            $this->db->create('authors', $authorModel->toArray());
            $author = $this->db->columnFilter('authors', 'name', $authorName);
        }

        // Handle image upload
        $image = null;
        if (!empty($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public/images/';
            $imageName = uniqid('book_') . '_' . basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $imageName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                setMessage('error', 'Failed to move uploaded file.');
                return;
            }

            $image = $targetPath;
        } else {
            setMessage('error', 'Image not uploaded or error occurred.');
            return;
        }

        $book = new BookModel();
        $book->title = $title;
        $book->author_id = $author['id'];
        $book->isbn = $isbn;
        $book->category_id = $category['id'];
        $book->total_quantity = $totalQty;
        $book->available_quantity = $totalQty;
        $book->status_id = 1;
        $book->image = $image;

        $inserted = $this->db->create('books', $book->toArray());

        setMessage($inserted ? 'success' : 'error', $inserted ? 'Book added successfully.' : 'Failed to add book.');
        redirect($inserted ? 'admin/manageBook' : 'admin/addnewBook');
    }


    // Edit Book
    public function editBook($id)
    {
        $book = $this->db->getById('books', $id);
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$book) {
            return;
        }

        $title       = $_POST['title'];
        $isbn        = $_POST['isbn'];
        $author      = $_POST['author_name'];
        $totalQty    = (int)$_POST['total_quantity'];
        $statusDesc  = $_POST['status_description'];

        $bookByIsbn = $this->db->columnFilter('books', 'isbn', $isbn);
        if (!$bookByIsbn) {
            setMessage('error', 'Book not found by ISBN');
            return redirect('admin/manageBook');
        }

        $quantityDiff     = $totalQty - $bookByIsbn['total_quantity'];
        $availableQty     = max(0, $bookByIsbn['available_quantity'] + $quantityDiff);

        $updated = $this->db->update('books', $id, [
            'total_quantity'     => $totalQty,
            'available_quantity' => $availableQty,
            'status_description' => $statusDesc
        ]);

        setMessage($updated ? 'success' : 'error', $updated ? 'Books updated successfully' : 'Failed to update books');
        redirect('admin/manageBook');
    }
}
