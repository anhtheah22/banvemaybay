<!DOCTYPE html>
<html>
<head>
    <title>Outbound Flight Detail</title>
<style>
        /* CSS cho giao diện */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            /* max-width: 600px; */
            /* margin: 0 auto; */
            padding: 20px;
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        table th {
            background-color: #f2f2f2;
        }

        .booking-form {
            margin-top: 20px;
        }

        .booking-form label {
            display: block;
            margin-bottom: 5px;
        }

        .booking-form input[type="number"],
        .booking-form button {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .booking-form button {
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .booking-form button:hover {
            background-color: #45a049;
        }

        canvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Outbound Flight Detail</h1>

    <?php
// session_start();

require_once("control/ctrl_frm.php");
$ctrl = new ctrl_frm();
$kq = $ctrl->get_timve();

// Kiểm tra người dùng đã đăng nhập chưa
$isLoggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;

// Lấy thông tin tìm kiếm từ biến SESSION
$searchParams = isset($_SESSION['search_params']) ? $_SESSION['search_params'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $class = $_POST['class'];
    $date = $_POST['date'];

    // Kết nối đến CSDL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db-quanlivemaybay";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Thực hiện truy vấn SQL để lấy dữ liệu chuyến bay từ CSDL
    $query = "SELECT tb.MaTuyen, cb.MaChuyenBay, cb.SoHieuTauBay, cb.ThoiGianDi, cb.ThoiGianDen, cb.Price
          FROM TuyenBay tb
          JOIN ChuyenBay cb ON tb.MaTuyen = cb.MaTuyen
          WHERE tb.MaCHKDi = '$from' AND tb.MaCHKDen = '$to' AND DATE_FORMAT(cb.ThoiGianDi, '%Y-%m-%d') = '$date'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        // Tạo một mảng trong session để lưu trữ thông tin các dòng dữ liệu
        $_SESSION['flight_details'] = array();

        while ($row = $result->fetch_assoc()) {
            // Lưu thông tin từ dòng dữ liệu vào mảng trong session
            $flight = array(
                'MaTuyen' => $row['MaTuyen'],               
             'MaChuyenBay' => $row['MaChuyenBay'],

                'SoHieuTauBay' => $row['SoHieuTauBay'],
                'ThoiGianDi' => $row['ThoiGianDi'],
                'ThoiGianDen' => $row['ThoiGianDen'],
                'Price' => $row['Price']
            );

            // Thêm thông tin chuyến bay vào mảng trong session
            $_SESSION['flight_details'][] = $flight;
        }

        echo '<h2>Kết quả tìm kiếm</h2>';
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Mã Tuyến</th>';
        echo '<th>Mã Chuyến Bay</th>';

        echo '<th>Số hiệu tàu bay</th>';
        echo '<th>Giờ đi</th>';
        echo '<th>Giờ đến</th>';
        echo '<th>Giá vé</th>';
        echo '<th></th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($_SESSION['flight_details'] as $flight) {
            echo '<tr>';
            echo '<td>' . $flight['MaTuyen'] . '</td>';
            echo '<td>' . $flight['MaChuyenBay'] . '</td>';

            echo '<td>' . $flight['SoHieuTauBay'] . '</td>';
            echo '<td>' . $flight['ThoiGianDi'] . '</td>';
            echo '<td>' . $flight['ThoiGianDen'] . '</td>';
            echo '<td>' . $flight['Price'] . '</td>';

            echo '<td>';
            echo '<form method="post" action="index.php?pid=16" class="booking-form">';
            echo '<input type="hidden" name="MaTuyen" value="' . $flight['MaTuyen'] . '">';
            echo '<input type="hidden" name="MaChuyenBay" value="' . $flight['MaChuyenBay'] . '">';

            echo '<input type="hidden" name="SoHieuTauBay" value="' . $flight['SoHieuTauBay'] . '">';
            echo '<input type="hidden" name="ThoiGianDi" value="' . $flight['ThoiGianDi'] . '">';
            echo '<input type="hidden" name="ThoiGianDen" value="' . $flight['ThoiGianDen'] . '">';
            echo '<input type="hidden" name="Price" value="' . $flight['Price'] . '">';
            echo '<button type="submit">Đặt vé</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Không tìm thấy kết quả.</p>';
    }

    $conn->close();
} else {
    echo '<p>Không có thông tin tìm kiếm.</p>';
}
?>



    <canvas id="canvas"></canvas>


</div>

<script>
    // Animation
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    var x = 0;
    var y = canvas.height / 2;
    var dx = 2;

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.beginPath();
        ctx.arc(x, y, 20, 0, Math.PI * 2);
        ctx.fillStyle = '#FF0000';
        ctx.fill();
        ctx.closePath();

        x += dx;

        if (x + 20 > canvas.width) {
            x = 0;
        }

        requestAnimationFrame(animate);
    }

    animate();
</script>

</body>
</html>
