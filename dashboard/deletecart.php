<?php
     include "../functions/connection.php";
     include "../functions/getip.php";
     session_start();
     if(isset($_SESSION['email'])){
     $ip=getIp();
     $p_id=$_GET['id'];
    echo $p_id;
    $delete_query="delete from cart WHERE p_id='". $p_id."'";
				$run=mysqli_query($con,$delete_query);  
				if($run)  
				{  
					header("Location: ../cart.php");
                }
                else{
                    echo "error".mysqli_error($con);
                }
				
    }
?>