<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maChuyenBay = $_POST["maChuyenBay"];
    $maTuyen = $_POST["maTuyen"];
    $soHieuTauBay = $_POST["soHieuTauBay"];
    $thoiGianDi = $_POST["thoiGianDi"];
    $thoiGianDen = $_POST["thoiGianDen"];
    $price = $_POST["price"];
    $trangThai = $_POST["trangThai"];
    $thoiGian = $_POST["thoiGian"];
    $soLuongVe = $_POST["soLuongVe"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db-quanlivemaybay";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "UPDATE chuyenbay SET MaTuyen = '$maTuyen', SoHieuTauBay = '$soHieuTauBay', ThoiGianDi = '$thoiGianDi', ThoiGianDen = '$thoiGianDen', Price = '$price', TrangThai = '$trangThai', ThoiGian = '$thoiGian', SoLuongVe = '$soLuongVe' WHERE MaChuyenBay = '$maChuyenBay'";

    if ($conn->query($sql) === TRUE) {
        echo "Sửa thông tin chuyến bay thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>
