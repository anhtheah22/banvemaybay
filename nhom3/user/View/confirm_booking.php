<?php
// session_start();

// Kiểm tra nếu không có thông tin đặt vé được gửi từ trang trước
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['MaTuyen'])|| !isset($_POST['ThoiGianDen']) || !isset($_POST['ThoiGianDi']) || !isset($_POST['Price'])) {
    header("Location: index.php"); // Chuyển hướng về trang chính nếu không có thông tin
    exit();
}

// Lấy thông tin chuyến bay đã chọn
$maTuyen = $_POST['MaTuyen'];
$maChuyenBay = $_POST['MaChuyenBay'];
$thoiGianDi = $_POST['ThoiGianDi'];
$thoiGianDen = $_POST['ThoiGianDen'];
$Price = $_POST['Price'];

// Tạo mã vé duy nhất
$ticketCode = uniqid();

// Lưu thông tin đặt vé và mã vé vào biến session
$_SESSION['booking_info'] = [
    'MaVe' => $ticketCode,
    'MaTuyen' => $maTuyen,
    'MaChuyenBay' => $maChuyenBay,
    'ThoiGianDi' => $thoiGianDi,
    'ThoiGianDen' => $thoiGianDen,
    'Price' => $Price
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Booking</title>
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

        .booking-form input[type="text"],
        .booking-form input[type="email"],
        .booking-form input[type="tel"],
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
    </style>
</head>
<body>
<div class="container">
    <h1>Confirm Booking</h1>

    <table>
        <thead>
            <tr>
                <th>Mã Tuyến</th>
                <th>Mã Chuyến Bay</th>
                <th>Ngày đi</th>
                <th>Ngày đến</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo htmlspecialchars($_POST['MaTuyen']); ?></td>
            <td><?php echo htmlspecialchars($_POST['MaChuyenBay']); ?></td>

            <td><?php echo htmlspecialchars($_POST['ThoiGianDi']); ?></td>
            <td><?php echo htmlspecialchars($_POST['ThoiGianDen']); ?></td>
            <td><?php echo number_format($Price); ?></td>
        </tr>
        </tbody>
    </table>

    <h2>Mã vé của bạn: <?php echo $ticketCode; ?></h2>

    <form method="post" action="index.php?pid=17" class="booking-form" onsubmit="return confirm('Bạn có chắc chắn xác nhận đặt vé?');">
        <label for="fullName">Họ và tên:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="birthDate">Ngày tháng năm sinh:</label>
        <input type="date" id="birthDate" name="birthDate" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phoneNumber">Số điện thoại:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" required>

        <button type="submit">Order Flight</button>
    </form>
    
</div>
</body>
</html>
