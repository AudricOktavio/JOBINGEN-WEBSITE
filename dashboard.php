<?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files
  require_once("db.php");
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
							<div class="logo d-flex flex-row align-items-center justify-content-start"><img src="images/dot.png" alt=""><div>Ingeniator<span>MAKE</span></div></div>
						</a>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<?php
								//Show user dashboard link once logged in.
								if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
									?>
									<li><a href="user/profile.php">Profile</a></li>
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

	<!-- Menu -->

	<div class="menu trans_800">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="register.php">Search Project</a></li>
			</ul>
		</div>
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<i class="fa fa-phone" aria-hidden="true"></i>
				<span>652-345 3222 11</span>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url(images/index.jpg)"></div>
		<div class="overlay"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							
							<div class="home_title">Creativity Works</div>
							<div class="home_subtitle">Ingeniator Consillio</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- juans -->

	<div class="boxes">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="boxes_container d-flex flex-lg-row flex-column align-items-start justify-content-start">
						
						
						<div class="box">
							<div class="box_icon d-flex flex-column align-items-center justify-content-center"><img src="images/home.png" alt=""></div>
							<div class="box_title">Home</div>
							<div class="box_text">
								<p>It's all about caring.</p>
							</div>
							<div class="box_link_container">
								<a href="#"><div class="box_link d-flex flex-column align-items-center justify-content-center trans_200"><div>+</div></div></a>
							</div>
						</div>

						<!-- Box -->
						<div class="box">
							<div class="box_icon d-flex flex-column align-items-center justify-content-center"><img src="images/list.png" alt=""></div>
							<div class="box_title">Login</div>
							<div class="box_text">
								<p>Masuk dalam akun anda</p>
							</div>
							<div class="box_link_container">
								<a href="#"><div class="box_link d-flex flex-column align-items-center justify-content-center trans_200"><div>+</div></div></a>
							</div>
						</div>

						<!-- Box -->
						<div class="box">
							<div class="box_icon d-flex flex-column align-items-center justify-content-center"><img src="images/clock.png" alt=""></div>
							<div class="box_title">Register</div>
							<div class="box_text">
								<p>Lakukan registrasi sebagai anggota</p>
							</div>
							<div class="box_link_container">
								<a href="#"><div class="box_link d-flex flex-column align-items-center justify-content-center trans_200"><div>+</div></div></a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- About -->
	<?php
	//Show user dashboard link once logged in.
	if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
	?>
	<link rel="stylesheet" type="text/css" href="styles/blog.css">
	<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container">
						<div class="section_subtitle">welcome to ingeniatorMake</div>
						<div class="section_title" style="color:black;">Latest Project</div>
					</div>
				</div>
			</div>
			<div class="row blog_row">
			<?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
			$sql = "SELECT * FROM job_post Order By Rand() Limit 6";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
				?>
				<!-- Blog Post -->
				<div class="col-xl-4 col-md-6 blog_col">
					<div class="blog_post">
						<div class="blog_post_image"><img src="images/blog_12.jpg" alt=""></div>
						<div class="blog_post_title"><a href="#"><?php echo $row['jobtitle']; ?></a></div>
						<div class="blog_post_date"><a href="#"><?php echo $row['createdat']; ?></a></div>
						<div class="blog_post_text">
							<p><?php echo $row['description']; ?></p>
						</div>
						<div class="blog_post_link"><a href="#">Read More</a></div>
					</div>
				</div>
			<?php
				}
			}
			?>
			</div>
			<div class="row">
				<div class="col">
					<div class="button blog_button ml-auto mr-auto"><a href="#">Load More</a></div>
				</div>
			</div>
		</div>
	</div>
	
		<?php }  else { 
		//Show Login Links if no one is logged in.
				?>
	<div class="about">
		<div class="container about_container">
			<div class="row">
				<div class="col-lg-6">
					<div class="about_content">
						<div class="section_title_container">
							<div class="section_title">Tetaplah Produktif !!</div>
						</div>
						<div class="text_highlight">Gunakan Ingeniator Consillio </div>
						<div class="about_text">
							<p>Langkah anda untuk berkarya dimulai dari sekarang dengan Ingeniator Consillio, suatu sistem yang mampu menghubungkan anda dengan para pekerja professional dari berbagai bidang!</p>
						</div>
						<div class="button about_button"></a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="about_background">
			<div class="container fill_height">
				<div class="row fill_height">
					<div class="col-lg-6 offset-lg-6 fill_height">
						<div class="about_image"><img src="images/doctor.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Testimonials -->

	

	<!-- Gallery -->

	<div class="gallery">
		
		<!-- Gallery Slider -->
		<div class="gallery_slider_container">
			<div class="owl-carousel owl-theme gallery_slider">
				
				<!-- Slide -->
				<div class="owl-item"><img src="images/1.jpg" alt=""></div>

				<!-- Slide -->
				<div class="owl-item"><img src="images/2.jpg" alt=""></div>

				<!-- Slide -->
				<div class="owl-item"><img src="images/3.jpg" alt=""></div>

				<!-- Slide -->
				<div class="owl-item"><img src="images/4.jpg" alt=""></div>

				<!-- Slide -->
				<div class="owl-item"><img src="images/5.jpg" alt=""></div>

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
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">

</script>
</body>
</html>