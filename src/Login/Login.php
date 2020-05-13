<?php
namespace App\Login;

use Doctrine\DBAL\Driver\PDOException;

class Login
{
    private $conn;
    private $table_name = 'users';

    public $fullname, $company, $usertype, $email, $password, $phone, $location;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function loadLoginView()
    {
        header("Location: ./pages/login.php");
    }


    public function create()
    {

    }
}

?>