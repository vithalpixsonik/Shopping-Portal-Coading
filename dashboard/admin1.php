<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>


        <?php
        include "../functions/connection.php";
        $sql="select * from admin";
        $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           
      ?>

    <div id="main">
            <nav class="navbar navbar-fixed-top navbar-toggleable-sm navbar-inverse bg-dark mb-3">
                <p class="text-white"><?php echo "Welcome : " . $row["username"];  ?></p>
                <div style="position: absolute;right: 10%">
                    <a href="#" class="text-white"><i class="fas fa-sign-out-alt" style="font-size: 21px"></i> Logout</a>
                </div>
                
            </nav>
                  <div class="container-fluid">
                    <div class="row row-offcanvas row-offcanvas-left">
                      <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
                        <ul class="nav flex-column pl-1">
                         
                        <!-- Account -->
                        <li class="nav-item">
                            <a class="nav-link" id="manage-account" data-toggle="collapse" data-target="#submenu5">Manage Account</a> 
                        </li>

                            <!-- Category -->
                          <li class="nav-item">
                            <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Categories ▾</a>
                            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                              <li class="nav-item"><a class="nav-link" id="add-category" href="">Add Category</a></li>
                              <li class="nav-item"><a class="nav-link" id="view-category" href="">View Category</a></li>
                              <li class="nav-item"><a class="nav-link" id="delete-category" href="">Delete Category</a></li>
                            </ul>
                          </li>

                        <!-- Products -->

                          <li class="nav-item">
                            <a class="nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">Products ▾</a>
                                <ul class="list-unstyled flex-column pl-3 collapse" id="submenu2" aria-expanded="false">
                                  <li class="nav-item"><a id="add-products" class="nav-link" href="">Add Products</a></li>
                                  <li class="nav-item"><a id="manage-products" class="nav-link" href="">Manage Products</a></li>
                                  <li class="nav-item"><a id="product-stats" class="nav-link" href="">Products Stats</a></li>
                                </ul>
                            </li>
                          


                            
                        <!-- Users -->

                          <li class="nav-item">
                            <a class="nav-link" href="#submenu3" data-toggle="collapse" data-target="#submenu3">Users ▾</a>
                                <ul class="list-unstyled flex-column pl-3 collapse" id="submenu3" aria-expanded="false">
                                      <li class="nav-item"><a class="nav-link" href="">Add User</a></li>
                                      <li class="nav-item"><a class="nav-link" href="">View User</a></li>
                                      <li class="nav-item"><a class="nav-link" href="">Block User</a></li>
                                      <li class="nav-item"><a class="nav-link" href="">Delete User</a></li>
                                </ul>
                            </li>


                            <!-- Orders -->

                            <li class="nav-item">
                                <a class="nav-link" href="#submenu3" data-toggle="collapse" data-target="#submenu4">Orders ▾</a>
                                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu4" aria-expanded="false">
                                        <li class="nav-item"><a class="nav-link" href="">View Order</a></li>
                                        <li class="nav-item"><a class="nav-link" href="">Update Order</a></li>
                                        <li class="nav-item"><a class="nav-link" href="">Delete Orders</a></li>
                                    </ul>
                            </li>



                        </ul>
                      </div>
                      <!--/col-->
                
<div class="col-md-9 col-lg-10 main">

        <div id="admin-acccount" style="display: none">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Update Account</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="profile">
                    <?php
                        echo "<h2 style='color:#121212'>welcome : ".$row["username"]."</h2>";
                      ?>
                  </div>



                  <div role="tabpanel" class="tab-pane fade" id="buzz">
                  <div id="form-div" style="width:40%;margin-top:2%">
                          <form method="post" action="updateadmin.php">
                            <div class="form-group">
                              <label style="color:#222222" for="email">Username:</label>
                              <input type="text" class="form-control" name="username" value="<?php echo $row["username"]; ?>" id="email">
                            </div>
                            <div class="form-group">
                              <label style="color:#222222" for="pwd">Old Password:</label>
                              <input type="password" class="form-control" name="old-password" id="old-pwd">
                            </div>
                            <div class="form-group">
                              <label style="color:#222222" for="pwd">New Password:</label>
                              <input type="password" class="form-control"  name="new-password" id="new-pwd">
                            </div>
                            <input type="submit" name="update" value="Update Account" class="btn btn-danger">
                        </form>
                    </div>

                  </div>
                
                </div>


</div>


                        <!------------------------------------- Category------------------------- -->

        <!-- Add cat -->  
<?php
    include "../functions/connection.php";
    $sql1="select * from categories";
    $result = $con->query($sql1);

