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
	<title>Checkout | Bookshop Responsive Bootstrap4 Template</title>
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
       
        <!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
        		
        		<div class="row" style="margin-top:5%">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<h3>Billing details</h3>



						<!-- ###################     Address card      ####################-->
						<?php
							if(isset($_SESSION['email']))
							{
								
								$email=$_SESSION['email'];
								$query = "select * from address where email='$email'";
								$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
								$count=0;
								$rowcount=mysqli_num_rows($run_pro);
								if($rowcount==1){
								while($row = $run_pro->fetch_assoc()) {
									echo '
										<div class="card" style="border:2px solid #656565;border-radius:0">
											<div class="card-body">
												<table style="border: none;">
												<tr>
												<td><span style="font-weight:bold">First Name : </span> '.$row['first_name'].'</td>
												<td><span style="font-weight:bold">Last Name : </span> '.$row['last_name'].'</td>
												</tr>
												<tr>
												<td><span style="font-weight:bold">Email : </span> '.$row['email'].'</td>
												<td><span style="font-weight:bold">Contact : </span> '.$row['phone'].'</td>
												</tr>
												<tr>
												<td><span style="font-weight:bold">Flat No/Building/Street : </span> '.$row['address_line1'].'</td>
												</tr>
												<tr>
												<td><span style="font-weight:bold">Area / City  : </span> '.$row['address_line2'].'</td>
												</tr>
												<tr>
												<td><span style="font-weight:bold">Postal Code : </span> '.$row['postcode'].'</td>
												</tr>
												</table>
											</div>
										</div>
									';
								
								}
							}
							if($rowcount==0)
							{
								echo '
								<div class="customar__field">
        						<div class="margin_between">
	        						<div class="input_box space_between">
	        							<label>First name <span>*</span></label>
	        							<input type="text">
	        						</div>
	        						<div class="input_box space_between">
	        							<label>last name <span>*</span></label>
	        							<input type="text">
	        						</div>
        						</div>
        						<div class="input_box">
        							<label>Address <span>*</span></label>
        							<input type="text" placeholder="Street address">
        						</div>
        						<div class="input_box">
        							<input type="text" placeholder="Apartment, suite, unit etc. (optional)">
        						</div>
        						<div class="input_box">
        							<label>District<span>*</span></label>
        							<select class="select__option">
										<option>Select a country…</option>
										<option>Maharashtra</option>
										<option>Goa</option>
										<option>karnataka</option>
										<option>Gujrat</option>
										<option>Delhi</option>
										<option>Panjab</option>
        							</select>
        						</div>
								<div class="input_box">
									<label>Postcode / ZIP <span>*</span></label>
									<input type="text">
								</div>
								<div class="margin_between">
									<div class="input_box space_between">
										<label>Phone <span>*</span></label>
										<input type="text">
									</div>

									<div class="input_box space_between">
										<label>Email address <span>*</span></label>
										<input type="email">
									</div>
								</div>
							</div>
								';
							}
								
							}
						?>
<!--   ###################################################################-->



        					
							


