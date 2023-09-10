<?php
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

// Xử lý logic xóa hành khách
if (isset($_GET['action']) && $_GET['action'] == "delete" && isset($_GET['MaKhachHang'])) {
    $maKhachHang = $_GET['MaKhachHang'];

    // Xóa hành khách khỏi cơ sở dữ liệu
    $sql = "DELETE FROM thanhvien WHERE MaKhachHang = '$maKhachHang'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa hành khách thành công');</script>";
    } else {
        echo "<script>alert('Lỗi: " . $conn->error . "');</script>";
    }
}

// Lấy danh sách hành khách từ cơ sở dữ liệu
$sql = "SELECT * FROM tb_user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí hành khách</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .add-link, .edit-link, .delete-link {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .add-link:hover, .edit-link:hover, .delete-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Quản lí hành khách</h2>
    <a href="./index.php?pid=17" class="add-link">Thêm hành khách</a>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Họ và Tên</th>
                <th>Mã Khách Hàng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["MaKhachHang"] . "</td>";
                    echo "<td>";
                    echo "<a href='index.php?pid=15&MaKhachHang=" . $row["MaKhachHang"] . "' class='edit-link'>Sửa</a>";
                    echo "<a href='index.php?pid=16&MaKhachHang=" . $row["MaKhachHang"] . "' class='delete-link'>Xóa</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Không có dữ liệu hành khách</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