if ($result->num_rows > 0) {
  
  ?>                  
        <div id="add-cat" style="display:none;width:85%">
        <h3 style="margin-top:3%;margin-bottom:3%;color:#121212;margin-left:3%">Add category</h3>
                  <form style="" method="POST" action="addcategory.php">
              <div class="form-group">
                <label  style="color:#222222" for="exampleFormControlInput1">Category Name</label>
                <input type="text" name="cat_name" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="form-group">
                <label style="color:#222222" for="exampleFormControlSelect1">Parent Category</label>
                <select class="form-control" name="parent_category" id="exampleFormControlSelect1">
                  <option value="">None</option>
                <?php   while($row = $result->fetch_assoc()) {
                        echo $row['name'];

                        echo "<option value='".$row['name']."'>".$row['name']."</option>" ; 
                }}
                ?>  

                </select>
              </div>
              <div class="form-group">
                <label style="color:#222222" for="exampleFormControlSelect1">Category Type</label>
                <select class="form-control" name="category_type" id="exampleFormControlSelect1">
                  <option value="main-category">Main Category</option>
                  <option value="sub-category">Sub-Category</option>
                </select>
              </div>

              <div class="form-group">
                <label style="color:#222222" for="exampleFormControlSelect2">Category Heading</label>
                <select class="form-control" name="category_heading" id="exampleFormControlSelect2">
                <option value="">None</option>
                  <option value="top-wear">Top-Wear</option>
                  <option value="bottom-wear">Bottom-Wear</option>
                  <option value="accessories">Accessories</option>
                </select>
              </div>

              <input class="btn btn-danger" type="submit" name="add-cat" value="Add category" class="btn btn-default">
            </form>
      </div>
      <?php }} ?>



<!-- View Categories -->
<div id="view-cat" style="display:none">
<?php
  include "../functions/connection.php";
  $query = "select * from categories";
  $run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
	echo "<table class='table table-striped' style='color:white;width:90%'>                     
			<div class='table responsive table-striped'>
				<thead>
					<tr>
						<th id='td' style='color:black;'>Id</th>
					  <th id='td' style='color:black;'>Name</th>
						<th id='td' style='color:black;'>Parent Category</th>
						 <th id='td' style='color:black;'>Category Type</th>
						 <th id='td' style='color:black;'>Category Heading</th>
					</tr>
				</thead>
        <tbody>";
        

  ?>


 
          <h4>View Categories</h4>
          <?php
	 while($row = $run_pro->fetch_assoc()) {
    $id=$row["id"];
   	$name=$row["name"];
   	$parent_category=$row["parent_category"];
    $category_type=$row["category_type"];
     $category_heading=$row["category_heading"];

   echo "<tr>
          <td class='text-dark'>".$id."</td>
          <td class='text-dark'>".$name."</td>
          <td class='text-dark'>".$parent_category."</td>
          <td class='text-dark'>".$category_type."</td>
          <td class='text-dark'>".$category_heading."</td>
        </tr>";


   }
  echo "</tbody></div></table>"
?>
              
</div>     



<!----------------------------------------------------    Delete category     ------------------------------------>

<div id="delete-cat" style="display:none" >
<?php
include "../functions/connection.php";
$query = "select * from categories";
$run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));


?>
    <form method="POST" action="deletecategory.php">
      <h5>Select Category : </h5>  <br>
      <select>
        <?php
        while($row = $run_pro->fetch_assoc()) {
        echo "<option value=''>".$row['name']."</option>";
      } ?>
        </select>
        <br><br>
        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
    </form>
<?php ?>
</div>
                        
                     
                
                 
                      <!--/main col-->
                    



<!------------------------------------------ Product Section  ---------------------------------------------------------------->


