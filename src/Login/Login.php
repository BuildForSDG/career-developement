<?php
namespace App\Login;

use Doctrine\DBAL\Driver\PDOException;

class Login
{
    private $conn;
    private $table_name = 'users';

    public $email, $password;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function loadLoginView()
    {
        header("Location: ./pages/login.php");
    }

    /**
     * Login User
     *
     * @return void
     */
    public function login()
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder->select('id','email','password')
                    ->from('users')
                    ->where('email = ?')
                    ->andWhere('password = ?')
                    ->setParameter(0, $this->email)
                    ->setParameter(1, $this->password);

            $stmt = $queryBuilder->execute();
            $results = $stmt->fetch();

            if($results){
                return true;
            }else {
                return false;
            }

    }
}

?>