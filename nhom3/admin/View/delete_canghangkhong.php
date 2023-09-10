<?php
if (isset($_GET["maCHK"])) {
    $maCHK = $_GET["maCHK"];

    // Xóa sân bay từ CSDL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db-quanlivemaybay";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "DELETE FROM canghangkhong WHERE MaCHK = '$maCHK'";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa dữ liệu thành công";
    } else {
        echo "Lỗi khi xóa dữ liệu: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Mã cảng không được cung cấp";
}
?>
