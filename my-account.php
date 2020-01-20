<?php
include "functions/connection.php";
include "functions/getip.php";
session_start();

if(!isset($_SESSION['email']))
{
	echo "<script>window.open('register.php','_self')</script>";
}
if(isset($_SESSION['email']))
    {
    	echo "<script>window.open('account-details.php','_self')</script>";
	}
           
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>My Account | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index.php">
								<img src="images/logo/logo.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
							
								<li class="drop"><a href="#" style="color:#353535">Men</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Top Wear</li>
											<li><a href="shop-grid.php?cat=m-tshirt">T-Shirts</a></li>
											<li><a href="shop-grid.php?cat=m-tank">Tank Tops</a></li>	
										</ul>
										<ul class="item item03">
											<li class="title">Bottom Wear</li>
											<li><a href="shop-grid.php?cat=m-track">Track pant</a></li>
											<li><a href="shop-grid.php?cat=m-shorts">Shorts</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Accessories</li>
											<li><a href="shop-grid.php?m-cap">Cap</a></li>
											<li><a href="shop-grid.php?m-wallete">Wallete</a></li>
										</ul>
									</div>
								</li>
								
								<li class="drop"><a href="#" style="color:#353535">Women</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Top Wear</li>
											<li><a href="shop-grid.php">Tops</a></li>
											<li><a href="shop-grid.php">Tank Tops</a></li>
											<li><a href="shop-grid.php">Sports Bra</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Bottom Wear</li>
											<li><a href="shop-grid.php">Track pant</a></li>
											<li><a href="shop-grid.php">Shorts</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Accessories</li>
											<li><a href="shop-grid.php">Wallets</a></li>
											<li><a href="shop-grid.php">Perfumes</a></li>		
										</ul>
									</div>
								</li>

								
								</li>
							</ul>
						</nav>

						
					</div>
					
<!-- #######################  Cart Open  ############################# -->

<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="wishlist"><a href="wishlist.php"></a></li>

							<?php
							if(isset($_SESSION['email']))
							{
							$email=$_SESSION['email'];
								$query = "select * from cart where email='$email'";
								$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
								$count=0;
								while($row = $run_pro->fetch_assoc()) {
									$count=$count+1;
								}
							echo '
							<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">'.$count.'</span></a>

							';
							}
							else{
								echo '
								<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">0</span></a>

								';
							}
							?>
							<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<?php
									if(isset($_SESSION['email']))
									{
									$email=$_SESSION['email'];
									$query = "select * from cart where email='$email'";
									$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
									$count=0;
									$grand_total=0;
									while($row = $run_pro->fetch_assoc()) {
										$count=$count+1;	
										$grand_total=$grand_total+$row['total'];
									}
									echo '
									<div class="minicart-content-wrapper" style="height:370px;  overflow-y: auto;">
									<div class="micart__close">
										<span>close</span>
									</div>
									<div class="items-total d-flex justify-content-between">
										<span>'.$count.' items</span>
										<span>Cart Subtotal</span>
									</div>
									<div class="total_amount text-right">
										<span>'.$grand_total.' ₹</span>
									</div>
									<div class="mini_action checkout">
										<a class="checkout__btn" href="cart.html">Go to Checkout</a>
									</div>

									';
								}
								else{
									echo '
									<div class="minicart-content-wrapper" style="height:370px;  overflow-y: auto;">
									<p>No Items Found In Cart</p>

									';
								}
									?>
									<div class="single__items">
										<div class="miniproduct">
											<!-- product -->
										<?php 	
										if(isset($_SESSION['email'])){										
										$query = "select * from cart where email='$email'";
										$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
										$count=0;
										$grand_total=0;
										while($row = $run_pro->fetch_assoc()) {
									echo'	<div class="item01 d-flex">
												<div class="thumb">
													<a href="product-details.html"><img src="dashboard/uploads/featured/'.$row['product_name'].'".png alt="product images"></a>
												</div>
												<div class="content">
													<h6><a href="product-details.html">'.$row['product_name'].'</a></h6>
													<span class="prize">'.$row['total'].'  ₹</span>
													<div class="product_prize d-flex justify-content-between">
														<span class="qun">Qty: '.$row['quantity'].'</span>
													</div>
												</div>
											</div>
											<br>';
										}
									}
									else{
										echo'<div class="item01">
										<center>	<a href="shop-grid.php">Continue Shopping</a></center>	
											</div>
											<br>';
									}
										?>
										<!-- End -->

										</div>
										
									</div>
									<div class="mini_action cart">
										<a class="cart__btn" href="cart.php">View and edit cart</a>
									</div>
									
									</div>
								</div>
								<!-- End Shopping Cart -->
							</li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
													<span><a class="btn" href="my-account.php">My Account</a></span>
														<span><a class="btn" href="wishlist.php">My Wishlist</a></span>
														<span><a class="btn" href="cart.php">Cart</a></span>
														<span><a class="btn" href="register.php">Sign In/Register</a></span>
														<span><a class="btn" href="logout.php">Logout</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>

<!-- ##########################  Cart Close  ###########################-->

				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.html">Home</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="about.html">About Page</a></li>
										<li><a href="portfolio.html">Portfolio</a>
											<ul>
												<li><a href="portfolio.html">Portfolio</a></li>
												<li><a href="portfolio-details.html">Portfolio Details</a></li>
											</ul>
										</li>
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="wishlist.html">Wishlist Page</a></li>
										<li><a href="error404.html">404 Page</a></li>
										<li><a href="faq.html">Faq Page</a></li>
										<li><a href="team.html">Team Page</a></li>
									</ul>
								</li>
								<li><a href="shop-grid.html">Shop</a>
									<ul>
										<li><a href="shop-grid.html">Shop Grid</a></li>
										<li><a href="single-product.html">Single Product</a></li>
									</ul>
								</li>
								<li><a href="blog.html">Blog</a>
									<ul>
										<li><a href="blog.html">Blog Page</a></li>
										<li><a href="blog-details.html">Blog Details</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>

		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
        <br><br>
		<!-- Start My Account Area -->
	


<?php
	echo "Welcome ".$_SESSION['email'];
?>





























		

		<div style="margin-top:5%;margin-bottom:5%">
			
		</div>
		<!-- End My Account Area -->
		<!-- Footer Area -->
		<footer id="wn__footer" style="background-color:#353535;color:white" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p> All Copyrights Reserved <i class="fa fa-copyright"></i> <a href="http://pixsonik.com/" style="color:white">Pixsonik</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="images/icons/payment.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->
		
	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	
</body>
</html>