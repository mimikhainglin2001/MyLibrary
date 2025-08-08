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

        // Validate required fields
        $required = ['title', 'author', 'isbn', 'category', 'total_quantity'];
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                setMessage('error', 'All fields are required.');
                return;
            }
        }

        $title         = trim($_POST['title']);
        $authorName    = trim($_POST['author']);
        $isbn          = trim($_POST['isbn']);
        $categoryName  = trim($_POST['category']);
        $totalQuantity = (int) $_POST['total_quantity'];
        $availableQty  = $totalQuantity;
        $statusId      = 1;
        $statusDesc    = 'Available';

        // Prevent duplicate books by ISBN
        if ($this->db->columnFilter('books', 'isbn', $isbn)) {
            setMessage('error', 'This book already exists.');
            redirect('admin/addnewBook');
            return;
        }

        // Get category ID
        $category = $this->db->columnFilter('categories', 'name', $categoryName);
        if (!$category || !isset($category['id'])) {
            setMessage('error', 'Invalid category.');
            return;
        }
        $categoryId = $category['id'];

        // Get or create author ID
        $author = $this->db->columnFilter('authors', 'name', $authorName);
        if (!$author) {
            $authorModel = new AuthorModel();
            $params = [$authorName];
            $this->db->storeprocedure('InsertAuthor', $params);

            $author = $this->db->columnFilter('authors', 'name', $authorName);
        }

        if (!$author || !isset($author['id'])) {
            setMessage('error', 'Failed to assign author.');
            return;
        }
        $authorId = $author['id'];

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
                setMessage('error', 'Failed to upload image.');
                return;
            }

            $image = $targetPath;
        } else {
            setMessage('error', 'Image is required.');
            return;
        }

        // Prepare parameters for stored procedure
        $params = [
            $title,
            $image,
            $isbn,
            $categoryId,
            $authorId,
            $totalQuantity,
            $availableQty,
            $statusId,
            $statusDesc
        ];

        // Insert via stored procedure
        if ($this->db->storeprocedure('InsertBook', $params)) {
            setMessage('success', 'Book added successfully.');
            redirect('admin/manageBook');
        } else {
            setMessage('error', 'Failed to add book.');
            redirect('admin/addnewBook');
        }
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
