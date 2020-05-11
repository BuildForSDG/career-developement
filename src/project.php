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


    if ($dbc){
     echo 'yeah';
     }else{
       echo 'Could not connect because:mysqli_connect_error()';
   }

 }
}

$project=new Project;
$project->connection();