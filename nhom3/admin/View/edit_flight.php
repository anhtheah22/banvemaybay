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

// Lấy thông tin chuyến bay từ cơ sở dữ liệu
$sql = "SELECT * FROM tuyenbay WHERE MaTuyen = '$maTuyen'";
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maCHKDen = $row["MaCHKDen"];
    $maCHKDi = $row["MaCHKDi"];
    $khoangCach = $row["KhoangCach"];
    $loai = $row["Loai"];
    $moTa = $row["MoTa"];
    $hinhAnh = $row["Images"];
} else {
    echo "Không tìm thấy chuyến bay";
    exit;
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin chuyến bay</title>
    <style>
        h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        form {
            margin-top: 30px;
        }

        label {
            font-size: 20px;
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        textarea {
            font-size: 18px;
            padding: 10px;
            width: 400px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px #007bff;
            outline: none;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        button[type="submit"] {
            font-size: 20px;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Sửa thông tin chuyến bay</h2>
    <form action="index.php?pid=22" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="maTuyen" value="<?php echo $maTuyen; ?>">
        <label for="maCHKDen">Mã CHK Đến:</label>
        <input type="text" name="maCHKDen" id="maCHKDen" value="<?php echo $maCHKDen; ?>"><br>
        <label for="maCHKDi">Mã CHK Đi:</label>
        <input type="text" name="maCHKDi" id="maCHKDi" value="<?php echo $maCHKDi; ?>"><br>
        <label for="khoangCach">Khoảng Cách:</label>
        <input type="text" name="khoangCach" id="khoangCach" value="<?php echo $khoangCach; ?>"><br>
        <label for="loai">Loại:</label>
        <input type="text" name="loai" id="loai" value="<?php echo $loai; ?>"><br>
        <label for="moTa">Mô Tả:</label>
        <textarea name="moTa" id="moTa"><?php echo $moTa; ?></textarea><br>
        <label for="hinhAnh">Hình Ảnh:</label>
        <input type="file" name="hinhAnh" id="hinhAnh"><br>
        <br>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
