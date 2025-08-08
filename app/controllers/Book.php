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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            // var_dump($title);
            // die();
            $isbn = $_POST['isbn'];
            $author = $_POST['author_name'];
            $total_quantity = $_POST['total_quantity'];
            $status_description = $_POST['status_description'];

            $bookid = $this->db->columnFilter('books', 'isbn', $isbn);

            $possible = $total_quantity - $bookid['total_quantity'];
            $available_quantity = $bookid['available_quantity'] + $possible;


            $updateBook = [
                'total_quantity' => $total_quantity,
                'available_quantity' => $available_quantity,
                'status_description' => $status_description
            ];

            $updated = $this->db->update('books', $id, $updateBook);
            // var_dump($updated);
            // die();
            if (!$updated) {
                setMessage('error', 'Failed to update books');
                redirect('admin/manageBook');
            }
            setMessage('success', 'Books updated successfully');
            redirect('admin/manageBook');
        }
    }
}
