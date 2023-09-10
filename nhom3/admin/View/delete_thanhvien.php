<?php
if (!isset($_GET['MaKhachHang'])) {
    echo "Không tìm thấy mã khách hàng";
    exit;
}

$maKhachHang = $_GET['MaKhachHang'];

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

// Xóa hành khách từ cơ sở dữ liệu
$sql = "DELETE FROM tb_user WHERE MaKhachHang = '$maKhachHang'";

if ($conn->query($sql) === TRUE) {
    echo "Xóa hành khách thành công";
} else {
    echo "Lỗi: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
