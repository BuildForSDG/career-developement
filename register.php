<?php include 'config/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <h3><a href="#"><b></b>Registration Page</a></h3>
    
  </div>
  <?php 
  error_reporting(0);
  include "src/project.php"; 
        use App\Project;
         $project=new Project;
        
         $dbc= $project->connection();
         $post=$_POST;
         
        if($post){
           
          $type_of_user=htmlspecialchars($post['type_of_user'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        $email=htmlspecialchars($post['email'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        $password=htmlspecialchars(md5($post['password']), ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        $mobile=htmlspecialchars($post['mobile'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
       $location=htmlspecialchars($post['location'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
       $business_description=htmlspecialchars($post['business_description'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        $educational_level=htmlspecialchars($post['educational_level'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        $company=htmlspecialchars($post['company'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        $name=htmlspecialchars($post['name'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        $category=htmlspecialchars($post['category'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        
        if($project->registerUser ($dbc,$type_of_user,$password,$location,$business_description,$company,$name,$email,$mobile,$educational_level,$category)){
          $i=1;
        }
        
       if($project->confirmationMail($email,$name)){
         $x=1;
       }

        }

       
      if(isset($i)){ ?>
  <div class="alert alert-success">User Created. Check For a Confirmation Email</div>
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
      <div class="form-group has-feedback category" hidden>
        
        <select name="category" id="" class="form-control" >
          <option value="">Category</option>
          <option >Fashion</option>
          <option >Beauty/Cosmetics</option>
          <option >IT</option>
          <option >Carpentary</option>
          <option >Artistry</option>
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

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Sign up using
        Google</a>
    </div>

    <a href="#" class="text-center">I already have a membership</a> -->
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<?php include 'config/footer.php';
