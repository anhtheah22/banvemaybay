<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem mã tuyến bay đã được truyền qua form hay chưa
    if (!isset($_POST["maTuyen"])) {
        echo "Không tìm thấy mã tuyến bay";
        exit;
    }

    $maTuyen = $_POST["maTuyen"];
    $maCHKDen = $_POST["maCHKDen"];
    $maCHKDi = $_POST["maCHKDi"];
    $khoangCach = $_POST["khoangCach"];
    $loai = $_POST["loai"];
    $moTa = $_POST["moTa"];
    $hinhAnh = $_FILES["hinhAnh"]["name"];

    // Kết nối tới cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db-quanlivemaybay";
    $conn = new mysqli($servername, $username, $password, $database);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Kiểm tra xem đã tải lên hình ảnh mới hay chưa
    if (isset($_FILES["hinhAnh"]) && $_FILES["hinhAnh"]["error"] == 0) {
        $fileInfo = $_FILES["hinhAnh"];
        $targetDir = "../Image/";
        $targetFile = $targetDir . basename($fileInfo["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra định dạng tệp hình ảnh
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Di chuyển tệp tin tải lên vào thư mục ảnh
            if (move_uploaded_file($fileInfo["tmp_name"], $targetFile)) {
                $hinhAnh = $fileInfo["name"];
            } else {
                echo "Lỗi khi tải lên hình ảnh";
                exit;
            }
        } else {
            echo "Chỉ cho phép tải lên các tệp tin hình ảnh JPG, JPEG, PNG và GIF";
            exit;
        }
    }

    // Cập nhật dữ liệu chuyến bay trong cơ sở dữ liệu
    $sql = "UPDATE tuyenbay SET MaCHKDen = ?, MaCHKDi = ?, KhoangCach = ?, Loai = ?, Images = ?, MoTa = ? WHERE MaTuyen = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $maCHKDen, $maCHKDi, $khoangCach, $loai, $hinhAnh, $moTa, $maTuyen);

    if ($stmt->execute()) {
        echo "Sửa thông tin chuyến bay thành công";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>
