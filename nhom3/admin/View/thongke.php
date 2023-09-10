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

// Câu lệnh truy vấn thống kê số lượng thành viên
$sql1 = "SELECT COUNT(*) AS TotalMembers FROM tb_user";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$totalMembers = $row1["TotalMembers"];

// Câu lệnh truy vấn thống kê doanh thu
$sql2 = "SELECT SUM(Price) AS TotalRevenue FROM booking_info";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$totalRevenue = $row2["TotalRevenue"];

// Câu lệnh truy vấn thống kê số lượng tàu bay theo trạng thái
$sql4 = "SELECT TrangThai, COUNT(*) AS TotalAircraft FROM taubay GROUP BY TrangThai";
$result4 = $conn->query($sql4);

// Câu lệnh truy vấn thống kê số lượng tuyến bay
$sql5 = "SELECT COUNT(*) AS TotalRoutes FROM tuyenbay";
$result5 = $conn->query($sql5);
$row5 = $result5->fetch_assoc();
$totalRoutes = $row5["TotalRoutes"];

// Câu lệnh truy vấn thống kê số lượng dịch vụ
$sql6 = "SELECT COUNT(*) AS TotalServices FROM dichvu";
$result6 = $conn->query($sql6);
$row6 = $result6->fetch_assoc();
$totalServices = $row6["TotalServices"];

// Câu lệnh truy vấn thống kê tổng số lượng ghế trên các chuyến bay
$sql7 = "SELECT SUM(SoLuongVe) AS TotalSeats FROM chuyenbay";
$result7 = $conn->query($sql7);
$row7 = $result7->fetch_assoc();
$totalSeats = $row7["TotalSeats"];

// Câu lệnh truy vấn thống kê số lượng tàu bay hoạt động
$sql8 = "SELECT COUNT(*) AS TotalActiveAircraft FROM taubay WHERE TrangThai = 0";
$result8 = $conn->query($sql8);
$row8 = $result8->fetch_assoc();
$totalActiveAircraft = $row8["TotalActiveAircraft"];

// Câu lệnh truy vấn thống kê số lượng tuyến bay có khoảng cách lớn hơn 1000
$sql9 = "SELECT COUNT(*) AS TotalLongRoutes FROM tuyenbay WHERE KhoangCach > 1000";
$result9 = $conn->query($sql9);
$row9 = $result9->fetch_assoc();
$totalLongRoutes = $row9["TotalLongRoutes"];

// Câu lệnh truy vấn thống kê số lượng hành khách đã đặt vé
$sql10 = "SELECT COUNT(*) AS TotalBookedPassengers FROM booking_info";
$result10 = $conn->query($sql10);
$row10 = $result10->fetch_assoc();
$totalBookedPassengers = $row10["TotalBookedPassengers"];

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thống kê</title>
    <style>
    /* CSS cho bảng chính */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {background-color: #f2f2f2;
    }

    /* CSS cho nút "Xem chi tiết" */
    .details-btn {
        background-color: #4CAF50;
        color: white;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        border-radius: 4px;
    }

    /* CSS cho chi tiết các bảng */
    .details-table {
        display: none;
        margin-top: 10px;
        width: 100%;
        border-collapse: collapse;
    }

    .details-table th,
    .details-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .details-table h3 {
        margin: 0;
        padding: 10px;
        background-color: #f2f2f2;
        font-size: 16px;
    }
</style>

</head>

