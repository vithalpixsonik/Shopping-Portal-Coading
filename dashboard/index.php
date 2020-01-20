<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div id="main">
        <h3 id="admin-heading">Admin Login</h3>
        <div id="form" action=""> 
            <form id="myform" method="POST" action="index.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <input type="submit" name="login" value="Login" class="btn btn-danger">
            </form>
        </div>

        <?php
           include "../functions/connection.php";
            if(isset($_POST['login']))
            {
                $username=$_POST['username'];
                $pass=md5($_POST['password']);
                echo "<h5>Username</h5>".$username."<br><br>";
                echo "<h5>Password</h5>".$pass."<br><br>";
               echo "<br><br><br><br><br><br><br>". $sql="select * from admin where username='$username' AND password='$pass'";
                $run=mysqli_query($con,$sql);
                $count=mysqli_num_rows($run);
                echo $count;
                if($count==0)
                {
                    echo "<p>Invalid Username Or Password</p>";
                    exit();
                }

                if($count==1){
                    header("Location: admin1.php");

                }

                else{
                    mysqli_error($con);
                }
              
            }
            
            
            
            
           
        ?>

       
    </div>


</body>
</html>