<?php include  'config/header1.php'; 
include "src/project.php";
session_start();

$user = $_SESSION['user'];

use App\Project;

$project = new Project;
$dbc = $project->connection();
$post=$_POST;




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

                <?php


                ?>
                <h5>Welcome, <?php print_r($user['name']);?></h5>
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
                <li><a href="profile.php"><i class="fa fa-link"></i> <span>Profile</span></a></li>
                    <li><a href="list-of-trainers.php"><i class="fa fa-link"></i> <span>Trainers</span></a></li>
                    <li><a href="list-of-trainees.php"><i class="fa fa-link"></i> <span>Trainees</span></a></li>
                    <li><a href="list-of-investors.php"><i class="fa fa-link"></i> <span>Investors</span></a></li>
                    <li class="active"><a href="service-providers.php"><i class="fa fa-link"></i> <span>Service Providers</span></a></li>
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

                    <small>Career Development Center</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-sm-6">
                            <h3 class="box-title">List Of Investors</h3>
                        </div>
                        <div class="col-sm-3">
                            <div class="box-tools">

                                <form action="" method="post">
                                    <div class="input-group input-group-sm">

                                    <select name="location" id="location" class="form-control">
                                            <option value="">Search By Location</option>
                                            <?php
                                            $locationResult =mysqli_query($dbc,"SELECT DISTINCT location FROM users WHERE type='service_provider' AND status='Active'");

                                                while ($row = mysqli_fetch_assoc($locationResult )) { ?>
                                                <option value="<?php print_r(stripslashes($row["location"])) ?>"><?php print_r(stripslashes($row["location"])); ?></option>
                                              <?php  
                                            } ?>
                                            
                                        </select>

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body  no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Location</th>
                              <th>Business Description</th>

                            </tr>
                            <?php
                               $post=$_POST;
                               if ($post){
                                   $query="SELECT * FROM users  WHERE type='service_provider' AND location='$post[location]' AND status='Active'";
                                   
                               } else{
               
                           $query = "SELECT * FROM users  WHERE type='service_provider' AND status='Active'";
                               }
     
                              $run = mysqli_query($dbc, $query);
                              
                                while($row=mysqli_fetch_assoc($run)) { ?>
                                        <tr>
                                        <td><?php print_r(stripslashes($row['name'])); ?></td>
                                        <td><?php print_r(stripslashes($row['mobile'])); ?></td>
                                        <td><?php print_r(stripslashes($row['email'])); ?></td>
                                        <td><?php print_r(stripslashes($row['company']));?></td>
                                        <td><?php print_r(stripslashes($row['location'])); ?></td>
                                        <td><?php print_r(stripslashes($row['business_description'])); ?></td>
                                                                         </tr>
                              <?php  }  ?>
                            </table>
                            
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

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
            <strong>Copyright &copy; <?php print_r(date('Y')); ?><a href="#">Company</a>.</strong> All rights reserved.
        </footer>


        
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <?php include 'config/footer1.php';
