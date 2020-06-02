<?php include 'config/header1.php';
require "src/project.php";

use App\Project;

$project = new Project;
$dbc = $project->connection();

session_start();

$user = $_SESSION['user'];


if (isset($_GET['id']) && !isset($user)) {
    $project->confirmUser($dbc);
} elseif (!isset($user)) {
    header('login.php');
}
$user = $_SESSION['user'];
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b></b></span>
                <h5>Welcome, <?php print_r($user['name']); ?></h5>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="logout.php" style="color:white" id="logout"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">


                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">HEADER</li>
                    <!-- Optionally, you can add icons to the links -->

                    <li><a href="dashboard.php"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
                    <li class="active"><a href="profile.php"><i class="fa fa-link"></i> <span>Profile</span></a></li>
                    <li><a href="list-of-trainers.php"><i class="fa fa-link"></i> <span>Trainers</span></a></li>
                    <li><a href="list-of-trainees.php"><i class="fa fa-link"></i> <span>Trainees</span></a></li>
                    <li><a href="list-of-investors.php"><i class="fa fa-link"></i> <span>Investors</span></a></li>
                    <li><a href="service-providers.php"><i class="fa fa-link"></i> <span>Service Providers</span></a></li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <small>Profile Of User</small>
                </h1>
                <?php

                if ($_POST) {
                    if ($project->updateUserInfo($dbc)) {
                        $y = 1;
                        $_SESSION['user'] = $_POST;
                        $user = $_SESSION['user'];
                    }
                }


                ?>

                <?php
                if (isset($y)) {

                ?>

                    <div class="alert alert-success">
                        User Updated Successfully
                    </div>

                <?php } ?>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">

                    <div class="col-md-3 ">
                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="img/user4-128x128.jpg" alt="User profile picture">

                                <h3 class="profile-username text-center"><?php print_r(stripslashes($user['name'])) ?></h3>

                                <p class="text-muted text-center"><?php print_r(stripslashes($user['email'])) ?></p>

                                <ul class="list-group list-group-unbordered">

                                    <li class="list-group-item">
                                        <b>Phone Number</b> <a class="pull-right"><?php print_r(stripslashes($user['mobile'])) ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Location</b> <a class="pull-right"><?php print_r(stripslashes($user['location'])) ?></a>
                                    </li>


                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">

                                <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Settings</a>
                                </li>
                                <li><a href="#summary" data-toggle="tab" aria-expanded="true">Summary</a></li>
                            </ul>
                            <div class="tab-content">

                                <!-- /.tab-pane -->

                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" method="POST">

                                        <input type="hidden" name="id" value="<?php print_r(stripslashes($user['id'])); ?>">
                                        <input type="hidden" name="type" value="<?php print_r(stripslashes($user['type'])); ?>">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php print_r(stripslashes($user['name'])); ?>" name="name" id="inputName" placeholder="eg. Kofi Mensah">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Phone</label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" value="<?php print_r(stripslashes($user['mobile'])); ?>" name="mobile" id="inputName" placeholder="eg.+23350000">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Location</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php print_r(stripslashes($user['location'])); ?>" name="location" id="inputName" placeholder="eg. Accra">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" value="<?php print_r(stripslashes($user['email'])); ?>" name="email" id="inputEmail" placeholder="eg.nina@gmail.com">
                                            </div>
                                        </div>


                                        <?php

                                        if ($user['type'] == 'trainee') {

                                        ?>

                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Educational
                                                    Level</label>


                                                <div class="col-sm-10">
                                                    <select name="educational_level" id="" class="form-control">
                                                        <option value="">Educational Level</option>
                                                        <option value="SHS" <?php if ($user['educational_level'] == 'SHS') { ?> selected <?php } ?>>
                                                            SHS
                                                        </option>
                                                        <option value="Tertiary" <?php if ($user['educational_level'] == 'Tertiary') { ?> selected <?php } ?>>
                                                            Tertiary
                                                        </option>

                                                    </select>

                                                </div>
                                            </div>

                                        <?php
                                        } else {
                                        ?>
                                            <div class="form-group">

                                                <label for="inputName" class="col-sm-2 control-label">Company Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="<?php print_r(stripslashes($user['company'])); ?>" name="company" id="inputName" placeholder="eg. Fashion Institute">
                                                </div>
                                            </div>





                                            <div class="form-group">
                                                <label for="inputExperience" class="col-sm-2 control-label">Business
                                                    Description</label>

                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="business_description" id="inputExperience" placeholder=""><?php print_r(stripslashes($user['business_description'])); ?>
                                                          </textarea>
                                                </div>
                                            </div>

                                        <?php } ?>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="summary">
                                    <li>Name :<?php print_r(stripslashes($user['name'])); ?></li>
                                    <li>Email:<?php print_r(stripslashes($user['email'])); ?></li>
                                    <li>Phone :<?php print_r(stripslashes($user['mobile'])); ?></li>
                                    <li>Location: <?php print_r(stripslashes($user['location'])); ?></li>
                                    <?php
                                    if ($user['type'] == 'trainee') {
                                    ?>
                                        <li>Education Level: <?php print_r(stripslashes($user['educational_level'])); ?></li>
                                    <?php } else { ?>
                                        <li>Business Description :<?php print_r(stripslashes($user['business_description'])); ?></li>
                                        <li>Company: <?php print_r(stripslashes($user['company'])); ?></li>
                                    <?php } ?>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>

                    <!-- /.box-body -->
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?php print_r(date('Y')); ?> <a href="#">Company</a>.</strong> All rights reserved.
        </footer>


        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <?php include 'config/footer1.php' ?>