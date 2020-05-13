<?php 

use Doctrine\DBAL\Driver\PDOException;

require '../vendor/autoload.php';

class Database
{


    public $conn;

    public function getConnection()
    {
        try {
            $connParam = [
                'url' => 'mysql://root@localhost/careerdb'
            ];
            $this->conn = \Doctrine\DBAL\DriverManager::getConnection($connParam);
        } catch (PDOException $e) {
            echo "Connection Error ". $e->getMessage();
        }

        return $this->conn;
    }
}



?>