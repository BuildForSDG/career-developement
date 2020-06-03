<?php include 'config/header1.php';
session_start();
require "src/project.php";

use App\Project;

$project = new Project;
$dbc = $project->connection();
$user = $_SESSION['user'];

if (!isset($user)) {
  header('login.php');
}
$count = $project->displayUserCount($dbc);
//print_r($count); die();

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




        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          <!-- Optionally, you can add icons to the links -->

          <li class="active"><a href="dashboard.php"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
          <li><a href="profile.php"><i class="fa fa-link"></i> <span>Profile</span></a></li>
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

          <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
          <div class="col-sm-12 ">
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>
                      <?php
                      print_r($count['numbers_of_trainers']);

                      ?>
                    </h3>


                    <p>Trainers</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person"></i>
                  </div>

                  <a href="#" class="small-box-footer">More <i class="fa fa-arrow-circle-right"></i></a>

                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>
                      <?php
                      print_r($count['numbers_of_trainees']);

                      ?>
                    </h3>

                    <p>Trainees</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-clipboard"></i>
                  </div>

                  <a href="#" class="small-box-footer">More <i class="fa fa-arrow-circle-right"></i></a>

                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>
                      <?php
                      print_r($count['numbers_of_investors']);

                      ?>

                    </h3>

                    <p>Investors</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-home"></i>
                  </div>

                  <a href="#" class="small-box-footer">More <i class="fa fa-arrow-circle-right"></i></a>

                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>
                      <?php
                      print_r($count['service_providers']);
                      ?>

                    </h3>

                    <p>Service Providers</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person"></i>
                  </div>
                  <a href="#" class="small-box-footer">More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

            </div>

          </div>
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
      <strong>Copyright &copy; 2020 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <?php include "config/footer1.php";
