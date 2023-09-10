<?php
require_once("control/ctrl_frm.php");
$ctrl = new ctrl_frm();
$kq = $ctrl->get_canghangkhong();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
</head>

<body>
    <div class="container">
        <h1>Danh Sách Thông Tin Sân Bay</h1>
        <a href="index.php?pid=6"><button class="btn-edit">Thêm thông tin Sân Bay bay</button></a>
    </div>
    <div>
    <?php
            if (isset($_GET['pid'])) {
                $pid = intval($_GET['pid']);
                switch ($pid) {
                    case 6:
                        include('addchk.php');
                        break;
                    default:
                        include('table-container.php');
                        break;
                }
            } else {
                include('table-container.php');
            }
            ?>
    </div>

</body>

</html>
