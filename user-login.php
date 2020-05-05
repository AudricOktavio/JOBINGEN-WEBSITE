<?php
  //To Handle Session Variables on This Page
  session_start(); 

  //If user is already logged in then redirect them back to dashboard. 
  //This is required if user tries to manually enter login.php in URL.
  if(isset($_SESSION['id_user'])) {
    header("Location: user/dashboard.php");
    exit();
  }

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
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
							<div class="logo d-flex flex-row align-items-center justify-content-start"><img src="images/dot.png" alt=""><div>Enûma<span>med</span></div></div>
						</a>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li><a href="index.html">Home</a></li>
								<li class="active" ><a href="user-login.php">Login</a></li>
								<li><a href="doctor/">Register</a></li>
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

<div class="home">
		<div class="background_image" style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(images/6.jpg);"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">Patient Login</div>
							<div class="home_subtitle">
							<div class="box-login">
					<form class="form-login" method="post" action="checklogin.php">
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
						</div>
						<div class="form-group">
							<a href="forgot-password.php">Forgot Password</a>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
						<?php 
							//If User have successfully registered then show them this success message
							//Todo: Remove Success Message without reload?
						if(isset($_SESSION['registerCompleted'])) {
						?>
						<div>
							<p id="successMessage" class="text-center">Check your email!</p>
						</div>
						<?php
							unset($_SESSION['registerCompleted']); }
						?>   
						<?php 
							//If User Failed To log in then show error message.
							if(isset($_SESSION['loginError'])) {
						?>
						<div>
							<p class="text-center">Invalid Email/Password! Try Again!</p>
						</div>
						<?php
							unset($_SESSION['loginError']); }
						?>      

						<?php 
							//If User Failed To log in then show error message.
							if(isset($_SESSION['userActivated'])) {
						?>
						<div>
							<p class="text-center">Your Account Is Active. You Can Login</p>
						</div>
						<?php
							unset($_SESSION['userActivated']); }
						?>    

						<?php 
							//If User Failed To log in then show error message.
							if(isset($_SESSION['loginActiveError'])) {
						?>
						<div>
							<p class="text-center">Your Account Is Not Active. Check Your Email.</p>
						</div>
						<?php
							unset($_SESSION['loginActiveError']); }
						?>        
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
					</div>
			
				</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<div background="faq-bg.jpg">
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="footer_container">
						<div class="footer_content">
							<div class="footer_logo">
								<a href="#">
									<div class="logo d-flex flex-row align-items-center justify-content-center"><img src="images/dot.png" alt=""><div>Enûma<span>med</span></div></div>
								</a>
							</div>
							<nav class="footer_nav">
								<ul class="d-flex flex-sm-row flex-column align-items-sm-start align-items-center justify-content-center">
									<li><a href="index.html">Home</a></li>
									<li><a href="user-login.php">Login</a></li>
									<li><a href="doctor/">Register</a></li>
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
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
<script src="js/custom.js"></script>
</body>
</body>
</html>