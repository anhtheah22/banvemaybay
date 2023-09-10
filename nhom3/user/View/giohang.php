<?php
session_start();

// Kiểm tra trạng thái đăng nhập
$isLoggedIn = false;
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    $isLoggedIn = true;
}

// Xử lý khi nút "Cập nhật số lượng" được nhấn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateQuantity'])) {
        // Code cập nhật số lượng
    }
}

// Xử lý khi nút "Thanh toán" được nhấn
if (isset($_POST['payment'])) {
    if ($isLoggedIn) {
        // Xóa các session và thông báo thanh toán thành công
        unset($_SESSION['cart']);
        echo "Thanh toán thành công!"; 
    } else {
        // Yêu cầu đăng nhập
        header("Location: login.php?redirect=giohang.php");
        exit();
    }
}

// Tính tổng đơn hàng và tổng tiền
$totalAmount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as &$item) {
        $item['tongTien'] = $item['soLuong'] * $item['giaDichVu'];
        $totalAmount += $item['tongTien'];
    }
    unset($item);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/giohang.css">
</head>
<body>
    <h1>Giỏ hàng</h1>
    <?php if (isset($_SESSION['cart'])) { ?>
        <form action="" method="POST">
            <table>
                <tr>
                    <th>Tên dịch vụ</th>
                    <th>Giá dịch vụ</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Xóa</th>
                </tr>
                <?php foreach ($_SESSION['cart'] as $key => $item) { ?>
                    <tr>
                        <td><?php echo $item['tenDichVu']; ?></td>
                        <td><?php echo $item['giaDichVu']; ?></td>
                        <td>
                            <input type="number" name="quantity[<?php echo $key; ?>]" min="1" value="<?php echo $item['soLuong']; ?>">
                        </td>
                        <td><?php echo $item['tongTien']; ?></td>
                        <td><a href="xoa_sanpham.php?maDichVu=<?php echo $item['maDichVu']; ?>">Xóa</a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3">Tổng đơn hàng</td>
                    <td><?php echo $totalAmount; ?></td>
                    <td></td>
                </tr>
            </table>
            <button type="submit" name="updateQuantity">Cập nhật số lượng</button>
        </form>
        <?php if ($isLoggedIn) { ?>
            <form action="" method="POST">
                <button type="submit" name="payment">Thanh toán</button>
            </form>
        <?php } else { ?>
            <p>Vui lòng <a href="login.php?redirect=giohang.php">đăng nhập</a> để tiến hành thanh toán.</p>
        <?php } ?>
        <a href="../index.php?pid=4">Trở về</a>
    <?php } else {
        echo "Không có sản phẩm trong giỏ hàng.";
    } ?>
</body>
</html>
