<?php
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    // Nếu không có phiên đăng nhập, chuyển hướng người dùng về trang đăng nhập
    header("Location: ../index.php?pid=11");
    exit();
}

// Kiểm tra xem có thông tin đơn hàng được lưu trong session hay không
if (!isset($_SESSION['order_id'])) {
    // Nếu không có thông tin đơn hàng, chuyển hướng người dùng về trang chủ hoặc trang danh sách đơn hàng
    header("Location: ../index.php"); // hoặc order_list.php
    exit();
}

// Lấy thông tin chi tiết đơn hàng từ cơ sở dữ liệu dựa trên order_id
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db-quanlivemaybay";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$orderID = $_SESSION['order_id'];

// Truy vấn thông tin chi tiết đơn hàng
$query = "SELECT * FROM chitietdonhang WHERE MaDon = '$orderID'";
$result = mysqli_query($conn, $query);

// Kiểm tra số lượng bản ghi trả về
if (mysqli_num_rows($result) > 0) {
    $orderDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Nếu không tìm thấy thông tin chi tiết đơn hàng, chuyển hướng người dùng về trang chủ hoặc trang danh sách đơn hàng
    header("Location: index.php"); // hoặc order_list.php
    exit();
}

// Đóng kết nối
mysqli_close($conn);

// Xóa thông tin đơn hàng khỏi session
unset($_SESSION['order_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h1>Xác nhận đơn hàng</h1>

    <h2>Đơn hàng của bạn (Mã đơn hàng: <?php echo $orderID; ?>)</h2>
    <?php foreach ($orderDetails as $orderDetail) { ?>
        <div>
            <h3><?php echo $orderDetail['TenDichVu']; ?></h3>
            <p>Giá: <?php echo $orderDetail['Gia']; ?> VND</p>
            <p>Số lượng: <?php echo $orderDetail['SoLuong']; ?></p>
        </div>
    <?php } ?>

    <p>Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đã được ghi nhận.</p>

    <p><a href="index.php">Quay lại trang chủ</a></p>
</body>
</html>
