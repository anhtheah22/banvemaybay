<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES('','$fullname','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration Successful'); </script>";
        } else {
            echo
            "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="scss/style.css" />
    <link rel="stylesheet" href="scss/style.scss" />
    <title>Registration</title>
</head>

<body>
    <div class="video-container">
        <video autoplay muted loop id="myVideo">
            <source src="./video/bg.mp4" type="video/mp4">
        </video>
    </div>
    <div class="form-container">
        <h2 class="title-header">
            <center>ĐĂNG KÝ THÀNH VIÊN</center>
        </h2>
        <form class="" action="" method="post">
            <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Fullname" required value="">
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter a username" required value="">
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required value="">
            <div class="input-group password-form ">
                <input type="password" name="password" id="password" class="form-control" placeholder="Create a password" required value="">
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Comfirm a password" required value="">
            </div>
            <button class="btn_submit" type="submit" name="submit">Register</button>
        </form>
        <div class="another_choice">
            <p>Do you already have an account?</p>
            <a href="login.php">Login</a>
        </div>

    </div>
   
</body>

</html>