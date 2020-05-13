<?php
    namespace App\Register;

    class Register
    {
        private $conn;
        private $table_name = 'users';

        public $name, $company, $type, $email, $password, $phone, $location, $business_description, $education_level;
        public function __construct($db)
        {
            $this->conn = $db;
        }


        public function loadRegisterView()
        {
            header("Location: ./pages/register.php");
        }


        public function create()
        {
            $query = "INSERT INTO ". $this->table_name. "name=:name, type=:type, email=:email, password=:password, phone=:phone, location=:location, business_description=:business_description, education_level=:education_level";


            $stmt = $this->conn->prepare($query);

            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->type=htmlspecialchars(strip_tags($this->type));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->phone=htmlspecialchars(strip_tags($this->phone));
            $this->location=htmlspecialchars(strip_tags($this->location));
            $this->education_level=htmlspecialchars(strip_tags($this->education_level));
            $this->business_description=htmlspecialchars(strip_tags($this->business_description));

            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":type", $this->type);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":location", $this->location);
            $stmt->bindParam(":education_level", $this->education_level);
            $stmt->bindParam(":business_description", $this->business_description);


            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

    }

?>