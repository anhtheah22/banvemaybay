<?php
session_start();
include("../control/ctrl_frm.php");
$ctrl = new ctrl_frm();

// Kiểm tra xem đã nhập mã vé hay chưa
if (!isset($_SESSION['maVe'])) {
    // Chưa nhập mã vé, chuyển hướng về trang nhập mã vé
    header("Location: nhap_mave.php");
    exit;
}

// Lấy mã vé từ Session
$maVe = $_SESSION['maVe'];

// Lấy thông tin vé từ cơ sở dữ liệu (thay thế phần này bằng mã lấy thông tin vé từ cơ sở dữ liệu của bạn)
$thongTinVe = getThongTinVe($maVe); // Hàm lấy thông tin vé từ cơ sở dữ liệu

// Kiểm tra xem có dữ liệu vé hay không
if (!$thongTinVe) {
    echo "Không tìm thấy thông tin vé!";
    exit;
}

// Lấy thông tin dịch vụ đã chọn từ Session
if (!isset($_SESSION['dichVu'])) {
    $_SESSION['dichVu'] = array();
}

// Thêm dịch vụ vào Session nếu có dữ liệu gửi từ trang dichvu.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['maDichVu'])) {
    $maDichVu = $_POST['maDichVu'];
    $tenDichVu = $_POST['tenDichVu'];
    $giaDichVu = $_POST['giaDichVu'];
    $soLuong = $_POST['soLuong'];

    // Kiểm tra xem dịch vụ đã tồn tại trong Session hay chưa
    $isExist = false;
    foreach ($_SESSION['dichVu'] as $index => $dichVu) {
        if ($dichVu['maDichVu'] === $maDichVu) {
            $_SESSION['dichVu'][$index]['soLuong'] += $soLuong;
            $isExist = true;
            break;
        }
    }

    // Nếu dịch vụ chưa tồn tại, thêm mới vào Session
    if (!$isExist) {
        $dichVuData = array(
            'maDichVu' => $maDichVu,
            'tenDichVu' => $tenDichVu,
            'giaDichVu' => $giaDichVu,
            'soLuong' => $soLuong
        );
        $_SESSION['dichVu'][] = $dichVuData;
    }
}

// Hàm lấy thông tin vé từ cơ sở dữ liệu
function getThongTinVe($maVe) {
    // Thay thế phần này bằng mã lấy thông tin vé từ cơ sở dữ liệu của bạn
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

    $query = "SELECT * FROM booking_info WHERE MaVe = :maVe";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':maVe', $maVe);
    $stmt->execute();
    $thongTinVe = $stmt->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $thongTinVe;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
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

        .total {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
            text-align: right;
        }

        hr {
            margin: 10px 0;
            border: none;
            border-top: 1px solid #ccc;
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

        .btn-pay {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .btn-pay input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-pay input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Giỏ hàng</h1>

        <!-- Thông tin vé -->
        <div id="ve">
            <h2>Thông tin vé</h2>
            <div class="item">
                <label>Mã vé:</label>
                <span><?php echo $thongTinVe['MaVe']; ?></span>
            </div>
            <div class="item">
                <label>Tên hành khách:</label>
                <span><?php echo $thongTinVe['HoTen']; ?></span>
            </div>
            <div class="item">
                <label>Mã Tuyến:</label>
                <span><?php echo $thongTinVe['MaTuyen']; ?></span>
            </div>
            <div class="item">
                <label>Giá Vé:</label>
                <span><?php echo $thongTinVe['Price']; ?></span>
            </div>
        </div>

        <!-- Danh sách dịch vụ đã chọn -->
        <div id="dichvu">
            <h2>Dịch vụ đã chọn</h2>
            <?php foreach ($_SESSION['dichVu'] as $dichVu) { ?>
                <div class="item">
                    <label>Tên dịch vụ:</label>
                    <span><?php echo $dichVu['tenDichVu']; ?></span>
                </div>
                <div class="item">
                    <label>Giá dịch vụ:</label>
                    <span><?php echo $dichVu['giaDichVu']; ?> VND</span>
                </div>
                <div class="item">
                    <label>Số lượng:</label>
                    <span><?php echo $dichVu['soLuong']; ?></span>
                </div>
                <hr>
            <?php } ?>
        </div>

        <!-- Tính tổng tiền -->
        <?php
        $tongTienVe = $thongTinVe['Price'];
        $tongTienDichVu = 0;

        foreach ($_SESSION['dichVu'] as $dichVu) {
            $tongTienDichVu += $dichVu['giaDichVu'] * $dichVu['soLuong'];
        }

        $tongTien = $tongTienVe + $tongTienDichVu;
        ?>

        <div class="total">
            <label>Tổng tiền vé:</label>
            <span><?php echo $tongTienVe; ?> VND</span>
        </div>
        <div class="total">
            <label>Tổng tiền dịch vụ:</label>
            <span><?php echo $tongTienDichVu; ?> VND</span>
        </div>
        <div class="total">
            <label>Tổng tiền thanh toán:</label>
            <span><?php echo $tongTien; ?> VND</span>
        </div>

        <!-- Nút thanh toán -->
        <div class="btn-pay">
            <form action="thanh_toan.php" method="post">
                <input type="submit" value="Thanh toán">
            </form>
        </div>

        <!-- Nút quay lại -->
        <div class="btn-back">
            <a href="../index.php?pid=4">Quay lại và chọn thêm dịch vụ</a>
        </div>
    </div>
</body>
</html>
