<?php
$this->layout("_theme");
?>
<body class="body-wrapper">
<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Error Page</h3>
				</div>
				<ol class="breadcrumb p-0 m-0">
				  <li class="breadcrumb-item"><a href="<?= url(); ?>">Home</a></li>
				  <li class="breadcrumb-item active">Error Page</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--===================================
=            Error Section            =
====================================-->

<section class="section error">
	<div class="container">
		<div class="row">
			<div class="col-md-6 m-auto">
				<div class="block text-center">
					<img src="<?= url("assets/web/"); ?>images/404.png" class="img-fluid" alt="404">
					<h3>Oops!... <span>Page Not Found.</span></h3>
					<a href="<?= url(); ?>" class="btn btn-main-md">Go to home</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of Error Section  ====-->


<!--==============================================
=            Call to Action Subscribe            =
===============================================-->

<section class="cta-subscribe bg-subscribe overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mr-auto">
				<!-- Subscribe Content -->
				<div class="content">
					<h3>Subscribe to Our <span class="alternate">Newsletter</span></h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor</p>
				</div>
			</div>
			<div class="col-md-6 ml-auto align-self-center">
				<!-- Subscription form -->
				<form action="#" class="row">
					<div class="col-lg-8 col-md-12">
						<input type="email" class="form-control main white mb-lg-0" placeholder="Email">
					</div>
					<div class="col-lg-4 col-md-12">
						<div class="subscribe-button">
							<button class="btn btn-main-md">Subscribe</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!--====  End of Call to Action Subscribe  ====-->

<!--================================
=            Google Map            =
=================================-->

<section class="map">
	<!-- Google Map -->
	<div id="map"></div>
	<div class="address-block">
		<h4>Docklands Convention</h4>
		<ul class="address-list p-0 m-0">
			<li><i class="fa fa-home"></i><span>Street Address, Location, <br>City, Country.</span></li>
			<li><i class="fa fa-phone"></i><span>[00] 000 000 000</span></li>
		</ul>
		<a href="#" class="btn btn-white-md">Get Direction</a>
	</div>
</section>

<!--====  End of Google Map  ====-->

<!--============================
=            Footer            =
=============================-->

<!-- Subfooter -->

  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="<?= url("assets/web/"); ?>plugins/jquery/jquery.js"></script>
  <!-- Popper js -->
  <script src="<?= url("assets/web/"); ?>plugins/popper/popper.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= url("assets/web/"); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Smooth Scroll -->
  <script src="<?= url("assets/web/"); ?>plugins/smoothscroll/SmoothScroll.min.js"></script>
  <!-- Isotope -->
  <script src="<?= url("assets/web/"); ?>plugins/isotope/mixitup.min.js"></script>
  <!-- Magnific Popup -->
  <script src="<?= url("assets/web/"); ?>plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Slick Carousel -->
  <script src="<?= url("assets/web/"); ?>plugins/slick/slick.min.js"></script>
  <!-- SyoTimer -->
  <script src="<?= url("assets/web/"); ?>plugins/syotimer/jquery.syotimer.min.js"></script>
  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
  <script type="text/javascript" src="<?= url("assets/web/"); ?>plugins/google-map/gmap.js"></script>
  <!-- Custom Script -->
  <script src="<?= url("assets/web/"); ?>js/custom.js"></script>