<?php
include "../functions/connection.php";
include "../functions/getip.php";
session_start();
if(isset($_SESSION['email']))
{
$ip=getIp();
$email=$_SESSION['email'];
$id=$_GET['id'];

$sql="insert into wishlist (ip, email, product_id)
        VALUES ('$ip', '$email', '$id')";
        
            if ($con->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Location: ../index.php#prod-line1");
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }

        }
        else{
            header("Location: ../register.php?msg=login");
        }
?>