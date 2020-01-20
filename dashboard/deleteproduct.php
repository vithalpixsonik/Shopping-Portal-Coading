<?php
    include "../functions/connection.php";
    $delete_id=$_GET['id']; 
    echo $delete_id;
    $delete_query="DELETE FROM products WHERE id='". $delete_id."'";
                    $run=mysqli_query($con,$delete_query);  
                    if(!$run)  
                    {  
                        echo "error".mysqli_error($con);
                    }

                    $query = "select * from products";
                    $run_pro = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
                   while($row = $run_pro->fetch_assoc()) {
                      echo $id=$row['id'];
                      echo $delete_id;
                       $name=$row['name'];
                       if($id==$delete_id)
                       {
                        $dir = 'uploads/featured/'.$name.'';
                        unlink($dir);
                        $dir1 = 'uploads/image1/'.$name.'';
                        unlink($dir1);
                        $dir2 = 'uploads/image2/'.$name.'';
                        unlink($dir2);
                        $dir3 = 'uploads/image2/'.$name.'';
                        unlink($dir3);
                        header("location: admin1.php");
                       }
                   }
                   
?>