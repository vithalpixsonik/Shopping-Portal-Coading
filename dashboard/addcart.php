<?php
    include "../functions/connection.php";
    include "../functions/getip.php";
    session_start();
    if(isset($_SESSION['email']))
    {
    $ip=getIp();
    $p_id=$_GET['lbl'];
    $quan=$_GET['qty'];
    $email=$_SESSION['email'];
    $get_prod = "select * from products where id='$p_id'";
    $run_pro = mysqli_query($con, $get_prod); 
    while($row=mysqli_fetch_array($run_pro)){ 
        $image_name=$row['featured_image'];
        $name=$row['name'];
        $price=$row['discount_price'];
        $total=$quan*$price;
        echo  $sql="insert into cart (p_id, email,image_name,product_name,price,quantity,total)
        VALUES ('$p_id', '$email', '$image_name','$name','$price','$quan','$total')";                 
        if ($con->query($sql) === TRUE) {
               
                header("Location: ../cart.php");

        }
        else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }



    }
}
else{
    header("Location: ../register.php?msg=login");
}
    
?>