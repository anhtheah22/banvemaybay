<?php 
    include('control/kiemtra_login.php');
    if (!isset($_SESSION["username"]))
        include('loginweb.php');
    else 
        //include('./index.php');
        header("location:index.php");
?>