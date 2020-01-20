<?php
include "../functions/connection.php";
if(isset($_POST['add-cat']))
    {
        $username_err="";
        $cat_name=$_POST['cat_name'];
        echo $cat_name;
        $parent_cat=$_POST['parent_category'];
        echo $parent_cat;
        $category_type=$_POST['category_type'];
        echo $category_type;
        $category_heading=$_POST['category_heading'];
        echo $category_heading;
        
        $sql1="insert into categories (name, parent_category, category_type,category_heading)
        VALUES ('$cat_name', '$parent_cat', '$category_type','$category_heading')";
        
            if ($con->query($sql1) === TRUE) {
                echo "New record created successfully";
                header("Location: admin1.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }

?>
