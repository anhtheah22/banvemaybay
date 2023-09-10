<?php
// session_start();
include("control/ctrl_frm.php");
$ctrl = new ctrl_frm();

// Kiểm tra xem đã nhập mã vé hay chưa
if (!isset($_SESSION['maVe'])) {
    // Chưa nhập mã vé
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['maVe'])) {
        $maVe = $_POST['maVe'];

        // Kiểm tra mã vé với cơ sở dữ liệu (thay thế phần này bằng mã kiểm tra mã vé với cơ sở dữ liệu của bạn)
        $isValidMaVe = checkMaVe($maVe); // Hàm kiểm tra mã vé với cơ sở dữ liệu

        if ($isValidMaVe) {
            // Mã vé hợp lệ, lưu trữ vào Session
            $_SESSION['maVe'] = $maVe;
        } else {
            // Mã vé không hợp lệ, hiển thị thông báo lỗi hoặc chuyển hướng đến trang khác
            echo "Mã vé không hợp lệ!";
            exit;
        }
    } else {
        // Chưa nhập mã vé, hiển thị form nhập mã vé
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dịch vụ</title>
        </head>

        <body>
            <div id="container">
                <h1>Dịch vụ bổ trợ</h1>
                <form action="" method="POST">
                    <label for="maVe">Nhập mã vé:</label>
                    <input type="text" name="maVe" id="maVe" required>
                    <button type="submit">Xác nhận</button>
                </form>
            </div>
        </body>

        </html>
<?php
        exit;
    }
}

// Lấy mã vé từ Session
$maVe = $_SESSION['maVe'];

// Tiếp tục xử lý phần hiển thị dịch vụ
$kq = $ctrl->get_dichvu();

// Hàm kiểm tra mã vé với cơ sở dữ liệu
function checkMaVe($maVe)
{
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

    // Thực hiện truy vấn kiểm tra mã vé
    $query = "SELECT COUNT(*) FROM booking_info WHERE MaVe = :maVe";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':maVe', $maVe);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    // Đóng kết nối cơ sở dữ liệu
    $database = null;

    return ($count > 0);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch vụ</title>
    <style>
        #container {
            margin-left: 2%;
        }

        #title {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
            margin-top: 20px;
        }

        .common {
            width: 400px;
            border: 1px solid #c8c8c8;
            padding: 12px 24px 15px !important;
            overflow: hidden;
            border-radius: 8px;
            text-align: center;
        }

        #service {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        #service img {
            width: 400px;
            height: 300px;
        }

        .detail {
            margin: auto;
            padding: 0 20px 20px 20px;
        }

        .pannel_card {
            border: 1px solid #005f6e;
            border-radius: 4px;
            padding: 10px 20px;
            box-shadow: none;
            color: #005f6e;
            background-color: white;
        }
    </style>
</head>

<body>
    <div id="container">
        <h1>Dịch vụ bổ trợ</h1>
        <p>Mã vé hợp lệ. Chọn dịch vụ bổ trợ:</p>
        <div id="title">
            <?php while ($row = $kq->fetch_assoc()) { ?>
                <div class="common">
                    <h2 class="title">
                        <?php echo $row["TenDichVu"]; ?>
                    </h2>
                    <div id="service">
                        <div class="image">
                            <a href="<?php echo $row["MaDichVu"] ?>"> <img src="Image/service/<?php echo $row["hinhanh"]; ?>" alt="Dịch vụ"></a>
                        </div>
                        <div class="detail">
                            <h4><?php echo $row["GiaDichVu"]; ?> VND</h4>
                            <p><?php echo $row["PhanLoai"]; ?></p>
                            <form action="View/cart.php" method="POST">
                                <input type="hidden" name="maVe" value="<?php echo $maVe; ?>">
                                <input type="hidden" name="maDichVu" value="<?php echo $row['MaDichVu']; ?>">
                                <input type="hidden" name="tenDichVu" value="<?php echo $row['TenDichVu']; ?>">
                                <input type="hidden" name="giaDichVu" value="<?php echo $row['GiaDichVu']; ?>">
                                <input type="number" name="soLuong" value="1" min="1" required>
                                <button type="submit" class="pannel_card">THÊM</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>