<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/header.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="header">
                <?php include('View/logo.php'); ?>
            </div>
            <div class="container_nav">
                <?php include('View/menu.php'); ?>
            </div>

            <div class="button-login">
            <?php
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username']; ?>
                    <a href="View/logout.php">Đăng xuất</a>
                <?php } else
                    include('View/button-login1.php');
                ?>
                <a href="signup">Đăng ký</a>
            </div>

            <div class="button-cart">
                <a href="View/cart.php">Giỏ hàng</a>
            </div>
        </div>

        <div class="content">
            <?php
            if (isset($_GET['pid'])) {
                $pid = intval($_GET['pid']);
                switch ($pid) {
                    case 1:
                        include('View/menudatve.php');
                        break;
                    case 2:
                        include('View/gioithieu.php');
                        break;
                    case 3:
                        include('View/tintuc.php');
                        break;
                    case 4:
                        include('View/dichvu.php');
                        break;
                    case 5:
                        include('View/dschuyenbay.php');
                        break;
                    case 7:
                        include('View/noidia.php');
                        break;
                    case 8:
                        include('View/quocte.php');
                        break;
                    case 9:
                        include('View/chitietchuyenbay.php');
                        break;
                    case 10:
                        include('View/kqtimkiem.php');
                        break;
                    case 11:
                        include('View/login.php');
                        break;
                    case 15:
                        include('View/xuly_datve.php');
                        break;
                    case 16:
                        include('View/confirm_booking.php');
                        break;
                    case 17:
                        include('View/process_booking.php');
                        break;
                    case 18:
                        include('View/cart.php');
                        break;
                    case 30:
                        include('View/checkout.php');
                        break;
                    default:
                        include('View/content-left.php');
                        include('View/content-right.php');
                        break;
                }
            } else {
                include('View/content-left.php');
                include('View/content-right.php');
            }
            ?>
        </div>
    </div>
</body>

</html>
