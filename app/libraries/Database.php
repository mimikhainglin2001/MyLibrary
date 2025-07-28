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

    // public function create($table, $data)
    // {
    //     // print_r($data);  
    //     // exit;
    //     try {
    //         $column = array_keys($data);
    //         $columnSql = implode(', ', $column);
    //         $bindingSql = ':' . implode(',:', $column);
    //         //echo $bindingSql;
    //         $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
    //         // echo $sql;
    //         // exit;
    //         $stm = $this->pdo->prepare($sql);  
    //         // print_r($stm);
    //         // exit;
    //         foreach ($data as $key => $value) {
    //             // echo $key . ' => ' . $value . '<br>';
    //             // echo ':' . $key . ' => ' . $value . '<br>';

    //             $stm->bindValue(':' . $key, $value);
    //         }
    //         // print_r($stm);
    //         $status = $stm->execute();
    //         // echo $status;
    //         return ($status) ? $this->pdo->lastInsertId() : false;
    //     } catch (PDOException $e) {
    //         echo $e;
    //     }
    // }

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

            echo "Insert successful. Last Insert ID: " . $this->pdo->lastInsertId() . "<br>";
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "PDOException: " . $e->getMessage();
            return false;
        }
    }

    // Update Query
    public function update($table, $id, $data)
    {
        // First, we don't want id from category table
        if (isset($data['id'])) {
            unset($data['id']);
        }

        try {
            $columns = array_keys($data);
            function map($item)
            {
                return $item . '=:' . $item;
            }
            $columns = array_map('map', $columns);
            $bindingSql = implode(',', $columns);
            // echo $bindingSql;
            // exit;
            $sql = 'UPDATE ' .  $table . ' SET ' . $bindingSql . ' WHERE `id` =:id';
            $stm = $this->pdo->prepare($sql);

            // Now, we assign id to bind
            $data['id'] = $id;

            foreach ($data as $key => $value) {
                $stm->bindValue(':' . $key, $value);
            }
            $status = $stm->execute();
            // print_r($status);
            return $status;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    //     public function updateWhere($table, $where, $data)
    // {
    //     $set = '';
    //     foreach ($data as $key => $value) {
    //         $set .= "$key = :set_$key, ";
    //     }
    //     $set = rtrim($set, ', ');

    //     $conditions = '';
    //     foreach ($where as $key => $value) {
    //         $conditions .= "$key = :where_$key AND ";
    //     }
    //     $conditions = rtrim($conditions, 'AND ');

    //     $sql = "UPDATE $table SET $set WHERE $conditions";
    //     $stmt = $this->pdo->prepare($sql);

    //     foreach ($data as $key => $value) {
    //         $stmt->bindValue(":set_$key", $value);
    //     }

    //     foreach ($where as $key => $value) {
    //         $stmt->bindValue(":where_$key", $value);
    //     }

    //     return $stmt->execute();
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
    public function getbookcategory($table, $column, $value)
    {
        // $sql = 'SELECT * FROM ' . $table . ' WHERE `' . $column . '` = :value';
        $sql = 'SELECT * FROM ' . $table . ' WHERE `' . str_replace('`', '', $column) . '` = :value';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':value', $value);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
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
    public function getUserWithRoleById($id)
    {
        $sql = "SELECT u.*, r.role_name AS role_name
            FROM users u
            LEFT JOIN roles r ON u.role_id = r.id
            WHERE u.id = :id";

        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }



    public function getAllMembers($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        $stm = $this->pdo->prepare($sql);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getBorrowBook($table, $user_name)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `name` =:name';
        // print_r($sql);
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':name', $user_name);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
    public function getBookList($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        $stm = $this->pdo->prepare($sql);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
    public function getBorrowBookList($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        $stm = $this->pdo->prepare($sql);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
    public function getReturnBookList($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        $stm = $this->pdo->prepare($sql);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    // Fetch the book_id using isbn
    public function getBookIdByISBN($isbn)
    {
        $sql = 'SELECT id FROM books WHERE isbn = :isbn';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':isbn', $isbn);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }


    public function getByCategoryId($table, $column)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE name =:column');
        $stm->bindValue(':column', $column);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        //  print_r($row);
        return ($success) ? $row : [];
    }

    // For Dashboard
    // public function incomeTransition()
    // {
    //    try{

    //        $sql        = "SELECT *,SUM(amount) AS amount FROM incomes WHERE
    //        (date = { fn CURDATE() }) ";
    //        $stm = $this->pdo->prepare($sql);
    //        $success = $stm->execute();

    //        $row     = $stm->fetch(PDO::FETCH_ASSOC);
    //        return ($success) ? $row : [];

    //     }
    //     catch( Exception $e)
    //     {
    //         echo($e);
    //     }

    // }

    public function incomeTransition()
    {
        try {
            $sql = "SELECT SUM(amount) AS total_amount FROM incomes WHERE date = CURDATE()";
            $stm = $this->pdo->prepare($sql);
            $success = $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return ($success) ? $row : [];
        } catch (Exception $e) {
            echo ($e);
        }
    }


    // public function expenseTransition()
    // {
    //    try{

    //        $sql        = "SELECT * ,SUM(amount*qty) AS amount FROM expenses WHERE
    //        (date = { fn CURDATE() }) ";
    //        $stm = $this->pdo->prepare($sql);
    //        $success = $stm->execute();

    //        $row     = $stm->fetch(PDO::FETCH_ASSOC);
    //        return ($success) ? $row : [];

    //     }
    //     catch( Exception $e)
    //     {
    //         echo($e);
    //     }

    // }
    public function expenseTransition()
    {
        try {
            $sql = "SELECT SUM(amount * qty) AS total_expense FROM expenses WHERE date = CURDATE()";
            $stm = $this->pdo->prepare($sql);
            $success = $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return ($success) ? $row : [];
        } catch (Exception $e) {
            echo ($e);
        }
    }
}
