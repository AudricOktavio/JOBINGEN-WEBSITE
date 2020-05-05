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
                <h3 class="box-title">My Project</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li class="active"><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Project Post</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Project Post</a></li>
                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Create Job Post</i></h2>
            <div class="row">
              <form method="post" action="addpost.php">
                <div class="col-md-12 latest-job ">
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" placeholder="Job Title">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control  input-lg" id="minimumsalary" min="1000" autocomplete="off" name="minimumsalary" placeholder="Minimum Salary" required="">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control  input-lg" id="maximumsalary" name="maximumsalary" placeholder="Maximum Salary" required="">
                  </div>
                  <div class="form-group">
                <input type="number" class="form-control  input-lg" id="experience" autocomplete="off" name="experience" placeholder="Experience (in Years) Required" required="">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="qualification" name="qualification" placeholder="Qualification Required" required="">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Create</button>
                  </div>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2016-2017 <a href="learningfromscratch.online">Job Portal</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

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

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>

