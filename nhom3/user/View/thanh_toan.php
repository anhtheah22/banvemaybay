<?php
session_start();
include("../control/ctrl_frm.php");
$ctrl = new ctrl_frm();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    // Nếu không có phiên đăng nhập, chuyển hướng người dùng về trang đăng nhập
    header("Location: ../index.php?pid=11");
    exit();
}

// Kiểm tra xem đã có thông tin giỏ hàng hay chưa
if (!isset($_SESSION['maVe']) || !isset($_SESSION['dichVu'])) {
    // Không có thông tin giỏ hàng, chuyển hướng về trang giỏ hàng
    header("Location: View/cart.php");
    exit;
}

// Lấy thông tin người dùng từ cơ sở dữ liệu (thay thế phần này bằng mã lấy thông tin người dùng từ cơ sở dữ liệu của bạn)
$tb_user = $_SESSION['username'];
$tb_user = getUserInfo($tb_user); // Hàm lấy thông tin người dùng từ cơ sở dữ liệu

// Kiểm tra xem có dữ liệu người dùng hay không
if (!$_SESSION['username']) {
    echo "Không tìm thấy thông tin người dùng!";
    exit;
}

// Kiểm tra xem người dùng đã xác nhận thông tin hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    // Lưu đơn hàng vào cơ sở dữ liệu (thay thế phần này bằng mã lưu đơn hàng vào cơ sở dữ liệu của bạn)
    $maVe = $_SESSION['maVe'];
    $dichVu = $_SESSION['dichVu'];

    // Thực hiện lưu đơn hàng vào cơ sở dữ liệu
    saveOrder($maVe, $dichVu); // Hàm lưu đơn hàng vào cơ sở dữ liệu

    // Xóa thông tin giỏ hàng sau khi đã thanh toán
    unset($_SESSION['maVe']);
    unset($_SESSION['dichVu']);

    // Chuyển hướng về trang "Vé đã đặt"
    header("Location: ve_da_dat.php");
    exit;
}

// Hàm lấy thông tin người dùng từ cơ sở dữ liệu
function getUserInfo($user_id) {
    // Thay thế phần này bằng mã lấy thông tin người dùng từ cơ sở dữ liệu của bạn
    // Ví dụ:
    $dsn = "mysql:host=localhost;dbname=db-quanlivemaybay";
    $username = "root";
    $password = "";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $database = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        exit;
    }

    $query = "SELECT * FROM tb_user WHERE MaKhachHang = :MaKhachHang";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':MaKhachHang', $user_id);
    $stmt->execute();
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $userInfo;
}

// Hàm lưu đơn hàng vào cơ sở dữ liệu
function saveOrder($maVe, $dichVu) {
    // Thay thế phần này bằng mã lưu đơn hàng vào cơ sở dữ liệu của bạn

    // Ví dụ:
    $dsn = "mysql:host=localhost;dbname=db-quanlivemaybay";
    $username = "root";
    $password = "";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $database = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        exit;
    }

    // Lưu thông tin đơn hàng vào bảng "orders" (đây chỉ là một ví dụ, bạn cần điều chỉnh tùy theo cấu trúc của cơ sở dữ liệu của bạn)
    $query = "INSERT INTO orders (MaVe, MaDichVu) VALUES (:MaVe, :MaDichVu)";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':MaVe', $maVe);
    $stmt->bindParam(':MaDichVu', json_encode($dichVu));
    $stmt->execute();

    $database = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #555;
        }

        .item {
            margin-bottom: 10px;
        }

        .item label {
            font-weight: bold;
            color: #333;
        }

        .confirm-form {
            margin-top: 20px;
            text-align: center;
        }

        .confirm-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .confirm-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .btn-back {
            margin-top: 20px;
            text-align: center;
        }

        .btn-back a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-back a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Thanh toán</h1>

        <!-- Thông tin người dùng -->
        <div id="user-info">
            <h2>Thông tin người dùng</h2>
            <div class="item">
                <label>Tên người dùng:</label>
                <span><?php echo $_SESSION['username']; ?></span>
            </div> 
        </div>

        <!-- Thông tin vé -->
        <div id="ve">
            <h2>Thông tin vé</h2>
            <div class="item">
                <label>Mã vé:</label>
                <span><?php echo $_SESSION['maVe']; ?></span>
            </div>
            <!-- Hiển thị thông tin vé khác (nếu có) -->
        </div>

        <!-- Danh sách dịch vụ đã chọn -->
        <div id="dichvu">
            <h2>Dịch vụ đã chọn</h2>
            <?php foreach ($_SESSION['dichVu'] as $dichVu) { ?>
                <div class="item">
                    <label>Tên dịch vụ:</label>
                    <span><?php echo $dichVu['tenDichVu']; ?></span>
                </div>
                <!-- Hiển thị thông tin dịch vụ khác (nếu có) -->
            <?php } ?>
        </div>

        <!-- Form xác nhận -->
        <div class="confirm-form">
            <form action="" method="post">
                <input type="submit" name="confirm" value="Xác nhận thanh toán">
            </form>
        </div>

        <!-- Nút quay lại -->
        <div class="btn-back">
            <a href="cart.php">Quay lại giỏ hàng</a>
        </div>
    </div>
</body>
</html>
