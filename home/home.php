<?php
session_start();
if(isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerUser/dashboard.php';</script>";//BRO
}else{

?>

<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta charset="UTF-8">
	  <title>ASSEMBLE</title>
	  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	  <link rel="stylesheet" href="css/linearicons.css">
	  <link rel="stylesheet" href="css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link rel="stylesheet" href="css/magnific-popup.css">
	  <link rel="stylesheet" href="css/nice-select.css">
	  <link rel="stylesheet" href="css/animate.min.css">
	  <link rel="stylesheet" href="css/owl.carousel.css">
	  <link rel="stylesheet" href="css/main.css">

<style>

.imgzoomin{
		position:static;
		max-height:90%;
		max-width:90%;
		bottom:0;
		right:130px;
		-webkit-animation: zoomin 1.5s linear 1;
		-webkit-animation-delay: 0.2s;
		visibility: hidden;
		-webkit-animation-fill-mode:forwards;
}

@keyframes zoomin{
		0%{
					transform:scale(0.5);
					visibility:visible;

			}
		100%{
					transform:scale(1);
					visibility:visible;
			}
}

</style>

	</head>

	<body>

	  <header id="header" id="home">
	    <div class="container">
	      <div class="row align-items-center justify-content-between d-flex">
	        <div id="logo">
	            <p class="text-white text-uppercase">ASSEMBLE - DBMS sem4 project - CEG</p>
	        </div>
	        <nav id="nav-menu-container">
	          <ul class="nav-menu">
	            <li class="menu-active"><a href="#home">Home</a></li>
	            <li><a href="#about">About</a></li>
	            <li><a href="#fact">Features</a></li>
							<li><a href="#course">Contact</a></li>
	            <li><a href="../layerAuthentication/adminlogin.php">Admin</a></li>
	          </ul>
	        </nav><!-- #nav-menu-container -->
	      </div>
	    </div>
	  </header><!-- #header -->


	  <!-- start banner Area style="  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);" -->
	  <section class="banner-area" id="home">
	    <div class="container">
	      <div class="row fullscreen d-flex align-items-center justify-content-start">
	        <div class="banner-content col-lg-7" >

	          <h1 class="text-uppercase">
	            ASSEMBLE
	          </h1>
	          <h3>
	            <p class="text-white pt-20 pb-20">
	              Platform to Assemble your Team <br>
	              Skill-based Team Management System.
	            </p>
	          </h3><br>
						<h2 class="text-white text-uppercase"></h2>
	          <a href="../layerAuthentication/login.php" class="primary-btn text-uppercase">login</a><br><br><br><br><br>
	          <h4>Don't have an account?
							<a href="../layerAuthentication/signup.php" class="text-white text-uppercase">signup</a>
						</h4>
	        </div>
	        <div class="col-lg-5 banner-right">
	          <img class="img-fluid imgzoomin" src="img/logoooo.png" alt="">
	        </div>
	      </div>
	    </div>
	  </section>
	  <!-- End banner Area -->

	  <!-- Start about Area -->
	  <section class="section-gap info-area" id="about">
	    <div class="container">
	      <div class="single-info row mt-40 align-items-center">
	        <div class="col-lg-6 col-md-12 text-center no-padding info-left">
	          <div class="info-thumb">
	            <img style="height:600px;" src="img/about-img3.gif" class="img-fluid info-img" alt="">
	          </div>
	        </div>
	        <div class="col-lg-6 col-md-12 no-padding info-rigth">
	          <div class="info-content">
	            <h2 class="pb-30">About the Project</h2>
	            <p>
	              Our idea is to create a platform where people are recognized by the
	              projects that they build and the skills that they possess. We enable
	              brilliant minds to collaborate easily. People or groups can find the
	              necessary skill easily with our platform. We allow talented people to
	              be heard by rest of the world. People can post about their projects
	              and their skills. </p>
	            <br>
	            <p>
	              One of the sole barriers to talent identification is not knowing where to search. Whenever small-scale
	              projects happen, people often form teams with known faces and not the right skilled people. Most of
	              the time forming teams with familiar people will end up in a situation where a few members are not
	              interested in the project. Technologies like Git, Video Conferencing, Cloud storage have solved us our
	              collaboration barriers. Even the current pandemic showed us that it is possible for humans to stay
	              apart and still innovate.</p>
	            <br>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <!-- End about Area -->

	  <!-- Start fact Area -->
			<section class="fact-area relative section-gap" id="fact">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center">
		<!-- Start testomial Area -->
								<section class="testomial-area">
									<div class="container">
										<div class="row d-flex justify-content-center">
											<div class="menu-content pb-60 col-lg-8">
												<div class="title text-center">
													<h1 class="mb-10">Some Features that Make us Unique</h1>
													<p>Who are in extremely love with eco friendly system.</p>
												</div>
											</div>
									</div>
										<div class="row">
											<div class="active-tstimonial-carusel">
												<div class="single-testimonial item">
													<img class="mx-auto" src="img/tmusic.gif" alt="">
													<br><br>
													Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
													<br><br><br>
													<h4>Music</h4>

												</div>
												<div class="single-testimonial item">
													<img class="mx-auto" src="img/tsports.gif" alt="">
													<br><br>
													Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
													<br><br><br>
													<h4>Programming</h4>

												</div>
												<div class="single-testimonial item">
													<img class="mx-auto" src="img/tfilm.gif" alt="">
													<br><br>
													Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
													<br><br><br>
													<h4>Film Making</h4>

												</div>
												<div class="single-testimonial item">
													<img class="mx-auto" src="img/tsports.gif" alt="">
													<br><br>
													Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
													<br><br><br>
													<h4>Sports</h4>

												</div>
												<div class="single-testimonial item">
													<img class="mx-auto" src="img/tmusic.gif" alt="">
													<br><br>
													Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
													<br><br><br>
													<h4>COVID-19</h4>

												</div>
												<div class="single-testimonial item">
													<img class="mx-auto" src="img/tfilm.gif" alt="">
													<br><br>
														Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
														<br><br><br>
													<h4>Global</h4>

												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- End testomial Area -->
							</div>
						</div>
			</section>
			<!-- End fact Area -->


	  <!-- Start course Area -->
	  <section class="course-area section-gap" id="course">
	    <div class="container">
	      <div class="row d-flex justify-content-center">
	        <div class="menu-content pb-8 col-lg-9">
	          <div class="title text-center">
	            <h1 class="mb-10">Creators of ASSEMBLE</h1>
	            <p>Students of CEG, Computer Science Dept.<br>RED-tags (2023)</p>
	          </div>
	        </div>
	      </div>
	      <div class="row">
	        <div class="active-course-carusel">
	          <div class="single-course item">
	            <img class="img-fluid" src="../layerUser/img2/GokulDP.jpeg" alt="">
	            <div class="details">
	              <a href="https://instagram.com/gokulnath__m?igshid=1usdaer40tjia" target="_blank">
	                <h4>Gokulnath M <span class="price float-right">2019103522</span></h4>
	              </a>

	            </div>
	          </div>
	          <div class="single-course item">
	            <img class="img-fluid" src="../layerUser/img2/ThiruDP.jpeg" alt="">
	            <div class="details">
	              <a href="https://instagram.com/thiruchelvan_sibi?igshid=arthwxkv8gwl" target="_blank">
	                <h4>Thiruchelvan T <span class="price float-right">2019103591</span></h4>
	              </a>

	            </div>
	          </div>
	          <div class="single-course item">
	            <img class="img-fluid" src="../layerUser/img2/joe.jpg" alt="">
	            <div class="details">
	              <a href="https://instagram.com/ad.i.shan?igshid=wmyr7wm8jwiz" target="_blank">
	                <h4>Jyotir Aditya Giri A<span class="price float-right">2019103531</span></h4>
	              </a>

	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <!-- End course Area -->

	  <!-- Start call-to-action Area -->
	  <section class="call-to-action-area section-gap">
	    <div class="container">
	      <div class="row justify-content-center top">
	        <div class="col-lg-12">
						<div class="row">
						<div class="col-lg-6" style="border-right: 5px solid white;">
	          <h1 class="text-white text-center">Contact Us</h1>
	          <p class="text-white text-center mt-30">
							<a href="https://github.com/joe-aditya/assemble" target="_blank" style="color:white;">
	            <i class="fab fa-github" style="font-size:40px; padding-right:10px;"></i></a>
							<a href="http://cs.annauniv.edu/" target="_blank" style="color:white;">
							<i class="fas fa-university" style="font-size:40px; padding-right:10px;"></i></a>
							<i class="fas fa-anchor" style="font-size:40px; padding-right:10px;"></i>
						</p>
						</div>

						<div class="col-lg-6">
							<h1 class="text-white text-center">Created with</h1>
		          <p class="text-white text-center mt-30">
							<i class="fas fa-coins" style="font-size:40px; padding-right:5px;"></i>
							<i class="fab fa-html5" style="font-size:40px; padding-right:5px;"></i>
							<i class="fab fa-js" style="font-size:40px; padding-right:5px;"></i>
							<i class="fab fa-css3-alt" style="font-size:40px; padding-right:5px;"></i>
							<i class="fab fa-bootstrap" style="font-size:40px; padding-right:5px;"></i>
							<i class="fab fa-php" style="font-size:40px; padding-right:5px;"></i>
	          </p>
					</div>
					</div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <!-- End call-to-action Area -->




	  <!-- start footer Area
	  <footer class="footer-area section-gap">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-5 col-md-6 col-sm-6">
	          <div class="single-footer-widget">
	            <h6>About Us</h6>
         <p>
	              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
	            </p>
	            <p class="footer-text">
	              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	   <!--          <script>
	                document.write(new Date().getFullYear());
	              </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  <!--          </p>
	          </div>
	        </div>
	        <div class="col-lg-5  col-md-6 col-sm-6">
	          <div class="single-footer-widget">
	            <h6>Newsletter</h6>
	            <p>Stay update with our latest</p>
	            <div class="" id="mc_embed_signup">
	              <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
	                <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
	                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
	                <div style="position: absolute; left: -5000px;">
	                  <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
	                </div>

	                <div class="info"></div>
	              </form>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
	          <div class="single-footer-widget">
	            <h6>Follow Us</h6>
	            <p>Let us be social</p>
	            <div class="footer-social d-flex align-items-center">
	              <a href="#"><i class="fa fa-facebook"></i></a>
	              <a href="#"><i class="fa fa-twitter"></i></a>
	              <a href="#"><i class="fa fa-dribbble"></i></a>
	              <a href="#"><i class="fa fa-behance"></i></a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </footer>
	  <!-- End footer Area -->

	  <script src="js/vendor/jquery-2.2.4.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	  <script src="js/vendor/bootstrap.min.js"></script>
	  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	  <script src="js/easing.min.js"></script>
	  <script src="js/hoverIntent.js"></script>
	  <script src="js/superfish.min.js"></script>
	  <script src="js/jquery.ajaxchimp.min.js"></script>
	  <script src="js/jquery.magnific-popup.min.js"></script>
	  <script src="js/owl.carousel.min.js"></script>
	  <script src="js/jquery.sticky.js"></script>
	  <script src="js/jquery.nice-select.min.js"></script>
	  <script src="js/parallax.min.js"></script>
	  <script src="js/waypoints.min.js"></script>
	  <script src="js/jquery.counterup.min.js"></script>
	  <script src="js/mail-script.js"></script>
	  <script src="js/main.js"></script>
	</body>

	</html>

<?php
}
 ?>
