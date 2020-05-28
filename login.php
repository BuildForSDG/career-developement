<?php include('config/header.php') ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h3><a href="#"><b></b>Login Page</a></h3>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
       <?php
       require "src/project.php";
       session_start();
       use App\Project;
        $project=new Project;
         $post=$_POST;

        $dbc= $project->connection();
        if($post){
            $project->loginUser($dbc,$post['email'],$post['password']);
        }
        ?>
    <form  method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> 
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
     <br><p>- OR -</p><br> 
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Sign in using
        Google</a> 
    </div> -->
    <!-- /.social-auth-links -->
  <br>
 <center><a href="register.php">Register to create an account</a></center> 
  

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php include('config/footer.php');

