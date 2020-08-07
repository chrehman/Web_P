<?php

session_start();
if($_SESSION["login"]===true){
    //function_alert("Already Login");
    echo "<script>
    alert('Already login ');
    window.location.href='../product/index1.php';
    </script>";

}

if($_SESSION["login"]==true){
  //  echo '<script> alert ("Already login")</script>';
    //header("Location: ../product/index1.php");
}
function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";

}
$emailErr=$passwordErr="";
$email=$password=$name=$cnpassword=$chekbox="";

$server="localhost";
$username="root";
$pass="root";
$dbname="demo";

$conn=mysqli_connect($server,$username,$pass,$dbname);

if($conn===false){//Creating Database if not exists
    $conn=mysqli_connect($server,$username,$pass);

    $sql="CREATE DATABASE demo";
    $result=mysqli_query($conn,$sql);

    if($result===true){
        $conn=mysqli_connect($server,$username,$pass,$dbname);
    }else {
        die("ERROR:Could not connect. ".mysqli_connect_error());
    }
}
//Creating Table if not Exists////
$sql="CREATE TABLE IF NOT EXISTS demo.user (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255)NOT NULL UNIQUE

    )";

mysqli_query($conn,$sql);

if($_SERVER['REQUEST_METHOD']=='POST'){
    ////email checking/////////
    if(empty($_POST['email'])){
        $emailErr="Please enter email";
    } else {
        $email=test_input($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr="Invalid email format";
        }


    }
    if(empty($_POST['pass'])){
        $passwordErr="Please enter your password";
    }else {
        $password=test_input($_POST['pass']);
        if(isset($_POST['signin'])){
            $sql="SELECT * FROM user WHERE email='$email'";
            $result=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);
            if($count>0){
                $sql="SELECT * FROM user WHERE email='$email'AND password='$password'";
                $result=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($result);
                if($count>0){
                    $password='';

                    $_SESSION["email"]=$email;
                    $_SESSION["name"]=$result;
                    $_SESSION["login"]=true;


                    header("Location: ../product/index1.php");
                } else{
                    $passwordErr="Wrong Password";
                }
            }else{
                $emailErr="Email does not exist";
            }
         }


    }
}

function test_input($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    $data=stripslashes($data);
    return $data;

}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/error.css">
</head>
<body>
<div class="lll">
    <h1 class="heading">Hidayah Portal login</h1>
    <img class="hidayah" src="../hidayah.jpg" alt="Hidayah-portal-img" width="40px" height="35px">
</div>
    <div class="main">


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/pic5.jpg"  height ="500px"alt="sing up image"></figure>
                        <a href="SignUp.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="<?php echo $email?>"/><span class="error"><?php echo $emailErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password"/><span class="error"><?php echo $passwordErr;?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
