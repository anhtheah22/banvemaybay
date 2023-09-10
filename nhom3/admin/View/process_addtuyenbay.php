<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "db-quanlivemaybay";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$ma_tuyen = $_POST['ma_tuyen'];
$ma_cang_hang_duong = $_POST['ma_cang_hang_duong'];
$ma_cang_hang_den = $_POST['ma_cang_hang_den'];
$khoang_cach = $_POST['khoang_cach'];
$loai_hinh_bay = $_POST['loai_hinh_bay'];
$mo_ta = $_POST['mo_ta'];

// Xử lý tệp hình ảnh
$targetDir = "../Image\\"; 
$targetFile = $targetDir . basename($_FILES["hinh_anh"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Kiểm tra xem tệp hình ảnh có phải là hình ảnh thực sự hay không
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["hinh_anh"]["tmp_name"]);
    if ($check !== false) {
        echo "Tệp là hình ảnh - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Tệp không phải là hình ảnh.";
        $uploadOk = 0;
    }
}

// Kiểm tra xem tệp đã tồn tại hay chưa
if (file_exists($targetFile)) {
    echo "Xin lỗi, tệp đã tồn tại.";
    $uploadOk = 0;
}

// // Kiểm tra kích thước tệp hình ảnh
// if ($_FILES["hinh_anh"]["size"] > 500000) {
//     echo "Xin lỗi, tệp quá lớn.";
//     $uploadOk = 0;
// }

// Cho phép chỉ những định dạng hình ảnh cụ thể (ở đây giả sử chỉ cho phép JPG, JPEG, PNG)
// if (
//     $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"
// ) {
//     echo "Xin lỗi, chỉ cho phép tệp JPG, JPEG, PNG.";
//     $uploadOk = 0;
// }

// Kiểm tra nếu $uploadOk = 0, có lỗi xảy ra, không tải lên tệp
if ($uploadOk == 0) {
    echo "Xin lỗi, tệp của bạn không được tải lên.";

// Nếu mọi thứ đều ổn, thực hiện tải lên tệp
} else {
    if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $targetFile)) {
        echo "Tệp " . basename($_FILES["hinh_anh"]["name"]) . " đã được tải lên thành công.";

        // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
        $hinh_anh = $targetFile;
        $sql = "INSERT INTO tuyenbay (MaTuyen, MaCHKDen, MaCHKDi, KhoangCach, Loai, MoTa, Images)
                VALUES ('$ma_tuyen', '$ma_cang_hang_duong', '$ma_cang_hang_den', '$khoang_cach', '$loai_hinh_bay', '$mo_ta', '$hinh_anh')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm danh sách tuyến bay thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Xin lỗi, đã xảy ra lỗi khi tải lên tệp.";
    }
}

$conn->close();
header("Location: ../index.php?pid=2");
exit();
?>
