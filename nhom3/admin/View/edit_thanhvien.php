<?php
// Kiểm tra xem username đã được truyền qua query string hay chưa
if (!isset($_GET['username'])) {
    echo "Không tìm thấy username";
    exit;
}

$username = $_GET['username'];

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

// Lấy thông tin hành khách từ cơ sở dữ liệu
$sql = "SELECT * FROM tb_user WHERE username = '$username'";
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $password = $row["password"];
    $hoten = $row["name"];
} else {
    echo "Không tìm thấy hành khách";
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
    <title>Chỉnh sửa thông tin hành khách</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Chỉnh sửa thông tin hành khách</h2>
    <form action="index.php?pid=24" method="POST">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>"><br>
        <label for="hoten">Họ và tên:</label>
        <input type="text" name="hoten" id="hoten" value="<?php echo $hoten; ?>"><br>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
