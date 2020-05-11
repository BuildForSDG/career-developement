<?php

namespace App;

class Project
{
    function connection(){
    $servername = $_SERVER['SERVER_NAME'];
    $username = "root";
    $password = "";
    $database='careerdb';
    
    $dbc=mysqli_connect($servername,$username,$password ,$database);
    return $dbc;

    /*if ($dbc){
     echo 'yeah';
     }else{
       echo 'Could not connect because:mysqli_connect_error()';
   }*/

 }

 function registerUser ($dbc,$type_of_user,$password,$location,$business_description,$company,$name,$email,$mobile,$educational_level){
  

$q="INSERT INTO users (name,type,email,password,mobile,location,business_description,company,educational_level) 
VALUES ('$name','$type_of_user','$email','$password','$mobile','$location','$business_description','$company','$educational_level') ";


   if (mysqli_query($dbc,$q)) {
      return true;
   }



}

}

/*$project=new Project;
$project->connection();*/