<?php
require_once("control/ctrl_frm.php");
$ctrl = new ctrl_frm();
$kq = $ctrl->get_dschuyenbay();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sân bay</title>
    <link rel="stylesheet" href="CSS/chuyenbay.css">
</head>

<body>
    <div class="container">
        <h1>Danh sách thông tin tuyến bay</h1>
        <!-- <a href="index.php?pid=7">  -->
        <button class="btn-edit" onClick="location.href= 'index.php?pid=7';">Thêm thông tin tuyến bay</button> </a>

        <div>
        <?php
            if (isset($_GET['pid'])) {
                $pid = intval($_GET['pid']);
                switch ($pid) {
                    case 7:
                        include('addtuyenbay.php');
                        break;
                    default:
                        include('table-container2.php');
                        break;
                }
            } else {
                include('table-container2.php');
            }
            ?>
    </div>
        </div>
    </div>

</body>

</html>
