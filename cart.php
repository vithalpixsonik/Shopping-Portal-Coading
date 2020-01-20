<?php
include "functions/connection.php";
include "functions/getip.php";
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shopping Cart | Bookshop Responsive Bootstrap4 Template</title>
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
							
								<li class="drop"><a href="#" style="color:black">Men</a>
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
        
		<!-- cart-main-area start -->
		<br>
		<p style="text-align:center;font-size:28px;margin-top:5%">Cart</p>
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-update">Update</th>
											<th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       

										<?php
										if(isset($_SESSION['email'])){
											$em=$_SESSION['email'];
											$get_prod = "select * from cart where email='$em'";
											$run_pro = mysqli_query($con, $get_prod); 
											while($row=mysqli_fetch_array($run_pro)){ 
												echo'
												<tr>
												<form method="post" action="cart.php">
													<td class="product-thumbnail"><a href="#"><img src="dashboard/uploads/featured/'.$row["product_name"].'".png width="100%"></a></td>
													<td class="product-name"><a href="#">'.$row['product_name'].'</a></td>
													<td class="product-price"><span class="amount">'.$row['price'].'</span></td>
													<td class="product-quantity"><input type="number" name="quantity" value="'.$row['quantity'].'"></td>
													<td class="product-subtotal">'.$row['total'].'</td>
													<td class="product-remove"><a href="dashboard/updatecart.php?id='.$row['p_id'].'"><button  type="submit">&#x21bb;</button></a></td>
												</form>
													<td class="product-remove"><a href="dashboard/deletecart.php?id='.$row['p_id'].'">X</a></td>	
												</tr>
												';
											
												if(isset($_GET['quantity']))
											{
												echo $_GET['quantity'];
				
											}

											}
											
										}
										else{
											echo "<tr><td colspan='7'>No Item In Cart</td></tr>";
										}
										?>
   
                                       
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                        
                    </div>
				</div>
				
				
			<!-- checkout Price Calculation -->
			
			<?php
			if(isset($_SESSION['email'])){
				$em=$_SESSION['email'];			
				$get_prod = "select * from cart where email='$em'";
				$gst1=0;
				$gst2=0;
				$gst=0;
				$total1=0;
				$total2=0;
				$cart_total=0;
				$run_pro = mysqli_query($con, $get_prod); 
				while($row=mysqli_fetch_array($run_pro)){ 
					$cart_total=$cart_total+$row['total'];
					if($row['price']<1000){
						$gst1=$row['total']*0.05;
						$total1=$total1+$gst1;
						
					}
					if($row['price']>1000){
						$gst2=$row['total']*0.12;
						$total2=$total2+$gst2;
					}
					
				}

				$gst=$total1+$total2;
				$grand_total=$cart_total+$gst;
				
			
             echo '<div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
									<li>Cart total : </li>
									<li>Gst : </li>
                                    <li>Delivery Fees :</li>
                                </ul>
                                <ul class="cart__total__tk">
									<li>'.$cart_total.' ₹</li>
									<li> '.ceil($gst).' ₹</li>
                                    <li> 0 ₹</li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>'.ceil($grand_total).' ₹</span>
                            </div>
                        </div>
                    </div>
				</div>';
				echo '
				<tr><br>
											<td><a href="checkout.php" style="padding:1% 2.5%;background-color:#323232;color:white;margin-left:90.4%">Checkout</a></td>
										</tr>';
			}

			else{
				echo "";
			}
				?>
<!-- Checkout price calculation Close -->
									
            </div>  
        </div>
        <!-- cart-main-area end -->
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