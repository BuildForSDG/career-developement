<?php 
class Database 
{
    private $host = "localhost";
    private $dbname = 'careerdb';
    private $username = 'root';
    private $password = "";

    public $conn;


    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=". $this->host. ";dbname=". $this->dbname, $this->username, $this->password);

        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}



?>