<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maTuyen = $_POST['maTuyen'];
    $maCHKDen = $_POST['maCHKDen'];
    $maCHKDi = $_POST['maCHKDi'];
    $khoangCach = $_POST['khoangCach'];
    $loai = $_POST['loai'];
    $moTa = $_POST['moTa'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db-quanlivemaybay";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $targetDir = "../Image/";
    $targetFile = $targetDir . basename($_FILES["images"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["images"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["images"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["images"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["images"]["name"]) . " has been uploaded.";

            $sql = "INSERT INTO tuyenbay (MaTuyen, MaCHKDen, MaCHKDi, KhoangCach, Loai, Images, MoTa)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $maTuyen, $maCHKDen, $maCHKDi, $khoangCach, $loai, $targetFile, $moTa);

            if ($stmt->execute()) {
                echo "Thêm tuyến bay thành công";
            } else {
                echo "Lỗi: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}
?>