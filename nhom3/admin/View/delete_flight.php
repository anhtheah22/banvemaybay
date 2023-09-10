<?php
// Kiểm tra xem mã tuyến bay đã được truyền qua query string hay chưa
if (!isset($_GET['maTuyen'])) {
    echo "Không tìm thấy mã tuyến bay";
    exit;
}

$maTuyen = $_GET['maTuyen'];

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

// Xử lý logic xóa chuyến bay
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xóa chuyến bay khỏi cơ sở dữ liệu
    $sql = "DELETE FROM tuyenbay WHERE MaTuyen = '$maTuyen'";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa chuyến bay thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
<style>
    h2 {
        font-size: 30px;
        margin-bottom: 20px;
    }

    p {
        font-size: 20px;
        margin-bottom: 20px;
    }

    form {
        display: inline-block;
    }

    button[type="submit"] {
        font-size: 20px;
        padding: 12px 24px;
        background-color: #dc3545;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #c82333;
    }
</style>

<h2>Xóa chuyến bay</h2>
<p>Bạn có chắc chắn muốn xóa chuyến bay có mã <?php echo $maTuyen; ?>?</p>
<form action="" method="POST">
    <input type="hidden" name="maTuyen" value="<?php echo $maTuyen; ?>">
    <button type="submit">Xóa</button>
</form>
