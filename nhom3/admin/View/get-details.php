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

$type = $_GET['type'];

switch ($type) {
    case "members":
        // Câu lệnh truy vấn chi tiết số lượng thành viên
        $sql = "SELECT * FROM thanhvien";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Username</th><th>Password</th><th>Họ tên</th><th>Mã khách hàng</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['hoten']."</td><td>".$row['MaKhachHang']."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
        }
        break;

    case "revenue":
        // Câu lệnh truy vấn chi tiết doanh thu
        $sql = "SELECT MaVe, MaTuyen, MaChuyenBay, HoTen, NgaySinh, Email, SoDienThoai, Price FROM booking_info";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Mã vé</th><th>Mã tuyến</th><th>Mã chuyến bay</th><th>Họ tên</th><th>Ngày sinh</th><th>Email</th><th>Số điện thoại</th><th>Giá vé</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['MaVe']."</td><td>".$row['MaTuyen']."</td><td>".$row['MaChuyenBay']."</td><td>".$row['HoTen']."</td><td>".$row['NgaySinh']."</td><td>".$row['Email']."</td><td>".$row['SoDienThoai']."</td><td>".$row['Price']."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Không có dữ liệu</td></tr>";
        }
        break;

    case "popular":
        // Câu lệnh truy vấn chi tiết chuyến bay có lượng vé nhiều nhất
        $sql = "SELECT chuyenbay.MaChuyenBay, COUNT(*) AS TotalPassengers
                FROM chuyenbay
                INNER JOIN booking_info ON chuyenbay.MaChuyenBay = booking_info.MaChuyenBay
                GROUP BY chuyenbay.MaChuyenBay
                ORDER BY TotalPassengers DESC
                LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Mã chuyến bay</th><th>Số lượng hành khách</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['MaChuyenBay']."</td><td>".$row['TotalPassengers']."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Không có dữ liệu</td></tr>";
        }
        break;

    case "active-aircraft":
        // Câu lệnh truy vấn chi tiết số lượng tàu bay hoạt động
        $sql = "SELECT * FROM taubay WHERE TrangThai = 0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Mã tàu bay</th><th>Tên tàu bay</th><th>Trạng thái</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['MaTauBay']."</td><td>".$row['TenTauBay']."</td><td>".$row['TrangThai']."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        break;

    case "routes":
        // Câu lệnh truy vấn chi tiết số lượng tuyến bay
        $sql = "SELECT * FROM tuyenbay";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Mã tuyến bay</th><th>Tên tuyến bay</th><th>Khoảng cách (km)</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['MaTuyen']."</td><td>".$row['TenTuyen']."</td><td>".$row['KhoangCach']."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        break;

    case "services":
        // Câu lệnh truy vấn chi tiết số lượng dịch vụ
        $sql = "SELECT * FROM dichvu";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Mã dịch vụ</th><th>Tên dịch vụ</th><th>Giá dịch vụ</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['MaDichVu']."</td><td>".$row['TenDichVu']."</td><td>".$row['GiaDichVu']."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        break;

    case "seats":
        // Câu lệnh truy vấn chi tiết tổng số lượng ghế trên các chuyến bay
        $sql = "SELECT chuyenbay.MaChuyenBay, SUM(chuyenbay.SoLuongVe) AS TotalSeats
                FROM chuyenbay
                GROUP BY chuyenbay.MaChuyenBay";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Mã chuyến bay</th><th>Tổng số lượng ghế</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['MaChuyenBay']."</td><td>".$row['TotalSeats']."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Không có dữ liệu</td></tr>";
        }
        break;

    case "long-routes":
        // Câu lệnh truy vấn chi tiết số lượng tuyến bay có khoảng cách lớn hơn 1000
        $sql = "SELECT * FROM tuyenbay WHERE KhoangCach > 1000";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Mã tuyến bay</th><th>Tên tuyến bay</th><th>Khoảng cách (km)</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['MaTuyen']."</td><td>".$row['TenTuyen']."</td><td>".$row['KhoangCach']."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        break;

    case "booked-passengers":
        // Câu lệnh truy vấn chi tiết số lượng hành khách đã đặt vé
        $sql = "SELECT COUNT(DISTINCT MaKhachHang) AS TotalBookedPassengers FROM booking_info";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Số lượng hành khách đã đặt vé</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['TotalBookedPassengers']."</td></tr>";
            }
        } else {
            echo "<tr><td>Không có dữ liệu</td></tr>";
        }
        break;

    default:
        echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        break;
}

$conn->close();
?>
