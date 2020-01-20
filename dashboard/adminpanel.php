<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard </title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<!-- partial:index.partial.html -->

  <?php
    include "../functions/connection.php";
    $sql="select * from admin";
    $result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
  ?>
    <aside class="side-nav" id="show-side-navigation1">
      <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
      <div class="heading">
        <img src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="">
        <div class="info">
          <h3 style="margin-top:15%"><a href="#"><?php echo "Welcome : " . $row["username"];  ?></a></h3>
        </div>
      </div>
      <ul class="categories">
        <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="#">Products</a>
          <ul class="side-nav-dropdown">
            <li><a id="add-category" href="">Add Categories</a></li>
            <li><a id="add-product" href="#">Add Products</a></li>
            <li><a id="view-product" href="#">View Products</a></li>
            <li><a id="update-product" href="#">Update Product</a></li>
            <li><a id="delete-product" href="#">Delete Products</a></li>
          </ul>
        </li>
        <li><i class="fa fa-support fa-fw"></i><a href="#">Customers</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">View Customer</a></li>
            <li><a href="#">Delete Customer</a></li>
          </ul>
        </li>
        <li><i class="fa fa-envelope fa-fw"></i><a href="#">Orders</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">View Order</a></li>
            <li><a href="#">Order Status</a></li>
            <li><a href="#">Track Orders</a></li>
            <li><a href="#">Delete Order</a></li>
            <li><a href="#">Order Stats</a></li>
          </ul>
        </li>
      </ul>
    </aside>

    
    <section id="contents">
      <nav class="navbar navbar-default navbar-fixed-top" >
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <i class="fa fa-align-right"></i>
            </button>
            <a class="navbar-brand text-center" href="#">my<span class="main-color">Dashboard</span></a>
          </div>
          <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li id="myaccount"><a href="" ><i class="fa fa-user-o fw"></i> My account</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#"><i class="fa fa-sign-out"></i> Log out</a></li>
                </ul>
              </li>
              <li><a href="#"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>

      <section id="inner-frame" class="statistics">
       
         
        <!--  Admin Account -->
        
        <div id="admin-acccount">
                <div id="exTab2" style="margin-top:5%" class="container">	
                <ul class="nav nav-tabs">
                      <li class="active">
                        <a  href="#1" data-toggle="tab">Account</a>
                      </li>
                      <li><a href="#2" data-toggle="tab">Update Account</a>
                      </li>
                    </ul>

                      <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                          <?php
                            echo "
                            <h2 style='color:#121212'>welcome : ".$row["username"]."</h2>
                            ";
                          ?>
                        </div>
                        <div class="tab-pane" id="2">
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
                                <input type="submit" name="update" value="Update Account" class="btn btn-default">
                            </form>
                          </div>
                      
                        </div>
                      </div>
                  </div>

          </div>
        <!-- Admin account Close -->

  <!-- Products catagory -->
     
  <!-- 1. Add Categories -->
  <?php
    include "../functions/connection.php";
    $sql1="select * from categories";
    $result = $con->query($sql1);

if ($result->num_rows > 0) {
  
  ?>
      <div id="add-cat">
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


    
  <!-- End Add Categries -->


       
      </section>
     
     
      </section>
      <?php }} ?>



      <script src='http://code.jquery.com/jquery-latest.js'></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
      <!-- <script src='js/main.js'></script> -->
      </body>
    </html>
<!-- partial -->
<!-- <script  src="script.js"></script>
  <script>
    $(document).ready(function(){
      $('#add-cat').hide();
      $("#admin-acccount").hide();

      $("#add-category").click(function(){
        $("#admin-acccount").hide();
        $('#add-cat').show();
      });


    });
 
  </script> -->
</body>
</html>