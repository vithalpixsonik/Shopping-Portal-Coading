<?php
  include "../functions/connection.php";

if(isset($_POST['update']))
{
  
    $old=md5($_POST['old-password']);
   
    $new=md5($_POST['new-password']);
   

    $sql="select * from admin";
    if($result = mysqli_query($con, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $password=$row['password'];
              
               if($old==$password){
                    
                   $update="update admin SET password='$new'";
                   if($con->query($update) === TRUE){
                   echo "<script>alert('Password Updated Successfully');</script>";
                   header("Location: adminpanel.php");
                   }
                }
                else{
               
                }
            }
           
        }
    }

}
else{
    echo mysqli_error($con);
}

?>