<?php
session_start();
include "functions/connection.php";
include "functions/getip.php";
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
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
							
								<li class="drop"><a href="#" style='color:#323232'>Men</a>
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
								
								<li class="drop"><a href="#" style="color:black">Women</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Top Wear</li>
											<li><a href="shop-grid.php?cat=women">Tops</a></li>
											<li><a href="shop-grid.php?cat=women">Tank Tops</a></li>
											<li><a href="shop-grid.php?cat=women">Sports Bra</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Bottom Wear</li>
											<li><a href="shop-grid.php?cat=women">Track pant</a></li>
											<li><a href="shop-grid.php?cat=women">Shorts</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Accessories</li>
											<li><a href="shop-grid.php?cat=women">Wallets</a></li>
											<li><a href="shop-grid.php?cat=women">Perfumes</a></li>		
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
							<li class="shopcart"><a class="cartbox_active" href="cart.php"><span class="product_qun">'.$count.'</span></a>

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
		<div class="brown--color box-search-content search_active block-bg close__top">
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
        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <a href=""><div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div></a>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <a href=""><div class="slide animation__style10 bg-image--2 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div></a>
            <!-- End Single Slide -->
        </div>
		<!-- End Slider area -->
		

<!-- banner1 -->

<div id="banner1" style="margin-top:5%">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<img src="images/banner/b3.jpg" alt="">
			</div>
			<div class="col-lg-4">
				<img src="images/banner/b1.jpg"  alt="">
			</div>
		</div>
	</div>
</div>


<!--  banner2 -->
<div id="advertise" style="margin-top:4%;">
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<img src="images/banner/banner1.jpg" style="border:1px solid #ececed" alt="">
		</div>
		<div class="col-lg-4">
			<img src="images/banner/b4.jpg" style="border:1px solid #ececed" alt="">
		</div>
		<div class="col-lg-4">
			<img src="images/banner/b5.jpg" style="border:1px solid #ececed" alt="">
		</div>
	</div>

</div>

</div>






		<!-- Start BEst Seller Area -->
		<section id="prod-line1" class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Special <span class="color--theme">Discount</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					

<?php
	include "functions/connection.php";
	$query = "select * from products";
	$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
   while($row = $run_pro->fetch_assoc()) {
	   $selling=$row['discount_price'];
	   $old=$row['price'];
	   $diff=$old-$selling;
	   $diff;
	   $per=($diff/$old)*100;
	   $formattedNum = number_format($per);
	 
	echo "
	
	<div class='product product__style--3'>
						<div class='col-lg-3 col-md-4 col-sm-6 col-12'>
							<div class='product__thumb'>
								<a class='first__img' href='single-product.php?p-id=".$row['id']."'><img class='img-responsive' src='dashboard/uploads/featured/".$row['name']."'.png width='100%' style='border:1px solid lightgrey'></a>
								<a class='second__img animation1' href='single-product.php?p-id=".$row['id']."'><img class='img-responsive' src='dashboard/uploads/featured/".$row['name']."'.png width='150px' style='border:1px solid lightgrey'></a>
								<div class='hot__box'>
									<span class='hot-label'>".$formattedNum." % OFF</span>
								</div>
							</div>
							<div class='product__content content--center'>
								<h4><a href='single-product.php?p-id=".$row['id']."'>".$row['name']."</a></h4>
								<ul class='prize d-flex'>
									<li> ₹ ".$row['discount_price']."</li>
									<li class='old_prize'> ₹ ".$row['price']."</li>
									
								</ul>
								<div class='action'>
									<div class='actions_inner'>
										<ul class='add_to_links'>
										<li><a class='cart' href='single-product.php?p-id=".$row['id']."'><i class='fas fa-shopping-cart'></i></a></li>
										<li><a class='wishlist' id='wishlist-btn' href='dashboard/addwishlist.php?id=".$row['id']."'><i class='fa fa-heart'></i></a></li>
										</ul>
									</div>
								</div>
							
							</div>
						</div>
					</div>
	
	
	
	";
   }
   echo "<p id='message'></p>";
?>








				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>


<!-- Full Banner1 -->
<div id="full-banner1" style="background-image:url(images/banner/bg4.jpg);background-size:cover;width:100%;height:100vh">

</div>



<!-- Best Seller -->
	<!-- Start BEst Seller Area -->
	<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Newest <span class="color--theme">Arrivals</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					

