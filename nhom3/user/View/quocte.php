<?php
require_once("control/ctrl_frm.php");
$ctrl = new ctrl_frm();
$kq = $ctrl->get_quocte();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quốc Tế</title>
    <style>
        /* CSS cho header */
        h1 {
            color: black;
            font-size: 20px;
        }

        .header_chuyenbay {
            position: relative;
            height: 600px;
            background-color: #f2f2f2;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header_content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -170%);
            text-align: center;
            color: #fff;
        }

        .header_content h1 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .header_content p {
            font-size: 18px;
            color: #888;
        }



        .slideshow-container {
            position: relative;
            width: 100%;
            height: 600px;
            /* Điều chỉnh chiều cao tùy ý */
            /* overflow: hidden; */
        }

        .slideshow-image {
            position: absolute;
            top: 50%;
            left: 40%;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .slideshow-image.active {
            opacity: 1;
        }




        .options-search {
            padding: 20px;
            background-color: #fff;
            text-align: center;
        }

        .options-search h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .options-search p {
            font-size: 16px;
            color: #888;
        }

        .options-search input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
        }

        .options-search button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .options-search button:hover {
            background-color: #555;
        }


        .video-container {
            width: 500px;
            height: 300px;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            /* Bo viền khung video */
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            /* Đổ bóng cho khung video */
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

        .chuyenbay-container {
            display: flex;
            flex-wrap: wrap;
            /* gap: 1em; */

        }

        .chuyenbay-item {
            width: 50%;
            padding: 10px;
            box-sizing: border-box;
        }

        .image {
            text-align: center;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
        }

        .description {
            margin-top: 10px;
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
            margin-right: 30px;
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

        /* CSS cho animation */
        canvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>

<body>
    <canvas id="backgroundCanvas"></canvas>

    <div class="header_chuyenbay">
        <div class="header_content">
            <h1>Trang Quốc Tế</h1>
            <p>Chào mừng đến với trang quốc tế của chúng tôi</p>
        </div>
        <div class="slideshow-container">
            <img class="slideshow-image" style="transform: scale(3.7)" src="Image/v1_110.png" alt="Slideshow Image">
            <img class="slideshow-image" style="transform: scale(3.7)" src="Image/v1_111.png" alt="Slideshow Image">
            <img class="slideshow-image" style="transform: scale(3.7)" src="Image/v1_122.png" alt="Slideshow Image">
            <!-- Thêm các hình ảnh khác vào đây -->
        </div>
        <div class="video-container">

            <video src="Image/Green Elegant Nature Youtube Intro.mp4" autoplay loop></video>

        </div>
    </div>




    <div class="chuyenbay-container">
        <?php while ($row = $kq->fetch_assoc()) { ?>
            <div class="chuyenbay-item">
                <div class="image">
                <a href="index.php?pid=9&MaTuyen=<?php echo $row["MaTuyen"]; ?>"> <img src="Image/<?php echo $row["Images"]; ?>" alt="Chuyến bay">
                </a>
                </div>
                <div class="info">
                    <h2 class="title">
                        <?php echo $row["MaTuyen"]; ?>
                    </h2>
                    <p class="description">
                        <?php echo $row["MaCHKDen"]; ?> -
                        <?php echo $row["MaCHKDi"]; ?>
                    </p>
                    <p class="description">Khoảng Cách:
                        <?php echo $row["KhoangCach"]; ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var slideshowImages = document.querySelectorAll(".slideshow-image");
            var currentImageIndex = 0;

            setInterval(function () {
                slideshowImages[currentImageIndex].style.opacity = "0";
                currentImageIndex = (currentImageIndex + 1) % slideshowImages.length;
                slideshowImages[currentImageIndex].style.opacity = "1";
            }, 5000);
        });

    </script>
</body>

</html>