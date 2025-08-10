<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;
    private $stmt;
    private $error;

    public function __construct()
    {
        //to connect to the mysql database
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        //mean separate different part, In this  ; means end of the host part and beginning of the database
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false // For General Error
        );

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            // print_r($this->pdo);
            // echo "Success";
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function create($table, $data)
    {
        try {
            $column = array_keys($data);
            $columnSql = implode(', ', $column);
            $bindingSql = ':' . implode(',:', $column);

            $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
            $stm = $this->pdo->prepare($sql);

            foreach ($data as $key => $value) {
                // exit();
                $stm->bindValue(':' . $key, $value);
            }

            $status = $stm->execute();

            if (!$status) {
                $errorInfo = $stm->errorInfo();
                echo "SQLSTATE error code: " . $errorInfo[0] . "<br>";
                echo "Driver-specific error code: " . $errorInfo[1] . "<br>";
                echo "Driver-specific error message: " . $errorInfo[2] . "<br>";
                return false;
            }

            //echo "Insert successful. Last Insert ID: " . $this->pdo->lastInsertId() . "<br>";
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "PDOException: " . $e->getMessage();
            return false;
        }
    }

    // Update Query
    public function update($table, $id, $data)
    {
        // Remove 'id' from data array if it exists
        if (isset($data['id'])) {
            unset($data['id']);
        }

        try {
            $columns = array_keys($data);

            // Use anonymous function instead of named one
            $columns = array_map(function ($item) {
                return $item . '=:' . $item;
            }, $columns);

            $bindingSql = implode(',', $columns);

            $sql = 'UPDATE ' .  $table . ' SET ' . $bindingSql . ' WHERE `id` =:id';
            $stm = $this->pdo->prepare($sql);

            // Add 'id' to binding data
            $data['id'] = $id;

            foreach ($data as $key => $value) {
                $stm->bindValue(':' . $key, $value);
            }

            return $stm->execute();
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    // public function updateByBookId($table, $book_id, $data)
    // {
    //     // Remove 'book_id' from data array if it exists (to avoid overwriting key)
    //     if (isset($data['book_id'])) {
    //         unset($data['book_id']);
    //     }

    //     try {
    //         $columns = array_keys($data);

    //         $columns = array_map(function ($item) {
    //             return $item . '=:' . $item;
    //         }, $columns);

    //         $bindingSql = implode(',', $columns);

    //         $sql = 'UPDATE ' . $table . ' SET ' . $bindingSql . ' WHERE `book_id` = :book_id';
    //         $stm = $this->pdo->prepare($sql);

    //         // Add book_id to data for binding
    //         $data['book_id'] = $book_id;

    //         foreach ($data as $key => $value) {
    //             $stm->bindValue(':' . $key, $value);
    //         }

    //         return $stm->execute();
    //     } catch (PDOException $e) {
    //         echo $e;
    //         return false;
    //     }
    // }


    public function delete($table, $id)
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE `id` = :id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        return ($success);
    }

    public function columnFilter($table, $column, $value)
    {
        // $sql = 'SELECT * FROM ' . $table . ' WHERE `' . $column . '` = :value';
        $sql = 'SELECT * FROM ' . $table . ' WHERE `' . str_replace('`', '', $column) . '` = :value';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':value', $value);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }


    public function loginCheck($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE `email` = :email AND `password` = :password';
        // echo $sql;
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':password', $password);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function checkotp($email, $otp)
    {
        $sql = 'SELECT * FROM users WHERE `otp` = :otp AND `email` = :email';
        // echo $sql;
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':otp', $otp);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }


    public function storeotp($email, $otp, $otp_expiry)
    {
        $sql = 'UPDATE users SET `otp` = :otp ,`otp_expiry` = :otp_expiry WHERE `email` = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':otp', $otp);
        $stmt->bindValue(':otp_expiry', $otp_expiry);
        $stmt->bindValue(':email', $email);
        $success = $stmt->execute();
        return $success;
    }

    public function setLogin($id)
    {
        $sql = 'UPDATE users SET is_login = 1, is_confirmed = 1, is_active = 1 WHERE id = :id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $success = $stm->execute();
        $stm->closeCursor(); // good practice for unbuffered queries
        return $success;
    }
    public function unsetLogin($id)
    {
        try {
            $sql = "UPDATE users SET is_login = :false WHERE id = :id"; //is_login = :false .is a placeholder to indicate user login(true) or not(false)
            // id = :id also 
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':false', '0');
            $stm->bindValue(':id', $id);
            $success = $stm->execute();
            $row     = $stm->fetch(PDO::FETCH_ASSOC);
            return ($success) ? $row : [];
        } catch (Exception $e) {
            echo ($e);
        }
    }

    public function readAll($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        // print_r($sql);
        $stm = $this->pdo->prepare($sql);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
    public function getById($table, $id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `id` =:id';
        // print_r($sql);
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
    // public function getUserWithRoleById($id)
    // {
    //     $sql = "SELECT u.*, r.role_name AS role_name
    //         FROM users u
    //         LEFT JOIN roles r ON u.role_id = r.id
    //         WHERE u.id = :id";

    //     $stm = $this->pdo->prepare($sql);
    //     $stm->bindValue(':id', $id);
    //     $success = $stm->execute();
    //     $row = $stm->fetch(PDO::FETCH_ASSOC);
    //     return ($success) ? $row : [];
    // }
    // public function getAllMembers($table, $role_id)
    // {
    //     $sql = 'SELECT * FROM ' . $table . ' WHERE `role_id` = :role_id';
    //     $stm = $this->pdo->prepare($sql);
    //     $stm->bindParam(':role_id', $role_id, PDO::PARAM_INT); // <-- binding added
    //     $success = $stm->execute();
    //     $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return ($success) ? $row : [];
    // }
   
    // public function getBorrowBook($table, $user_name)
    // {
    //     $sql = 'SELECT * FROM ' . $table . ' WHERE `name` =:name';
    //     // print_r($sql);
    //     $stm = $this->pdo->prepare($sql);
    //     $stm->bindValue(':name', $user_name);
    //     $success = $stm->execute();
    //     $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return ($success) ? $row : [];
    // }

    // public function getReservationBook($table, $user_name)
    // {
    //     $sql = 'SELECT * FROM ' . $table . ' WHERE `user_name` =:name';
    //     // print_r($sql);
    //     $stm = $this->pdo->prepare($sql);
    //     $stm->bindValue(':name', $user_name);
    //     $success = $stm->execute();
    //     $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return ($success) ? $row : [];
    // }
    // public function getBookList($table)
    // {
    //     $sql = 'SELECT * FROM ' . $table;
    //     $stm = $this->pdo->prepare($sql);
    //     $success = $stm->execute();
    //     $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return ($success) ? $row : [];
    // }
    // public function getBorrowBookList($table)
    // {
    //     $sql = 'SELECT * FROM ' . $table;
    //     $stm = $this->pdo->prepare($sql);
    //     $success = $stm->execute();
    //     $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return ($success) ? $row : [];
    // }
    // public function getReturnBookList($table)
    // {
    //     $sql = 'SELECT * FROM ' . $table;
    //     $stm = $this->pdo->prepare($sql);
    //     $success = $stm->execute();
    //     $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return ($success) ? $row : [];
    // }

    // public function getReservedBookList($table)
    // {
    //     $sql = 'SELECT * FROM ' . $table;
    //     $stm = $this->pdo->prepare($sql);
    //     $success = $stm->execute();
    //     $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return ($success) ? $row : [];
    // }

    // Fetch the book_id using isbn
    // public function getBookIdByISBN($isbn)
    // {
    //     $sql = 'SELECT id FROM books WHERE isbn = :isbn';
    //     $stm = $this->pdo->prepare($sql);
    //     $stm->bindValue(':isbn', $isbn);
    //     $stm->execute();
    //     return $stm->fetch(PDO::FETCH_ASSOC);
    // }


    // public function getByCategoryId($table, $column)
    // {
    //     $stm = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE name =:column');
    //     $stm->bindValue(':column', $column);
    //     $success = $stm->execute();
    //     $row = $stm->fetch(PDO::FETCH_ASSOC);
    //     //  print_r($row);
    //     return ($success) ? $row : [];
    // }

    ////--------------------STORE PROCEDURE --------------------------------------//
    // public function InsertBook($title, $image, $isbn, $category_id, $author_id, $total_quantity, $available_quantity, $status_id, $status_description)
    // {
    //     $sql = 'CALL InsertBook (:title, :image, :isbn, :category_id, :author_id, :total_quantity, :available_quantity, :status_is, :status_description)';
    //     $stm = $this->pdo->prepare($sql);
    //     $stm->bindParam(':title', $title, PDO::PARAM_INT);
    //     $stm->bindParam(':image', $image, PDO::PARAM_INT);
    //     $stm->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    //     $stm->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    //     $stm->bindParam(':author_id', $author_id, PDO::PARAM_INT);
    //     $stm->bindParam(':total_quantity', $total_quantity, PDO::PARAM_INT);
    //     $stm->bindParam(':available_quantity', $available_quantity, PDO::PARAM_INT);
    //     $stm->bindParam(':status_id', $status_id, PDO::PARAM_INT);
    //     $stm->bindParam(':status_description', $status_description, PDO::PARAM_INT);
    //     return $stm->execute();

    // }

    public function storeprocedure($name, $params = [])
    {
        $placeholders = implode(',', array_fill(0, count($params), '?'));
        $sql = "CALL $name($placeholders)";
        $stm = $this->pdo->prepare($sql);
        $stm->execute(array_values($params));
        return true;
    }

    // Method to get borrow count by user
    public function getBorrowCountByUser(int $userId): int
    {
        $sql = "SELECT COUNT(*) as count FROM borrowBook WHERE user_id = :uid AND status = 'borrowed'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($result['count'] ?? 0);
    }

    // Method to check if user borrowed a specific book
    public function hasUserBorrowedBook(int $userId, int $bookId): bool
    {
        $sql = "SELECT 1 FROM borrowBook WHERE user_id = :uid AND book_id = :bid AND status = 'borrowed' LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $userId, 'bid' => $bookId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return !empty($result);
    }
    public function hasPendingReservation(int $userId, int $bookId): bool
    {
        $sql = "SELECT 1 FROM reservations WHERE user_id = :user_id AND book_id = :book_id AND status = 'pending' LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $userId, 'book_id' => $bookId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return !empty($result);
    }
}