<!--  add Products  -->

  <div id="add-products-div" style="display:none">

      <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="profile">
            <?php
                echo "<h2 style='color:#121212'>welcome : ".$row["username"]."</h2>";
              ?>
          </div>



          <div role="tabpanel" class="tab-pane fade" id="buzz">
          <div id="form-div" style="width:40%;margin-top:2%">
                  <form method="post" action="updateadmin.php">
                    <div class="form-group">
                      <label style="color:#222222" for="email">Username:</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $row["username"]; ?>" id="email">
                    </div>
                    <div class="form-group">
                      <label style="color:#222222" for="pwd">Old Password:</label>
                      <input type="password" class="form-control" name="old-password" id="old-pwd">
                    </div>
                    <div class="form-group">
                      <label style="color:#222222" for="pwd">New Password:</label>
                      <input type="password" class="form-control"  name="new-password" id="new-pwd">
                    </div>
                    <input type="submit" name="update" value="Update Account" class="btn btn-danger">
                </form>
            </div>

          </div>
        
        </div>

      <h3 style="margin-top:2%;color:black">Add Products</h3>
      <form enctype="multipart/form-data" method="POST" action="insertproduct.php"  style="width:60%">
      <br>
          <input type="text" class="form-control" name="product-name" style="width:40%;display:inline-block"  placeholder="Product Name" id="">
          <input type="text" class="form-control" name="sku" style="width:40%;display:inline-block;margin-left:3%" placeholder="Sku" id=""><br><br>
          Size : <select name="size" class="form-control" style="width:30%;display:inline-block;margin-right:3%" id="">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
            <option value="extra-large">Extra Large</option>
          </select>
          <input type="text" class="form-control" name="quantity" style="width:30%;display:inline-block" placeholder="Quantity" id=""><br><br>
                 
          Category <select name="category" class="form-control" style="width:30%;display:inline-block;margin-right:3%" id="">
          <?php
             include "../functions/connection.php";
             $query = "select DISTINCT parent_category from categories";
             $run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
            while($row = $run_pro->fetch_assoc()) {
            echo "<option value='".$row['parent_category']."'>".$row['parent_category']."</option>";
            } ?>  
          </select>


          Sub-Category <select name="sub-category" class="form-control" style="width:30%;display:inline-block" id="">
          <?php
             include "../functions/connection.php";
             $query = "select DISTINCT name from categories";
             $run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
            while($row = $run_pro->fetch_assoc()) {
            echo "<option value='".$row['name']."'>".$row['name']."</option>";
           } ?>   
          </select> <br><br>

          Featured Image : <input type="file" name="featured_image" class="file_input" style="display:inline-block;width:29%"  id="">
        &nbsp; &nbsp; &nbsp;  Image 1 : <input type="file" class="file_input" style="display:inline-block;width:29%;margin-left:2%" name="sample1" id=""><br><br>
       Image 2 : <input type="file" class="form-control" style="display:inline-block;width:29%;margin-left:2%" name="sample2" id="">
        &nbsp; &nbsp; &nbsp;  Image 3 : <input type="file" class="file_input" style="display:inline-block;width:29%;margin-left:2%" name="sample3" id="">
        <br><br>
        <input type="text" name="price" style="width:40%;display:inline-block" class="form-control" placeholder="Price" id="">
        <input type="text" name="discount-price" style="width:40%;;display:inline-block;margin-left:3%" class="form-control" placeholder="Discount Price" id="">
     <br><br>
     <input type="text" name="brand" style="width:40%;display:inline-block" class="form-control" placeholder="Brand name" id=""><br><br>
      <textarea name="desc" class="form-control" placeholder="Description"  cols="20" rows="5"></textarea><br>
      <input type="submit" name="insert-product" class="btn btn-danger" value="Add product" >  
   
    </form>
    <br>
    <br>
  </div>





<!-- Manage Products -->

    <div id="manage-products-div" style="display:none;overflow: auto;height:87vh">
    <?php
    echo '
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Selling Price</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
    ';
    include "../functions/connection.php";
    $query = "select * from products";
             $run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
            while($row = $run_pro->fetch_assoc()) {
              echo "<tr>
              <td>".$row['id']."</td>
              <td><img class='img-responsive' src='uploads/featured/".$row['name']."'.png width='150px' style='border:1px solid lightgrey'>
              </td>
              <td>".$row['name']."</td>
              <td>".$row['category']."</td>
              <td>".$row['sub_category']."</td>
              <td>".$row['price']."</td>
              <td>".$row['quantity']."</td>
              <td><a href='deleteproduct.php?id=".$row['id']."'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
              <a id='edit-product'  href='admin1.php?id=".$row['id']."'  data-toggle='modal' data-target='#exampleModal' > <button type='button'  class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-edit'></i></button></a>
              </td></tr>
              ";

            }
echo "
      </tbody>
      </table>";

    ?>



<!-- Update product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
           
    </div>



<!-- Products Stats -->

<div id="product-stats-div" style="display:none;">
    <?php
       include "../functions/connection.php";
       $count=0;
       $query = "select * from products";
                $run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
               while($row = $run_pro->fetch_assoc()) {
                $count=$count+1;
               }
               echo "<h5>Total Products ".$count."</h5>";
    ?>
</div>



                
                  </div></div>
                  <!--/.container-->
               
  
                  
              





