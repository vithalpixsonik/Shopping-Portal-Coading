<?php
echo "Hello";
include "../functions/connection.php";
include "../functions/getip.php";
session_start();
if(isset($_SESSION['email'])){
$ip=getIp();
echo $p_id=$_GET['id'];
echo $p_id;
$delete_query="delete from wishlist WHERE product_id='". $p_id."'";
           $run=mysqli_query($con,$delete_query);  
           if($run)  
           {  
               header("Location: ../wishlist.php");
           }
           else{
               echo "error".mysqli_error($con);
           }
           
}
?>