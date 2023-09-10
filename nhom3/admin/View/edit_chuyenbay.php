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

// Lấy thông tin chuyến bay từ cơ sở dữ liệu
$sql = "SELECT * FROM chuyenbay WHERE MaChuyenBay = '$maChuyenBay'";
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maTuyen = $row["MaTuyen"];
    $soHieuTauBay = $row["SoHieuTauBay"];
    $thoiGianDi = $row["ThoiGianDi"];
    $thoiGianDen = $row["ThoiGianDen"];
    $price = $row["Price"];
    $trangThai = $row["TrangThai"];
    $thoiGian = $row["ThoiGian"];
    $soLuongVe = $row["SoLuongVe"];
} else {
    echo "Không tìm thấy chuyến bay";
    exit;
}

// Đóng kết nối
$conn->close();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin chuyến bay</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            margin-top: 0;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Sửa thông tin chuyến bay</h2>
    <form action="index.php?pid=20" method="post">
        <input type="hidden" name="maChuyenBay" value="<?php echo $maChuyenBay; ?>">
        <label for="maTuyen">Mã Tuyến:</label>
        <input type="text" name="maTuyen" id="maTuyen" value="<?php echo $maTuyen; ?>"><br>
        <label for="soHieuTauBay">Số Hiệu Tàu Bay:</label>
        <input type="text" name="soHieuTauBay" id="soHieuTauBay" value="<?php echo $soHieuTauBay; ?>"><br>
        <label for="thoiGianDi">Thời Gian Đi:</label>
        <input type="text" name="thoiGianDi" id="thoiGianDi" value="<?php echo $thoiGianDi; ?>"><br>
        <label for="thoiGianDen">Thời Gian Đến:</label>
        <input type="text" name="thoiGianDen" id="thoiGianDen" value="<?php echo $thoiGianDen; ?>"><br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $price; ?>"><br>
        <label for="trangThai">Trạng Thái:</label>
        <input type="text" name="trangThai" id="trangThai" value="<?php echo $trangThai; ?>"><br>
        <label for="thoiGian">Thời Gian:</label>
        <input type="text" name="thoiGian" id="thoiGian" value="<?php echo $thoiGian; ?>"><br>
        <label for="soLuongVe">Số Lượng Vé:</label>
        <input type="text" name="soLuongVe" id="soLuongVe" value="<?php echo $soLuongVe; ?>"><br>
        <button type="submit">Lưu</button>
    </form>
</body>
