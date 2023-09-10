<?php
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    // Nếu không có phiên đăng nhập, chuyển hướng người dùng về trang đăng nhập
    header("Location: ../index.php?pid=11");
    exit();
} else {
    echo "<script language='javascript'> location.href='checkout.php';</script>";
}

// Kiểm tra giỏ hàng
if (empty($_SESSION['cart'])) {
    // Nếu giỏ hàng trống, chuyển hướng người dùng về trang dichvu.php
    header("Location: dichvu.php");
    exit();
}

// Xử lý thanh toán
if (isset($_POST['payment'])) {
    // Thực hiện xử lý thanh toán ở đây

    // Lưu đơn hàng và chi tiết đơn hàng vào cơ sở dữ liệu
    saveOrderToDatabase();

    // Xóa giỏ hàng sau khi thanh toán thành công
    unset($_SESSION['cart']);

    // Chuyển hướng người dùng đến trang xác nhận đơn hàng hoặc trang thành công thanh toán
    header("Location: order_confirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        /* CSS nội tuyến */
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .order-item {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        .order-item h3 {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        .order-item p {
            margin: 0;
            font-size: 14px;
            color: #777;
        }

        .total-amount {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .payment-form {
            margin-top: 20px;
        }

        .payment-form button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .payment-form button:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #777;
            text-decoration: none;
        }

        .back-link:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Thanh toán</h1>

    <h2>Đơn hàng của bạn</h2>
    <?php foreach ($_SESSION['cart'] as $maDichVu => $item) { ?>
        <div>
            <h3><?php echo $item['tenDichVu']; ?></h3>
            <p>Giá: <?php echo $item['giaDichVu']; ?> VND</p>
            <p>Số lượng: <?php echo $item['soLuong']; ?></p>
        </div>
    <?php } ?>

    <h2>Tổng số tiền: <?php echo calculateTotal(); ?> VND</h2>

    <form action="checkout.php" method="POST">
        <button type="submit" name="payment">Thanh toán</button>
    </form>

    <p><a href="cart.php">Quay lại giỏ hàng</a></p>
</body>
</html>

<?php
// Tính tổng số tiền của giỏ hàng
function calculateTotal()
{
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['giaDichVu'] * $item['soLuong'];
        }
    }
    return $total;
}

// Lưu đơn hàng và chi tiết đơn hàng vào cơ sở dữ liệu
function saveOrderToDatabase()
{
    // Thực hiện kết nối cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db-quanlivemaybay";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Lấy thông tin đơn hàng từ session
    $cart = $_SESSION['cart'];
    $totalAmount = calculateTotal();

    // Lưu thông tin đơn hàng vào bảng "donhang"
    $customerId = $_SESSION['customer_id']; // Chỉnh sửa tên trường tương ứng trong session
    $orderDate = date("Y-m-d");
    $status = "Chưa xử lý";

    $orderQuery = "INSERT INTO donhang (MaKhachHang, NgayDat, TongTien, TrangThai) VALUES ('$customerId', '$orderDate', '$totalAmount', '$status')";
    mysqli_query($conn, $orderQuery);

    // Lấy mã đơn hàng vừa được tạo
    $orderId = mysqli_insert_id($conn);

    // Lưu thông tin chi tiết đơn hàng vào bảng "chitietdonhang"
    foreach ($cart as $maDichVu => $item) {
        $tenDichVu = $item['tenDichVu'];
        $gia = $item['giaDichVu'];
        $soLuong = $item['soLuong'];

        $detailQuery = "INSERT INTO chitietdonhang (MaDon, TenDichVu, Gia, SoLuong) VALUES ('$orderId', '$tenDichVu', '$gia', '$soLuong')";
        mysqli_query($conn, $detailQuery);
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>
