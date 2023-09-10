<?php
// Kết nối đến CSDL
$servername = "localhost";  // Tên máy chủ CSDL
$username = "root";     // Tên đăng nhập CSDL
$password = "";     // Mật khẩu CSDL
$dbname = "db-quanlivemaybay";       // Tên CSDL

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng booking_info và chuyenbay
$sql = "SELECT booking_info.MaVe, booking_info.Price, chuyenbay.ThoiGianDi
        FROM booking_info
        INNER JOIN chuyenbay ON booking_info.MaChuyenBay = chuyenbay.MaChuyenBay";
$result = $conn->query($sql);

// Tạo mảng để lưu trữ dữ liệu
$data = array();

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    // Duyệt qua từng hàng dữ liệu
    while ($row = $result->fetch_assoc()) {
        // Lấy tháng từ cột Ngày Giờ Bay
        $month = date("n", strtotime($row['ThoiGianDi']));

        // Tạo hoặc cộng dồn giá trị bán được theo tháng
        if (!isset($data[$month])) {
            $data[$month] = $row['Price'];
        } else {
            $data[$month] += $row['Price'];
        }
    }
}

// Đóng kết nối
$conn->close();

// Chuyển đổi mảng dữ liệu thành chuỗi JSON
$jsonData = json_encode($data);
?>

<!-- Sử dụng dữ liệu JSON để tạo biểu đồ -->
<canvas id="myChart1"></canvas>
<script>
    var ctx = document
        .getElementById("myChart1")
        .getContext("2d");

    // Chuyển đổi chuỗi JSON thành đối tượng JavaScript
    var jsonData = <?php echo $jsonData; ?>;

    // Tạo mảng dữ liệu từ đối tượng JavaScript
    var salesData = Object.values(jsonData);

    var labels = Object.keys(jsonData).map(function(month) {
        return "Tháng " + month;
    });

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    type: "bar",
                    label: "Doanh thu theo tháng",
                    data: salesData,
                    backgroundColor: "rgba(54, 162, 235, 0.6)",
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            title: {
                display: true,
                text: "Doanh thu bán vé máy bay theo tháng",
            },
            scales: {
                xAxes: [
                    {
                        gridLines: {
                            display: false,
                        },
                    },
                ],
                yAxes: [
                    {
                        gridLines: {
                            display: true,
                        },
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
        },
    });
</script>