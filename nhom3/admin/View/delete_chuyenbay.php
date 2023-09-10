<?php
// Kiểm tra xem mã chuyến bay đã được truyền qua query string hay chưa
if (!isset($_GET['maChuyenBay'])) {
    echo "Không tìm thấy mã chuyến bay";
    exit;
}

$maChuyenBay = $_GET['maChuyenBay'];

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
    $sql = "DELETE FROM chuyenbay WHERE MaChuyenBay = '$maChuyenBay'";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa chuyến bay thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa chuyến bay</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            margin-top: 0;
        }

        p {
            margin-bottom: 20px;
        }
        button[type="submit"] {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <h2>Xóa chuyến bay</h2>
    <p>Bạn có chắc chắn muốn xóa chuyến bay có mã <?php echo $maChuyenBay; ?>?</p>
    <form action="" method="POST">
        <input type="hidden" name="maChuyenBay" value="<?php echo $maChuyenBay; ?>">
        <button type="submit">Xóa</button>
    </form>
</body>

