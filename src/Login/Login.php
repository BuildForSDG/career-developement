<?php

namespace App\Login;

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
        $query = "INSERT INTO ". $this->table_name. "fullname=:fullname, type=:usertype, email=:email, password=:password, phone=:phone, location=:location";
        $stmt = $this->conn->prepare($query);
        
        $this->fullname=htmlspecialchars(strip_tags($this->fullname));
        $this->usertype=htmlspecialchars(strip_tags($this->usertype));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->location=htmlspecialchars(strip_tags($this->location));

        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":usertype", $this->usertype);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":location", $this->location);


        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>