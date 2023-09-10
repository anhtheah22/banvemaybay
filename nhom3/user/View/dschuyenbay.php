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
    <title>Chuyến Bay</title>
    <!-- <link rel="stylesheet" href="../CSS/plane.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> -->

</head>
<style>
 body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        .container_chuyenbay {
            padding: 20px;
            max-width: 800px;
            margin: 0 30px 20px;
        }

        .header_chuyenbay {
            text-align: center;
            margin-bottom: 20px;
        }

        .header_chuyenbay1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .header_chuyenbay2 {
            font-size: 20px;
            color: #666;
        }

        .content_met {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            overflow: hidden;
            background-color: #fff;
        }

        table th,
        table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table td {
            color: #666;
            transition: background-color 0.3s ease;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #e9e9e9;
        }

        table tr:hover td {
            background-color: #ccc;
        }

        #btnNoiDia,
        #btnQuocTe {
            display: inline-block;
            padding: 10px 20px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        #btnNoiDia:hover,
        #btnQuocTe:hover {
            background-color: #555;
        }
    </style>
</style>
<body>
    <div class="container_chuyenbay">
        <div>
            <div class="header_chuyenbay">
                <span class="header_chuyenbay1">Vé Máy Bay Khách Đặt Mới Nhất</span> <br>
                <span class="header_chuyenbay2">Boomkeo Airline</span>
                <div>
                    <?php include('menuchuyenbay.php'); ?>
                </div>
            </div>
        </div>
        <div class="content_chuyenbay">
            <?php
            if (isset($_GET['pid'])) {
                $pid = intval($_GET['pid']);
                switch ($pid) {
                    case 7:
                        include('noidia.php');
                        break;
                    case 8:
                        include('quoc-te.php');
                        break;
                    case 9:
                        include ('chitietchuyenbay.php');
                        break;
                    default:
                        include('content_met.php');
                        break;
                }
            } else {
                include('content_met.php');
            }
            ?>
        </div>

    </div>
</body>

</html>