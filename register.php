<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="css/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <h3><a href="#"><b></b>Registration Page</a></h3>
    
  </div>
  <?php include "src/project.php"; 
        use App\Project;
         $project=new Project;
        
         $dbc= $project->connection();
         
        if($_POST){
           
          $type_of_user= $_POST['type_of_user'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $mobile=$_POST['mobile'];
       $location=$_POST['location'];
       $business_description=$_POST['business_description'];
        $educational_level=$_POST['educational_level'];
        $company=$_POST['company'];
        $name=$_POST['name'];
        
        if($project->registerUser ($dbc,$type_of_user,$password,$location,$business_description,$company,$name,$email,$mobile,$educational_level)){
          $i=1;
        }

        }

       
      if(isset($i)){ ?>
  <div class="alert alert-success">User Created</div>
  <?php }?>
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
     
    <form  method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="name" required>
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Company Name" name="company">
        <span class="fa fa-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        
        <select name="type_of_user" id="" class="form-control" required>
          <option value="">Type Of User</option>
          <option value="trainee">Trainee</option>
          <option value="trainer">Trainer</option>
           <option value="investor">Investor</option>
          <option value="service_provider"> Service Provider</option>
        </select>
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" required>
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Phone" name="mobile" required>
        <span class="fa fa-phone form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Location" name="location" required>
        <span class="fa fa-map-marker form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback description" hidden>
        <textarea  class="form-control" placeholder="Description Of Business" name="business_description"></textarea>
        <span class="fa fa-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback educational_level" hidden>
        
        <select name="educational_level" id="" class="form-control" >
          <option value="">Educational Level</option>
          <option value="SHS">SHS</option>
          <option value="Tertiary">Tertiary</option>
          
        </select>
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Sign up using
        Google</a>
    </div>

    <a href="#" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="js/icheck.min.js"></script>
<script src="js/select.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
