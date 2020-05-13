<?php
use App\Register\Register;

    include_once('../config/database.php');
    include_once('../src/Login/Login.php');
    include_once('../src/Register/Register.php');
    include('../includes/header.php');

    $database = new Database();
    $db = $database->getConnection();

    $user = new Register($db);

    if($_POST){

        $user->name = $_POST['name'];
        $user->type = $_POST['usertype'];
        $user->location = $_POST['location'];
        $user->company = $_POST['company'];
        $user->phone = $_POST['phone'];
        $user->password = $_POST['password'];
        $user->email = $_POST['email'];
        $user->business_description = $_POST['business_description'];
        $user->education_level = $_POST['education_level'];

        if($user->create()){
            echo "<div class='alert alert-success'>Registration Successful.</div>";
        }else {
            echo "<div class='alert alert-danger'>Unable to register user.</div>";
        }
    }
?>
<div class="register-box">
    <div class="register-logo">
        <h3><a href="#"><b></b>Registeration Page</a></h3>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Full name" required>
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="company" placeholder="Company Name">
                <span class="fa fa-home form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">

                <select name="usertype" id="" class="form-control" required>
                    <option value="">Type Of User</option>
                    <option value="trainee">Trainee</option>
                    <option value="trainer">Trainer</option>
                    <option value="investor">Investor</option>
                    <option value="service_provider"> Service Provider</option>
                </select>
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="confirm_password" placeholder="Retype password" required>
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="number" class="form-control" name="phone" placeholder="Phone" required>
                <span class="fa fa-phone form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="location" placeholder="Location" required>
                <span class="fa fa-map-marker form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback description" hidden>
                <textarea class="form-control" name="business_description" placeholder="Description Of Business"></textarea>
                <span class="fa fa-log-in form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback educational_level" hidden>
                <select name="education_level" class="form-control">
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
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up
                using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Sign up using
                Google</a>
        </div>

        <a href="#" class="text-center" id="loadLogin" >I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<?php
    include('../includes/footer.php')
?>

<script>
    $(document).ready(function(){
        $("#loadLogin").on('click', function(){
            window.location.href = 'login.php';
        })
    });
</script>