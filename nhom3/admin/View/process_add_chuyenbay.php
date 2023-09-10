<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maChuyenBay = $_POST['maChuyenBay'];
    $maTuyen = $_POST['maTuyen'];
    $soHieuTauBay = $_POST['soHieuTauBay'];
    $thoiGianDi = $_POST['thoiGianDi'];
    $thoiGianDen = $_POST['thoiGianDen'];
    $price = $_POST['price'];
    $trangThai = $_POST['trangThai'];
    $thoiGian = $_POST['thoiGian'];
    $soLuongVe = $_POST['soLuongVe'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db-quanlivemaybay";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "INSERT INTO chuyenbay (MaChuyenBay, MaTuyen, SoHieuTauBay, ThoiGianDi, ThoiGianDen, Price, TrangThai, ThoiGian, SoLuongVe)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $maChuyenBay, $maTuyen, $soHieuTauBay, $thoiGianDi, $thoiGianDen, $price, $trangThai, $thoiGian, $soLuongVe);

    if ($stmt->execute()) {
        echo "<script>alert('Thêm chuyến bay thành công')</script>";
        echo "<script>window.location.href = 'index.php?pid=7';</script>";
        exit;
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
