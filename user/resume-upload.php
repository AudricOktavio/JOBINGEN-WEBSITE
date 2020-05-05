<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter dashboard.php in URL.
if(empty($_SESSION['id_user'])) {
	header("Location: ../index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>IngeniatorConsillio</title>
  <link rel="icon" href="https://www.google.co.id/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjnksezr7LeAhVWU30KHeKwCKcQjRx6BAgBEAU&url=https%3A%2F%2Fwww.similarplay.com%2Fmoonton%2Fmobile_legends_bang_bang%2Fapps%2Fcom.mobile.legends&psig=AOvVaw0LKRSKswFJMZAxUqJfcYJ9&ust=1541133383860445" type="image/png" sizes="16x16">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="SportFIT template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link href="../plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<a href="#">
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
	
  <body>
    <!-- NAVIGATION BAR -->

    <div class="container" style="margin-top:180px; margin-bottom:100px; margin-right:200px;">       
      <div class="row">
      <!-- If resume not uploaded then show error message -->
      <?php if(isset($_SESSION['uploadError'])) { ?>
      <div class="row">
        <div class="col-md-12 successMessage">
          <div class="alert alert-danger">
            <?php echo $_SESSION['uploadError']; ?>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['uploadError']); } ?>


        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="section_title">Upload Resume</div>
            <div class="panel-body">
              <form action="upload-resume.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label></label>
                  <input type="file" name="resume" class="form-control" required="">
                </div>
				<div class="row">
                <div class="form-group">
                  <input type="submit" value="Upload" class="btn btn-success">
                </div>
				<div class="col-md-2">
					<a href="resume.php" class="btn btn-success">Back</a>
				</div>
				</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<div background="faq-bg.jpg">
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="footer_container">
						<div class="footer_content">
							<div class="footer_logo">
								<a href="index.php">
									<div class="logo d-flex flex-row align-items-center justify-content-center"><img src="../images/dot.png" alt=""><div>Ingeniator<span>MAKE</span></div></div>
								</a>
							</div>
							<nav class="footer_nav">
								<ul class="d-flex flex-sm-row flex-column align-items-sm-start align-items-center justify-content-center">
									<?php
								//Show user dashboard link once logged in.
								if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
									?>
									<li><a href="profile.php">Profile</a></li>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>