<!--  Form End -->






        					
        				</div>
        				<div class="customer_details mt--20">
        					<div class="differt__address">
	        					<input name="ship_to_different_address" value="1" type="checkbox">
	        					<span>Wan't to edit address ?</span>
							</div>
							
							<!-- ####################### edit address ############################### -->
							<?php
								if(isset($_SESSION['email']))
								{
									
									$email=$_SESSION['email'];
									$query = "select * from address where email='$email'";
									$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
									$count=0;
									$rowcount=mysqli_num_rows($run_pro);
									if($rowcount==1){
										while($row = $run_pro->fetch_assoc()) {
											echo '
								<form method="POST" action="checkout.php">
									<div class="customar__field differt__form mt--40">
										<div class="margin_between">
											<div class="input_box space_between">
												<label>First name <span>*</span></label>
												<input type="text" name="fname" value="'.$row['first_name'].'" >
											</div>
											<div class="input_box space_between">
												<label>last name <span>*</span></label>
												<input type="text" name="lname" value="'.$row['last_name'].'" >
											</div>
										</div>
										<div class="margin_between">
											<div class="input_box space_between">
												<label>Email <span>*</span></label>
												<input type="text" name="email" value="'.$row['email'].'" >
											</div>
											<div class="input_box space_between">
												<label>Contact <span>*</span></label>
												<input type="text" name="phone" value="'.$row['phone'].'" >
											</div>
										</div>
										
										<div class="input_box">
											<label>Flat No/Building/Street : <span>*</span></label>
											<input type="text" name="line1" value="'.$row['address_line1'].'" >
										</div>
										<div class="input_box">
											<label>Area / City  <span>*</span></label>
											<input type="text" name="line2" value="'.$row['address_line2'].'" >
										</div>
										<div class="input_box">
											<label>State<span>*</span></label>
											<select class="select__option" name="state"> 
												<option>Select a state…</option>
												<option value="maharashtra">Maharashtra</option>
												<option value="delhi">Delhi</option>
												<option value="goa">Goa</option>
												<option value="karnataka">Karnataka</option>
												<option value="gujrat">Gujrat</option>
												<option value="panjab">Panjab</option>
											</select>
										</div>
										<div class="input_box">
											<label>Postcode / ZIP <span>*</span></label>
											<input type="text" name="postcode" value="'.$row['postcode'].'">
											
										</div>
										
										<input class="btn text-white" name="update" style="border-radius:0;background-color:#323232" type="submit" name="" value="Update">
										
							</div>
							</form>
											';
										}
									}
							}
							?>
							

							<?php
							$emails=$_SESSION['email'];
								if(isset($_POST['update']))
								{
									$fname=$_POST['fname'];
									
									$lname=$_POST['lname'];
									
									$email=$_POST['email'];
									
									$contact=$_POST['phone'];
									
									$line1=$_POST['line1'];
									
									$line2=$_POST['line2'];
									
									$state=$_POST['state'];
									
									$postalcode=$_POST['postcode'];
									
									$sql = "update address SET first_name='$fname',last_name='$lname',email='$email',phone='$contact',
									address_line1='$line1',address_line2='$line2',state='$state',postcode='$postalcode' WHERE email='$emails'"; 
										if(mysqli_query($con, $sql)){ 
											echo "<p style='color:green'>Address Updated Successfully.</p>"; 
										} else { 
											echo "ERROR: Could not able to execute $sql. ". mysqli_error($con); 
										}  
									}
							
							?>
							
						<!-- ######################## End Update Address ######################### -->	

        				</div>
        			</div>
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__order__box">
        					<h3 class="onder__title">Your order</h3>
        					<ul class="order__total">
        						<li>Product</li>
        						<li>Total</li>
							</ul>
							<?php
								if(isset($_SESSION['email'])){
								 	$em=$_SESSION['email'];
									$get_prod = "select * from cart where email='$em'";
									$run_pro = mysqli_query($con, $get_prod); 
									
										
									
							?>
        					<ul class="order_product">
								<?php
								$count=0;
								$product_name="";
								while($row=mysqli_fetch_array($run_pro)){
								$count=$count+$row['price'];
								$product_name=$row['product_name'];
								$price=$row['price'];
								$shipping=30;
								$grand_total=0;	
							
								}
								echo '

								<li>Cart Subtotal <span>'.$count.' ₹</span></li>
        						<li>Gst <span>$'.$count.'</span></li>
								<li>Shipping <span>'.$shipping.' ₹</span></li>
								<li style="font-weight:bold">Order Total <span>$223.00</span></li>
								';
							}
								?>
        						
        					</ul>
        					
						</div>
							
					    <div id="accordion" class="checkout_accordion mt--30" role="tablist">
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingOne">
						          	<a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						                <span>Direct Bank Transfer</span>
						          	</a>
						        </div>
						        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
					            	<div class="payment-body">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</div>
						        </div>
						    </div>
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingTwo">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							            <span>Cheque Payment</span>
						          	</a>
						        </div>
						        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
					          		<div class="payment-body">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</div>
						        </div>
						    </div>
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingThree">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							            <span>Cash on Delivery</span>
						          	</a>
						        </div>
						        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
					          		<div class="payment-body">Pay with cash upon delivery.</div>
						        </div>
						    </div>
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingFour">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							            <span>PayPal <img src="images/icons/payment.png" alt="payment images"> </span>
						          	</a>
						        </div>
						        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
					          		<div class="payment-body">Pay with cash upon delivery.</div>
						        </div>
						    </div>
					    </div>

        			</div>
        		</div>
        	</div>
        </section>
        <!-- End Checkout Area -->
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