<?php

namespace App;

use mysqli;

class Project
{


  function connection()
  {
    $servername = $_SERVER['SERVER_NAME'];
    $username = "root";
    $password = "";
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

  function confirmationMail($id, $name)
  {
    $subject = "Account Activated Notification";
    $server= $_SERVER['SERVER_NAME'];
    $message = "Hello " . $name . ",\r\n\r\n"
      . "Your  account has been created.Click here: " . $server . '?id= ' . $id . "  to log in.\r\n\r\n";

    $headers = "From:  <no-reply@" . $server . ">";


    mail($id, $subject, $message, $headers);
  }

  function confirmUser($dbc)
  {
    $id=htmlspecialchars($_GET['id'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    $query1= " SELECT * FROM users WHERE token='$id' ";
    $run1= mysqli_query($dbc,$query1);
    if(mysqli_num_rows($run1)==1){
      $record= mysqli_fetch_assoc($run1);
      $_SESSION['user']=$record;



      $query2= " UPDATE users SET status='Active' ";
      $run2= mysqli_query($dbc,$query2);
    
    }
  }

  function loginUser($dbc, $email, $password)
  {
    $query = "SELECT * FROM users WHERE email= '$email' && password= md5('$password')";

    $run = mysqli_query($dbc, $q);

    if (mysqli_num_rows($run) == 1) {

      $row = mysqli_fetch_assoc($r);
      if ($row['status'] == 'Active') {
        $_SESSION['user'] = $row;
        //print_r($_SESSION['user']);
        header('Location:dashboard.php');
      }
    }
  }
  function updateUserInfo($dbc)
  {
    $post=$_POST;
    if (isset($post)) {
      $id = $post['id'];
      $name = $post['name'];
      $mobile = $post['mobile'];
      $email = $post['email'];
      $location = $post['location'];




      if ($post['type'] == 'trainee') {
        $educational_level = $post['educational_level'];
        $query = "UPDATE users SET name='$name', mobile='$mobile', email='$email', location='$location', educational_level='$educational_level' WHERE id='$id'";
      } else {
        $company = $post['company'];
        $business_description = $post['business_description'];
        $query = "UPDATE users SET name='$name', mobile='$mobile', email='$email', location='$location', company='$company', business_description='$business_description'  WHERE id='$id'";
      }
    }

    $run = mysqli_query($dbc, $query);
    if ($run) {
      return true;
    }
  }



  function displayUserCount($dbc)
  {
    $numbers = [];
    $query1 = " SELECT * FROM users WHERE type='trainee' ";
    $run1 = mysqli_query($dbc, $query1);
    $numbers['numbers_of_trainees'] = mysqli_num_rows($run1);

    $query2 = " SELECT * FROM users WHERE type='trainer' ";
    $run2 = mysqli_query($dbc, $query2);
    $numbers['numbers_of_trainers'] = mysqli_num_rows($run2);


    $query3 = " SELECT * FROM users WHERE type='investor' ";
    $run3 = mysqli_query($dbc, $query3);
    $numbers['numbers_of_investors'] = mysqli_num_rows($run3);


    $query4 = " SELECT * FROM users WHERE type='service_provider' ";
    $run4 = mysqli_query($dbc, $query4);
    $numbers['service_providers'] = mysqli_num_rows($run4);

    return $numbers;
  }
}
