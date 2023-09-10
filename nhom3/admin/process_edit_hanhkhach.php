<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem username đã được truyền qua form hay chưa
    if (!isset($_POST["username"])) {
        echo "Không tìm thấy username";
        exit;
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $hoten = $_POST["hoten"];

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

    // Cập nhật dữ liệu hành khách trong cơ sở dữ liệu
    $sql = "UPDATE tb_user SET password = '$password', name = '$hoten' WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin hành khách thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
