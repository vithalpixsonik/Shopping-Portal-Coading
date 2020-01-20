<?php
				include "../functions/connection.php";
				if(isset($_POST['insert-product'])){
				 $name=$_POST['product-name'];
				 $sku=$_POST['sku'];
				 $size=$_POST['size'];
				 $quantity=$_POST['quantity'];
				 $category=$_POST['category'];
				 $sub_category=$_POST['sub-category'];

				 $featured_image = $_FILES['featured_image']['name'];
				 $target_dir1 = "uploads/featured/";
				 $target_file = $target_dir1 . basename($_FILES["featured_image"]["name"]);

				 $image1 = $_FILES['sample1']['name'];
				 $target_dir2 = "uploads/image1/";
				 $target_file = $target_dir2 . basename($_FILES["sample1"]["name"]);

				 $image2 = $_FILES['sample2']['name'];
				 $target_dir3 = "uploads/image2/";
				 $target_file = $target_dir3 . basename($_FILES["sample2"]["name"]);

				 $image3 = $_FILES['sample3']['name'];
				 $target_dir4 = "uploads/image3/";
				 $target_file = $target_dir4 . basename($_FILES["sample3"]["name"]);
				 //folder where images will be uploaded
				 $folder = 'uploads/featured/';
				 //function for saving the uploaded images in a specific folder
				

				 $price=$_POST['price'];
				 $discount_price=$_POST['discount-price'];
				$brand=$_POST['brand'];
				$description=$_POST['desc'];
				
				 $name."<br>";		
				 $sku."<br>";
				 $size."<br>";
				 $quantity."<br>";
				 $category."<br>";
				 $sub_category."<br>";
				 $featured_image."<br>";
				 $image1."<br>";
				 $image2."<br>";
				 $image3."<br>";
				 $price."<br>";
				 $discount_price."<br>";
				 $brand."<br>";
				 $description."<br>";
				

				  $query = "insert into products(name,sku,size,quantity,category,sub_category,featured_image,
				  image1,image2,image3,price,discount_price,brand_name,description)
				   values('$name','$sku', '$size','$quantity','$category','$sub_category','$featured_image','$image1','$image2','$image3','$price','$discount_price','$brand','$description')";
				$run=  mysqli_query($con,$query);
				  
				   move_uploaded_file($_FILES['featured_image']['tmp_name'],$target_dir1.$name);
				   move_uploaded_file($_FILES['sample1']['tmp_name'],$target_dir2.$name);
				   move_uploaded_file($_FILES['sample2']['tmp_name'],$target_dir3.$name);
				   move_uploaded_file($_FILES['sample3']['tmp_name'],$target_dir4.$name);
				 if($run){
					echo "<script>alert('Record Inserted');</script>";
				 }
				else{
					echo  mysqli_error($con);
				}
				//   header("location: admin1.php");
			}
				?>