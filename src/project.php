<?php

namespace App;

use mysqli;

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

 function registerUser ($dbc,$type_of_user,$password,$location,$business_description,$company,$name,$email,$mobile,$educational_level,$category){
  

$q="INSERT INTO users (name,type,email,password,mobile,location,business_description,company,educational_level,category) 
VALUES ('$name','$type_of_user','$email','$password','$mobile','$location','$business_description','$company','$educational_level','$category') ";


   if (mysqli_query($dbc,$q)) {
      return true;
   }



}

  function confirmationMail($email,$name){
   $subject="Account Activated Notification";
   $message="Hello ".$name.",\r\n\r\n"
      ."Your  account has been created.Click here: ".$_SERVER['SERVER_NAME'].'/'.$email."  to log in.\r\n\r\n";
   
$headers="From: mlsghana <no-reply@".$_SERVER['SERVER_NAME'].">";


mail($email,$subject,$message,$headers);
   
  

  }

  function loginUser($dbc,$email,$password){
    $q="SELECT * FROM users WHERE email= '$email' && password= md5('$password')";
    
    $r=mysqli_query($dbc,$q);
    
    if(mysqli_num_rows($r)==1){

      $x=mysqli_fetch_assoc($r);
       
       if($x['status']=='Active'){
       
        $_SESSION['user']=$x;
        //print_r($_SESSION['user']);
        header('Location:dashboard.php');
       }
  }
 }
}

function updateUserInfo($dbc)
{
  if($_POST['type'] == 'trainee')
  {
     $query = "UPDATE users SET name='$_POST['name']', mobile='$_POST['mobile']', email='$_POST['email']', location='$_POST['location']', educational_level='$_POST['educational_level']' WHERE id= '$_POST['id']'";
    }else{
      
      $query = "UPDATE users SET name='$_POST['name']', mobile='$_POST['mobile']', email='$_POST['email']', location='$_POST['location']', company='$_POST['company']', business_description='$_POST['business_description']', WHERE id= '$_POST['id']'";
  }

  $run = mysqli_query($dbc, $query);

  if($run)
  {
    return true;
  }

}

/*$project=new Project;
$project->connection();*/