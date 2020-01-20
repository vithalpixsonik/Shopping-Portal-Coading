<?php 

	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'estore');
	
	//connecting to database and getting the connection object
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	//Checking if any error occured while connecting
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}
	
	//creating a query
	$stmt = $conn->prepare("SELECT id, name, sku, size, quantity, category,sub_category,featured_image,
	image1,image2,image3,price,discount_price,brand_name,description FROM products;");
	
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($id, $name,$sku,$size,$quantity,$category,$sub_category,$featured_image,$image1,
	$image2,$image3 ,$price, $discount_price, $brand_name, $description);
	
	$products = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){
		$temp = array();
		$temp['id'] = $id;
		$temp['name'] = $name;
		$temp['sku'] = $sku;
		$temp['size'] = $size;			
		$temp['quantity'] = $quantity;
		$temp['category'] = $category;
		$temp['sub_category'] = $sub_category;
		$temp['featured_image'] = $featured_image;
		$temp['image1'] = $image1;
		$temp['image2'] = $image2;
		$temp['image3'] = $image3;
		$temp['price'] = $price;
		$temp['discount_price'] = $discount_price;
		$temp['brand_name'] = $brand_name;
		$temp['description'] = $description;
		array_push($products, $temp);
	}

	//displaying the result in json format 
	print json_encode($products);
	
	
	
	
	
	
	
	
	
	