<?php

namespace App;

class Project
{


  function connection()
  {
    $servername = $_SERVER['localhost'];
    $username = "Alalinga";
    $password = "MUba$17912sophia";
    $database = "careerdb";

    $dbc = mysqli_connect($servername, $username, $password, $database);
    return $dbc;

    /*if ($dbc){
     echo 'yeah';
     }else{
       echo 'Could not connect because:mysqli_connect_error()';
   }*/
  }

  function registerUser($dbc, $type_of_user, $password, $location, $business_description, $company, $name, $email, $mobile, $educational_level, $category)
  {


    $q = "INSERT INTO users (name,type,email,password,mobile,location,business_description,company,educational_level,category) 
VALUES ('$name','$type_of_user','$email','$password','$mobile','$location','$business_description','$company','$educational_level','$category') ";


    if (mysqli_query($dbc, $q)) {
      return true;
    }
  }

  function confirmationMail($email, $name)
  {
    $subject = "Account Activated Notification";
    $message = "Hello " . $name . ",\r\n\r\n"
      . "Your  account has been created.Click here: " . $_SERVER['SERVER_NAME'] . '/' . $email . "  to log in.\r\n\r\n";

    $headers = "From: mlsghana <no-reply@" . $_SERVER['SERVER_NAME'] . ">";


    mail($email, $subject, $message, $headers);
  }

  function loginUser($dbc, $email, $password)
  {
    $q = "SELECT * FROM users WHERE email= '$email' && password= md5('$password')";

    $r = mysqli_query($dbc, $q);

    if (mysqli_num_rows($r) == 1) {

      $x = mysqli_fetch_assoc($r);

      if ($x['status'] == 'Active') {

        $_SESSION['user'] = $x;
        //print_r($_SESSION['user']);
        header('Location:profile.php');
      }
    }
  }

  function fetchAllInvestors($dbc, $location, $category)
  {
    global $result;
    if(empty($location) && empty($category)){
    $sql = "SELECT name,mobile,email,company,location,business_description FROM users WHERE type='investor'";
    $result = $dbc->query($sql);
    }

    elseif (!empty($location) && empty($category)) {
      $sql = "SELECT name,mobile,email,company,location,business_description FROM users WHERE location='$location'";
      $result = $dbc->query($sql);
      
    }
    elseif(!empty($category) && empty($location)){
      $sql = "SELECT name,mobile,email,company,location,business_description FROM users WHERE category='$category'";
    
      $result = $dbc->query($sql);

    }
   elseif(!empty($location) && !empty($category)){
    $sql = "SELECT name,mobile,email,company,location,business_description FROM users WHERE location='$location' AND category='$category'";
    $result = $dbc->query($sql);
   }


    return $result;
  }
  function fetchAllTrainees($dbc, $location){
    global $result;
    if(empty($location)){
    $sql = "SELECT name,mobile,email,location FROM users WHERE type='trainee'";
    $result = $dbc->query($sql);
    }

    elseif (!empty($location)) {
      $sql = "SELECT name,mobile,email,location FROM users WHERE location='$location'";
      $result = $dbc->query($sql);
      
    }
   return $result;
  }


  function fetchAllServiceproviders($dbc, $location)
  {
    global $result;
    if(empty($location) && empty($category)){
    $sql = "SELECT name,mobile,email,company,location,business_description FROM users WHERE type='service_provider' ";
    $result = $dbc->query($sql);
    }

    elseif (!empty($location)) {
      $sql = "SELECT name,mobile,email,company,location,business_description FROM users WHERE location='$location'";
      $result = $dbc->query($sql);
      
    }
    

<<<<<<< HEAD
    return $result;
=======
      $x=mysqli_fetch_assoc($r);
       
       if($x['status']=='Active'){
       
        $_SESSION['user']=$x;
        //print_r($_SESSION['user']);
        header('Location:dashboard.php');
       }
>>>>>>> 4917c70b95b34c2f5d600e03760e7a0d02858b9e
  }

}



/*$project=new Project;
$project->connection();*/