<body>
    <h2>Thống kê</h2>

    <table>
        <tr>
            <th>Bảng dữ liệu</th>
            <th>Số lượng dữ liệu</th>
            <th>Chi tiết</th>
        </tr>
        <tr>
            <td>Thành viên</td>
            <td><?php echo $totalMembers; ?></td>
            <td><button class="details-btn" onclick="toggleDetails('members')">Xem chi tiết</button></td>
        </tr>
        <tr>
            <td>Doanh thu</td>
            <td><?php echo $totalRevenue; ?> đồng</td>
            <td><button class="details-btn" onclick="toggleDetails('revenue')">Xem chi tiết</button></td>
        </tr>
        <tr>
            <td>Số lượng tàu bay hoạt động</td>
            <td><?php echo $totalActiveAircraft; ?></td>
            <td><button class="details-btn" onclick="toggleDetails('active-aircraft')">Xem chi tiết</button></td>
        </tr>
        <tr>
            <td>Số lượng tuyến bay</td>
            <td><?php echo $totalRoutes; ?></td>
            <td><button class="details-btn" onclick="toggleDetails('routes')">Xem chi tiết</button></td>
        </tr>
        <tr>
            <td>Số lượng dịch vụ</td>
            <td><?php echo $totalServices; ?></td>
            <td><button class="details-btn" onclick="toggleDetails('services')">Xem chi tiết</button></td>
        </tr>
        <tr>
            <td>Tổng số lượng ghế trên các chuyến bay</td>
            <td><?php echo $totalSeats; ?></td>
            <td><button class="details-btn" onclick="toggleDetails('seats')">Xem chi tiết</button></td>
        </tr>
        <tr>
            <td>Số lượng tuyến bay có khoảng cách lớn hơn 1000</td>
            <td><?php echo $totalLongRoutes; ?></td>
            <td><button class="details-btn" onclick="toggleDetails('long-routes')">Xem chi tiết</button></td>
        </tr>
        <tr>
            <td>Số lượng hành khách đã đặt vé</td>
            <td><?php echo $totalBookedPassengers; ?></td>
            <td><button class="details-btn" onclick="toggleDetails('booked-passengers')">Xem chi tiết</button></td>
        </tr>
    </table><div class="details-table" id="members-details">
        <h3>Chi tiết số lượng thành viên</h3>
        <table id="members-table">
            <!-- Hiển thị chi tiết số lượng thành viên tại đây -->
        </table>
    </div>

    <div class="details-table" id="revenue-details">
        <h3>Chi tiết doanh thu</h3>
        <table id="revenue-table">
            <!-- Hiển thị chi tiết doanh thu tại đây -->
        </table>
    </div>

    <div class="details-table" id="active-aircraft-details">
        <h3>Chi tiết số lượng tàu bay hoạt động</h3>
        <table id="active-aircraft-table">
            <!-- Hiển thị chi tiết số lượng tàu bay hoạt động tại đây -->
        </table>
    </div>

    <div class="details-table" id="routes-details">
        <h3>Chi tiết số lượng tuyến bay</h3>
        <table id="routes-table">
            <!-- Hiển thị chi tiết số lượng tuyến bay tại đây -->
        </table>
    </div>

    <div class="details-table" id="services-details">
        <h3>Chi tiết số lượng dịch vụ</h3>
        <table id="services-table">
            <!-- Hiển thị chi tiết số lượng dịch vụ tại đây -->
        </table>
    </div>

    <div class="details-table" id="seats-details">
        <h3>Chi tiết tổng số lượng ghế trên các chuyến bay</h3>
        <table id="seats-table">
            <!-- Hiển thị chi tiết tổng số lượng ghế trên các chuyến bay tại đây -->
        </table>
    </div>

    <div class="details-table" id="long-routes-details">
        <h3>Chi tiết số lượng tuyến bay có khoảng cách lớn hơn 1000</h3>
        <table id="long-routes-table">
            <!-- Hiển thị chi tiết số lượng tuyến bay có khoảng cách lớn hơn 1000 tại đây -->
        </table>
    </div>

    <div class="details-table" id="booked-passengers-details">
        <h3>Chi tiết số lượng hành khách đã đặt vé</h3>
        <table id="booked-passengers-table">
            <!-- Hiển thị chi tiết số lượng hành khách đã đặt vé tại đây -->
        </table>
    </div>

    <script>
        function toggleDetails(type) {
            var detailsTable = document.getElementById(type + "-details");
            if (detailsTable.style.display === "none") {
                detailsTable.style.display = "block";
                loadDetailsData(type);
            } else {
                detailsTable.style.display = "none";
            }
        }

        function loadDetailsData(type) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var detailsTable = document.getElementById(type + "-table");
                    detailsTable.innerHTML = xhr.responseText;
                }
            };xhr.open("GET", "get-details.php?type=" + type, true);
            xhr.send();
        }
    </script>
</body>

</html>