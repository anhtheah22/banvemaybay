<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="CSS/index.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="main.js"></script> -->
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">
            <?php include('View/icon.php'); ?>
        </div>
        <div class="navbar-menu">
            <?php include('View/btn-admin-trangchu.php'); ?>
        </div>
        <div class="navbar-menu">
            <?php
            if (isset($_SESSION['username'])) {
                echo $_SESSION['hoten']; ?>
                <a href="View/logout.php">Đăng xuất</a>
            <?php } else
                include('View/khoatrang_dangxuat.php');
            ?>
        </div>
    </div>
    </div>


    <div class="metmoiquanetroioi">
        <!-- <div id="wrapper"> -->
        <div id="menu">
            <?php include('View/menu.php'); ?>
            <!-- </div> -->
        </div>

        <!-- cái này là khung của cả bài  -->
        <div class="frame">
            <?php
            if (isset($_GET['pid'])) {
                $pid = intval($_GET['pid']);
                switch ($pid) {
                    case 1:
                        // include('View/content-left.php');
                        include('View/sanbay.php');
                        break;
                    case 2:
                        // include('View/content-left.php');
                        include('View/tuyenbay.php');
                        break;
                    case 3:
                        // include('View/content-left.php');
                        include('View/chuyenbay.php');
                        break;
                    case 4:
                        // include('View/content-left.php');
                        include('View/thanhvien.php');
                        break;
                    case 5:
                        // include('View/content-left.php');
                        include('View/thongke.php');
                        break;
                    case 6:
                        // include('View/content-left.php');
                        include('View/addchk.php');
                        break;
                    case 7:
                        // include('View/content-left.php');
                        include('View/addtuyenbay.php');
                        break;
                    case 8:
                        include('View/edit_canghangkhong.php');
                        break;
                    case 9:
                        include('View/delete_canghangkhong.php');
                        break;
                    case 10:
                        include('View/delete_flight.php');
                        break;
                    case 11:
                        include('View/edit_flight.php');
                        break;
                    case 12:
                        include('View/edit_chuyenbay.php');
                        break;
                    case 13:
                        include('View/delete_chuyenbay.php');
                        break;
                    case 14:
                        include('View/add_chuyenbay.php');
                        break;
                    case 15:
                        include('View/edit_thanhvien.php');
                        break;
                    case 16:
                        include('View/delete_thanhvien.php');
                        break;
                    case 17:
                        include('View/add_thanhvien.php');
                        break;
                    case 18:
                        include('View/login.php');
                        break;
                    case 19:
                        include('View/process_add_chuyenbay.php');
                        break;
                    case 20:
                        include('View/process_edit_chuyenbay.php');
                        break;
                    case 21:
                        include('View/process_add_tuyenbay.php');
                        break;
                    case 22:
                        include('View/process_edit_tuyenbay.php');
                        break;
                    case 23:
                        include('View/update_canghangkhong.php');
                        break;
                    case 24:
                        include('View/process_edit_hanhkhach.php');
                        break;
                    case 25:
                        include('View/process_add_hanhkhach.php');
                        break;

                    default:
                        include('View/frame.php');
                        break;
                }
            } else {
                include('View/frame.php');
            }
            ?>
        </div>
    </div>
</body>

</html>