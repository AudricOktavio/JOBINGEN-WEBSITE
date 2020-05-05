<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/dataTables.searchHighlight.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="SportFIT template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.2/bootstrap.min.css">
	<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../styles/blog.css">
	<link rel="stylesheet" type="text/css" href="../styles/blog_responsive.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<a href="../index.php">
							<div class="logo d-flex flex-row align-items-center justify-content-start"><img src="../images/dot.png" alt=""><div>Ingeniator<span>MAKE</span></div></div>
						</a>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<?php
								//Show user dashboard link once logged in.
								if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
									?>
									<li><a href="../user/profile.php">Profile</a></li>
									<li><a href="../company/dashboard.php">Your Project</a></li>
									<li><a href="../search.php">Search Project</a></li>
									<li><a href="../logout.php">Logout</a></li>
								<?php
									} else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) { 
									?>
									<li><a href="company/dashboard.php">Dashboard</a></li>
									<li><a href="logout.php">Logout</a></li>
									<?php }  else { 
									//Show Login Links if no one is logged in.
								?>
									<li><a href="login.php">Login</a></li>
									<li><a href="register.php">Register</a></li>
									<li><a href="search.php">Search Project</a></li>
								<?php } ?>
							</ul>
						</nav>
						<div class="phone d-flex flex-row align-items-center justify-content-start ml-auto">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<div>(021)-3811708</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Hamburger -->
	
	<div class="hamburger_bar trans_400 d-flex flex-row align-items-center justify-content-start">
		<div class="hamburger">
			<div class="menu_toggle d-flex flex-row align-items-center justify-content-start">
				<span>menu</span>
				<div class="hamburger_container">
					<div class="menu_hamburger">
						<div class="line_1 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
						<div class="line_2 hamburger_lines" style="visibility: inherit; opacity: 1;"></div>
						<div class="line_3 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px; margin-top: 180px; margin-bottom: 200px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">My Project</h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Project Post</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Project Post</a></li>
                  <li class="active"><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Talent Database</i></h2>
            <p>In this section you can download resume of all candidates who applied to your job posts</p>
            <div class="row">
              <div class="col-md-3">
                <input class="form-control input-lg" type="text" placeholder="Occupation">
              </div>
              <div class="col-md-3">
                <input class="form-control input-lg" type="text" placeholder="Location">
              </div>
              <div class="col-md-3">
                <input class="form-control input-lg" type="text" placeholder="Skills">
              </div>
              <div class="col-md-3">
                <button class="btn btn-flat btn-success btn-lg"><i class="fa fa-search"></i></button>
              </div>
            </div>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Candidate</th>
                      <th>Occupation</th>
                      <th>Skills</th>
                      <th>Location</th>
                      <th>Resume</th>
                      <th>About</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>John Doe</td>
                        <td>PHP Developer</td>
                        <td><span class="label label-success">PHP</span> <span class="label label-success">HTML</span> <span class="label label-success">CSS</span></td>
                        <td>India</td>
                        <td><i class="fa fa-file-pdf-o"></i></td>
                        <td><a href="" data-toggle="modal" data-target="#modal-success"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    <div class="modal modal-success fade" id="modal-success">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Candidate Profile</h4>
          </div>
          <div class="modal-body">
              <h3><b>Applied On</b></h3>
              <p>24/04/2017</p>
              <br>
              <h3><b>Email</b></h3>
              <p>test@test.com</p>
              <br>
              <h3><b>Phone</b></h3>
              <p>44907512447</p>
              <br>
              <h3><b>Website</b></h3>
              <p>learningfromscratch.online</p>
              <br>
              <h3><b>Application Message</b></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    

  </div>
  <!-- /.content-wrapper -->

  <div background="faq-bg.jpg">
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="footer_container">
						<div class="footer_content">
							<div class="footer_logo">
								<a href="../index.php">
									<div class="logo d-flex flex-row align-items-center justify-content-center"><img src="images/dot.png" alt=""><div>Ingeniator<span>MAKE</span></div></div>
								</a>
							</div>
							<nav class="footer_nav">
								<ul class="d-flex flex-sm-row flex-column align-items-sm-start align-items-center justify-content-center">
									<?php
								//Show user dashboard link once logged in.
								if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
									?>
									<li><a href="user/dashboard.php">Profile</a></li>
									<li><a href="company/dashboard.php">Your Project</a></li>
									<li><a href="search.php">Search Project</a></li>
									<li><a href="logout.php">Logout</a></li>
								<?php
									} else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) { 
									?>
									<li><a href="company/dashboard.php">Dashboard</a></li>
									<li><a href="logout.php">Logout</a></li>
									<?php }  else { 
									//Show Login Links if no one is logged in.
								?>
									<li><a href="login.php">Login</a></li>
									<li><a href="register.php">Register</a></li>
									<li><a href="search.php">Search Project</a></li>
								<?php } ?>
								</ul>
							</nav>
							<div class="newsletter_container">
								<form action="#" id="newsletter_form" class="newsletter_form">
									<input type="text" class="newsletter_input" placeholder="Enter your email here" required="required">
									<button class="newsletter_button">go</button>
								</form>
							</div>
							<div class="copyright d-flex flex-row align-items-start justify-content-sm-end justify-content-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>


<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
