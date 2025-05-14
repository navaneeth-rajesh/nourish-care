
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>

<title>DAAN a Society & People Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="DAAN Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="./static/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="./static/css/lightbox.css" type="text/css" media="all" />
<link href="./static/css/ihover.css" rel="stylesheet" type="text/css" media="all" />
<link href="./static/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="./static/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Salsa' rel='stylesheet' type='text/css'>

<!-- //fonts -->
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="./static/js/move-top.js"></script>
		<script type="text/javascript" src="./static/js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
</head>
<body >

<!-- banner -->
<div id="home" class="banner1"  >
	<div class="container"  >
		<div class="top-nav">
						<div class="nav-icon">
							<a href="#" class="right_bt" id="activator"><span> </span> </a>
						</div>
						<div class="box" id="box" >
							 <div class="box_content">        					                         
								<div class="box_content_center">
								 	<div class="form_content" >
										<div class="menu_box_list" >
											<ul>
												<li ><a href="./donorhome.php">HOME</a></li>
												<li><a  href="./userdonation.php">EVENTS</a></li>
												<li><a  href="./userdonateitems.php">ITEMS</a></li>
												<li><a  href="./userpayment.php">PAYMENT DETAILS</a></li>
												<li><a  href="./userchat.php">CHAT</a></li>
												<li><a  href="./login.php">LOGOUT</a></li>
												<div class="clearfix"> </div>
											</ul>
										</div>
										<a class="boxclose" id="boxclose"> <span> </span></a>
									</div>                                  
								</div> 	
							</div>  	  
						</div>
					<!---start-click-drop-down-menu----->
			        <!----start-dropdown--->
			         <script type="text/javascript">
						var $ = jQuery.noConflict();
							$(function() {
								$('#activator').click(function(){
									$('#box').animate({'top':'0px'},900);
								});
								$('#boxclose').click(function(){
								$('#box').animate({'top':'-1000px'},900);
								});
							});
							$(document).ready(function(){
							//Hide (Collapse) the toggle containers on load
							$(".toggle_container").hide(); 
							//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
							$(".trigger").click(function(){
								$(this).toggleClass("active").next().slideToggle("500");
									return false; //Prevent the browser jump to the link anchor
							});
												
						});
					</script>
					<!---//End-click-drop-down-menu----->
					<!--top-nav---->
		</div>
		<div class="logo">
			<h1><a href="#"><i></i>NOURISH<span>Care</span></a></h1>
		</div>
		
		<div class="banner-info text-center">
			<!-- responsiveslides -->
			<script src="./static/js/responsiveslides.min.js"></script>
				<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: false,
										nav: false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
				</script>
			<!-- responsiveslides -->
			
        </div>
		</div>
	</div>
</div>
<!-- //banner -->
<!-- banner-bottom -->
</body>
</html>