<!-- JQUERY TOGGLE DIV CODE -->       
    <script>
        $(document).ready(function(){
          $("#add-cat").hide();
         var page_name=sessionStorage.getItem("page");
          $(page_name).show();



          $("#manage-account").click(function(){
                $("#add-cat").hide(); 
                $("#view-cat").hide();
                $("#delete-cat").hide();
                $("#admin-acccount").show();
                $("#add-products-div").hide();
                $("#manage-products-div").hide();
                $("#product-stats-div").hide();
                current="#admin-acccount";
		            sessionStorage.setItem("page",current);
                return false;
            });

            $("#add-category").click(function(){
                $("#add-cat").show(); 
                $("#view-cat").hide();
                $("#delete-cat").hide();
                $("#admin-acccount").hide();
                $("#add-products-div").hide();
                $("#manage-products-div").hide();
                $("#product-stats-div").hide();
                current="#add-cat";
		            sessionStorage.setItem("page",current);
                return false;
            });
            
            
            $("#view-category").click(function(){
              $("#add-cat").hide(); 
              $("#view-cat").show();
              $("#delete-cat").hide();
              $("#admin-acccount").hide();
              $("#add-products-div").hide();
                $("#manage-products-div").hide();
                $("#product-stats-div").hide();
                current="#view-cat";
		            sessionStorage.setItem("page",current);
              return false;
            });

            $("#delete-category").click(function(){
              $("#add-cat").hide(); 
                $("#view-cat").hide();
                $("#delete-cat").show();
                $("#admin-acccount").hide();
                $("#add-products-div").hide();
                $("#manage-products-div").hide();
                $("#product-stats-div").hide();
                current="#delete-cat";
		            sessionStorage.setItem("page",current);
                return false;
            })


            $("#add-products").click(function(){
              $("#add-cat").hide(); 
                $("#view-cat").hide();
                $("#delete-cat").hide();
                $("#admin-acccount").hide();
                $("#add-products-div").show()
                $("#manage-products-div").hide();
                $("#product-stats-div").hide();
                current="#add-products-div";
		            sessionStorage.setItem("page",current);
                return false;
            })


$("#edit-product").click(function()
{
    current="#manage-products-div";
		sessionStorage.setItem("page",current);
});


            $("#manage-products").click(function(){
              $("#add-cat").hide(); 
                $("#view-cat").hide();
                $("#delete-cat").hide();
                $("#admin-acccount").hide();
                $("#add-products-div").hide();
                $("#manage-products-div").show();
                $("#product-stats-div").hide();
                current="#manage-products-div";
		            sessionStorage.setItem("page",current);
                return false;
            })

            $("#product-stats").click(function(){
              $("#add-cat").hide(); 
                $("#view-cat").hide();
                $("#delete-cat").hide();
                $("#admin-acccount").hide();
                $("#add-products-div").hide();
                $("#manage-products-div").hide();
                $("#product-stats-div").show();
                current="#product-stats-div";
		            sessionStorage.setItem("page",current);
                return false;
            })
        });
    </script>



<!-- JQUERY TOGGLE DIV CODE END-->
                
                  <script>
                    // sandbox disable popups
                    if (window.self !== window.top && window.name != "view1") {
                      window.alert = function() {
                        /*disable alert*/
                      };
                      window.confirm = function() {
                        /*disable confirm*/
                      };
                      window.prompt = function() {
                        /*disable prompt*/
                      };
                      window.open = function() {
                        /*disable open*/
                      };
                    }
                    
                    // prevent href=# click jump
                    document.addEventListener(
                      "DOMContentLoaded",
                      function() {
                        var links = document.getElementsByTagName("A");
                        for (var i = 0; i < links.length; i++) {
                          if (links[i].href.indexOf("#") != -1) {
                            links[i].addEventListener("click", function(e) {
                              console.debug("prevent href=# click");
                              if (this.hash) {
                                if (this.hash == "#") {
                                  e.preventDefault();
                                  return false;
                                } else {
                                  /*
                                      var el = document.getElementById(this.hash.replace(/#/, ""));
                                      if (el) {
                                        el.scrollIntoView(true);
                                      }
                                      */
                                }
                              }
                              return false;
                            });
                          }
                        }
                      },
                      false
                    );
                  </script>
                
                  <!--scripts loaded here-->
                
                  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                  <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>
                  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
                
                
                  <script>
                    $(document).ready(function() {
                      $("[data-toggle=offcanvas]").click(function() {
                        $(".row-offcanvas").toggleClass("active");
                      });
                    });
                  </script>     

    </div>







    </div>
</body>
</html>