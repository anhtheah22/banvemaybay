<?php
require_once("control/ctrl_frm.php");
$ctrl = new ctrl_frm();
$kq = $ctrl->get_chitietchuyenbay();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Chuyến Bay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS cho header */
        .header_chuyenbay {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        .header_chuyenbay h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .header_chuyenbay img {
            width: 100px;
            height: 100px;
        }

        /* CSS cho danh sách chuyến bay */
        .chuyenbay-container {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chuyenbay-item {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chuyenbay-item .image {
            flex: 0 0 100px;
            margin-right: 20px;
        }

        .chuyenbay-item .image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .chuyenbay-item .info {
            flex: 1;
        }

        .chuyenbay-item .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .chuyenbay-item .description {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div?>
        <div class="header_chuyenbay">
            <h1>Chi Tiết Chuyến Bay</h1>
            <!-- <img src="path/to/your/image.jpg" alt="Logo"> -->
        </div>
        <div class="container-fluid chuyenbay-container">
            <div class="row">
                <?php 
                    require_once "control/ctrl_frm.php";
                    $kq = new ctrl_frm();
                    $row = $kq->get_dschuyenbay();
                    foreach($row as $g){
                        if($g['MaTuyen'] == $_GET['MaTuyen']){
                            echo '
                            <div class="col-md-6">
                        <div class="chuyenbay-item">
                            <div class="image">
                           <img src="Image/'.$g['Images'].'" alt="Chuyến bay">
                
                            </div>
                            <div class="info">
                            <h2 class="title">
                            '.$g["MaTuyen"].'
                            </h2>
                           '.$g["MoTa"].'
                            </div>
                        </div>
                    </div>
                            ';
                        }
                    }
                    ?>
                    
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>