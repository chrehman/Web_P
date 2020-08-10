<?php
session_start();
$server="localhost";
$username="root";
$pass="";
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


$emailErr=$passwordErr=$nameErr=$cnpasswordErr=$chekboxErr=$signupErr="";
$email=$password=$name=$cnpassword=$chekbox=$signup="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    ///username checking/////////////
    if(empty($_POST['name'])){
        $nameErr="Username must be required";
    } else {
        $name=test_input($_POST['name']);
        if(!(preg_match("/^([a-zA-Z' ]+)$/",$name))){
            $nameErr="Only letters and white spaces are allowed";


        }



    }

    ////email checking/////////
    if(empty($_POST['email'])){
        $emailErr="email must be required";
    } else {
        $email=test_input($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr="Invalid email format";

        }
        else{
            $sql="SELECT * FROM user WHERE email='$email'";
            $result=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);
            if($count>0){
                $emailErr="Email alreday exists";
            }
        }
    }
    ///Password checking//////////
    if(empty($_POST['pass'])){
        $passwordErr="Please enter password";
    } elseif(strlen($_POST['pass'])<6){
        $passwordErr="Password must atleast 6 characters." ;
    }
     else {
        $password=test_input($_POST['pass']);

        }

    if(empty($_POST['re_pass'])){
        $cnpasswordErr="Please enter password";
    } else {
        $cnpassword=test_input($_POST['re_pass']);
        if($password!=$cnpassword){
            $cnpasswordErr="Password did not match";
        }

    }
    //cheking checkbox///

    if(!isset($_POST['check'])){
        $chekboxErr="Please tick the checkbox";
    }
    else{
        if(isset($_POST['signup']) ){
          // if(empty($nameErr) && empty($emailErr) && empty($password)&& empty($cnpasswordErr)){
            if(!empty($password)){
                $sql="INSERT INTO user (name,email,password)
                VALUES('$name','$email','$password')";



                if($result=mysqli_query($conn,$sql)){
                    echo '<script> alert("Register Succesfully")</script>';
                    $signup="Register Succesfully";

                     //header("Location: ./SignIn.php");
                } else {
                    echo "ERROR : $sql ".mysqli_error($conn);
                 }
            } else {
                $passwordErr="Please Enter password ";
            }



            mysqli_close($conn);

           //}

        }


    }





}

function test_input($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    $data=stripslashes($data);
    return $data;

}










?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="./fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/error.css">

</head>
<body>
  <div class="lll">
    <h1 class="heading">Hidayah Portal Registration</h1>
    <img class="hidayah" src="../hidayah.jpg" alt="Hidayah-portal-img" width="40px" height="35px">

</div>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" >
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php echo $name ?>"/> <span class="error"><?php echo $nameErr; ?></span>
                             </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="<?php echo $email?>"/><span class="error"> <?php echo $emailErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/><span class="error"> <?php echo $passwordErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/><span class="error"><?php echo $cnpasswordErr; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="check" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label><span class="error">     <?php echo $chekboxErr; ?></span>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/><span class="reg"> <?php echo $signup?></span>
                            </div>

                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/pic1.jpg" alt="sing up image"></figure>
                        <a href="./SignIn.php" class="signup-image-link">I am already member</a>
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
