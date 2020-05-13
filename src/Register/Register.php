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

            $queryBuilder = $this->conn->createQueryBuilder();
            $queryBuilder->insert('users')
                        ->setValue('name', '?')
                        ->setValue('email', '?')
                        ->setValue('password', '?')
                        ->setValue('type', '?')
                        ->setValue('phone', '?')
                        ->setParameter(0, $this->name)
                        ->setParameter(1, $this->email)
                        ->setParameter(2, $this->password)
                        ->setParameter(3, $this->type)
                        ->setParameter(4, $this->phone);
                $stmt = $queryBuilder->execute();
                $id = $this->conn->lastInsertId();

                if($id){
                    $queryBuilder = $this->conn->createQueryBuilder();
                    $queryBuilder->insert('user_details')
                                ->setValue('users_id', '?')
                                ->setValue('location', '?')
                                ->setValue('company', '?')
                                ->setValue('educational_level', '?')
                                ->setValue('business_description', '?')
                                ->setParameter(0, $id)
                                ->setParameter(1, $this->location)
                                ->setParameter(2, $this->company)
                                ->setParameter(3, $this->education_level)
                                ->setParameter(4, $this->business_description);
                    $stmt = $queryBuilder->execute();

                    if($stmt) {
                        return true;
                    }else {
                        return false;
                    }
                }else {
                    echo "Error Saving user";
                }

        }

    }

?>