<?php
	include "functions/connection.php";
	$query = "select * from products ORDER BY RAND() LIMIT 6";
	$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
   while($row = $run_pro->fetch_assoc()) {
	   $selling=$row['discount_price'];
	   $old=$row['price'];
	   $diff=$old-$selling;
	   $diff;
	   $per=($diff/$old)*100;
	   $formattedNum = number_format($per);
	 
	echo "
	
	<div class='product product__style--3'>
						<div class='col-lg-3 col-md-4 col-sm-6 col-12'>
							<div class='product__thumb'>
								<a class='first__img' href='single-product.php?p-id=".$row['id']."'><img class='img-responsive' src='dashboard/uploads/featured/".$row['name']."'.png width='100%' style='border:1px solid lightgrey'></a>
								<a class='second__img animation1' href='single-product.php?p-id=".$row['id']."'><img class='img-responsive' src='dashboard/uploads/featured/".$row['name']."'.png width='150px' style='border:1px solid lightgrey'></a>
								<div class='hot__box'>
									<span class='hot-label'>".$formattedNum." % OFF</span>
								</div>
							</div>
							<div class='product__content content--center'>
								<h4><a href='single-product.php?p-id=".$row['id']."'>".$row['name']."</a></h4>
								<ul class='prize d-flex'>
									<li> ₹ ".$row['discount_price']."</li>
									<li class='old_prize'> ₹ ".$row['price']."</li>
									
								</ul>
								<div class='action'>
									<div class='actions_inner'>
										<ul class='add_to_links'>
											<li><a class='cart' href='single-product.php?p-id=".$row['id']."' ><i class='fas fa-shopping-cart'></i></a></li>
											<li><a class='wishlist' href='dashboard/addwishlist.php?id=".$row['id']."'><i class='fa fa-heart'></i></a></li>
										</ul>
									</div>
								</div>
							
							</div>
						</div>
					</div>
	
	
	
	";
   }
   
?>


					
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>


<!-- two banner section -->
<div id="two-banner" style="margin-bottom:5%">
	<div class="container">
   		<div class="row">
   			<div class="col-lg-6" style="margin:0;padding:0">
   				<img src="images/banner/b6.jpg" alt="">
			</div>
			<div class="col-lg-6" style="margin:0;padding:0">
				<img src="images/banner/b7.jpg" alt="">
			</div>
		</div>
		<div class="row mt-3" >
   			<div class="col-lg-6">
			   <img src="images/banner/b7.jpg" alt="">
			</div>
			<div class="col-lg-6">
				<img src="images/banner/b9.jpg" alt="">
			</div>
		</div>
	</div>
</div>



<!-- Products You May Like -->

<section class=" brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Best <span class="color--theme">Seller</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="row" style="margin-top:5%">
					<!-- Start Single Product -->
					

<?php
	include "functions/connection.php";
	$query = "select * from products ORDER BY RAND() LIMIT 4";
	$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
   while($row = $run_pro->fetch_assoc()) {
	   $selling=$row['discount_price'];
	   $old=$row['price'];
	   $diff=$old-$selling;
	   $diff;
	   $per=($diff/$old)*100;
	   $formattedNum = number_format($per);
	 
	echo "
			<div class='col-lg-3' >
			<center>
				<a class='first__img' href='single-product.php?p-id=".$row['id']."'><img class='img-responsive' src='dashboard/uploads/featured/".$row['name']."'.png width='95%' style='border:1px solid lightgrey'></a>
				<p style='text-align:center;font-size:17px;margin-top:1%'>".$row['name']."<br>
				<p>".$row['discount_price']. " ₹<span>&nbsp; <strike> ".$row['price']." ₹</strike></span></p>
			</center>
			</div>					

	";
   }
?>


					
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>





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
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="product" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-body">
							<form method="POST" action="dashboard/addcart.php">
								<p style="text-align:center">Select Size</p><br>
										<center>
											<div class="btn-group" name="size-btn" role="group" style="border-radius:0;background-color:white" aria-label="Basic example">
											<button type="button"  class="btn" style="border-radius:0;background-color:white !important;border:1px solid black">S</button>
											<button type="button" class="btn" style="border-radius:0;background-color:white !important;border:1px solid black">M</button>
											<button type="button" class="btn" style="border-radius:0;background-color:white !important;border:1px solid black">L</button>
											<button type="button" class="btn" style="border-radius:0;background-color:white !important;border:1px solid black">XL</button>
										</div>
										
								<br><br>
								<a href="dashboard/addcart.php?"><button type="submit" class="btn btn-danger btn-sm" name="add-cart-btn"></button>
								</center>
							</form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- END QUICKVIEW PRODUCT -->
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