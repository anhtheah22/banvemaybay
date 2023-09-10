<?php
// $maCHK = $_GET["maCHK"];

// Kết nối tới cơ sở dữ liệu
$servername = "localhost";  // Tên máy chủ CSDL
$username = "root";     // Tên đăng nhập CSDL
$password = "";     // Mật khẩu CSDL
$dbname = "db-quanlivemaybay";       // Tên CSDL

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu sân bay theo mã cảng
$sql = "SELECT * FROM canghangkhong ";
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    // Lấy thông tin sân bay từ kết quả truy vấn
    $row = $result->fetch_assoc();
    $tenCang = $row["TenCang"];
    $diaChi = $row["DiaChi"];
    $soDienThoai = $row["SoDienThoai"];

    // Hiển thị cửa sổ sửa đổi và điền thông tin vào các trường
    echo '<h2>Sửa thông tin sân bay</h2>';
    echo '<form action="update_canghangkhong.php" method="POST">';
    echo '  <label for="tenCang">Tên sân bay:</label>';
    echo '  <input type="text" name="tenCang" id="tenCang" value="' . $tenCang . '"><br>';
    echo '  <label for="diaChi">Địa chỉ:</label>';
    echo '  <input type="text" name="diaChi" id="diaChi" value="' . $diaChi . '"><br>';
    echo '  <label for="soDienThoai">Số điện thoại:</label>';
    echo '  <input type="text" name="soDienThoai" id="soDienThoai" value="' . $soDienThoai . '"><br>';
    echo '  <button type="submit">Lưu</button>';
    echo '</form>';
} else {
    echo "Không tìm thấy dữ liệu sân bay";
}
 // Cập nhật dữ liệu hành khách trong cơ sở dữ liệu
 $sql = "UPDATE canghangkhong SET tencang = '$tenCang', diaChi = '$diaChi', soDienThoai = '$soDienThoai' WHERE MaCHK = '$maCHK'";

 if ($conn->query($sql) === TRUE) {
     echo "Cập nhật thông tin hành khách thành công";
 } else {
     echo "Lỗi: " . $conn->error;
 }


// Đóng kết nối
$conn->close();
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        /* background-color: #f2f2f2; */
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 20px;
    }

    label {
        font-size: 18px;
        margin-top: 10px;
        color: #555;
    }

    input[type="text"] {
        font-size: 18px;
        padding: 5px 10px;
        margin-top: 5px;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button[type="submit"] {
        font-size: 18px;
        padding: 10px 20px;
        margin-top: 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
