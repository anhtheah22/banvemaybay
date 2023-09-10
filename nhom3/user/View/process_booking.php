<?php
// session_start();

require_once("control/ctrl_frm.php");
$ctrl = new ctrl_frm();
$bookingInfo = isset($_SESSION['booking_info']) ? $_SESSION['booking_info'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $bookingInfo) {
    $fullName = $_POST['fullName'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    // Lưu thông tin người dùng vào biến session
    $_SESSION['user_info'] = [
        'fullName' => $fullName,
        'birthDate' => $birthDate,
        'email' => $email,
        'phoneNumber' => $phoneNumber
    ];

    // Lưu thông tin vé vào giỏ hàng
    $ticket = [
        'bookingInfo' => $bookingInfo,
        'userInfo' => $_SESSION['user_info']
    ];

    // Kiểm tra xem có danh sách giỏ hàng trong session hay không
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // Tạo danh sách giỏ hàng nếu chưa tồn tại
    }

    // Thêm vé vào giỏ hàng
    $_SESSION['cart'][] = $ticket;

    // Thực hiện thêm dữ liệu vào cơ sở dữ liệu
    $ticketCode = $ctrl->insert_ve($bookingInfo['MaVe'], $bookingInfo['MaTuyen'], $bookingInfo['MaChuyenBay'], $fullName, $birthDate, $email, $phoneNumber, $bookingInfo['Price']);

    // Cập nhật mã vé vào biến session
    $_SESSION['booking_info'] = $bookingInfo;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Success</title>
    <style>
        /* CSS cho giao diện */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
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

        .cart {
            margin-top: 20px;
            text-align: center;
        }

        .cart button {
            background-color: #008CBA;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .cart button:hover {
            background-color: #006380;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Success</h1>
        <p>Booking has been successfully placed. Thank you for choosing our service!</p>

        <h2>Booking Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Mã Vé</th>
                    <th>Mã Tuyến</th>
                    <th>Mã Chuyến Bay</th>
                    <th>Ngày đi</th>
                    <th>Ngày đến</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo isset($bookingInfo['MaVe']) ? htmlspecialchars($bookingInfo['MaVe']) : ''; ?></td>
                    <td><?php echo isset($bookingInfo['MaTuyen']) ? htmlspecialchars($bookingInfo['MaTuyen']) : ''; ?></td>
                    <td><?php echo isset($bookingInfo['MaChuyenBay']) ? htmlspecialchars($bookingInfo['MaChuyenBay']) : ''; ?></td>
                    <td><?php echo isset($bookingInfo['ThoiGianDi']) ? htmlspecialchars($bookingInfo['ThoiGianDi']) : ''; ?></td>
                    <td><?php echo isset($bookingInfo['ThoiGianDen']) ? htmlspecialchars($bookingInfo['ThoiGianDen']) : ''; ?></td>
                    <td><?php echo isset($bookingInfo['Price']) ? number_format($bookingInfo['Price']) : ''; ?></td>
                </tr>
            </tbody>
        </table>

        <h2>Customer Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo isset($_SESSION['user_info']['fullName']) ? htmlspecialchars($_SESSION['user_info']['fullName']) : ''; ?></td>
                    <td><?php echo isset($_SESSION['user_info']['birthDate']) ? htmlspecialchars($_SESSION['user_info']['birthDate']) : ''; ?></td>
                    <td><?php echo isset($_SESSION['user_info']['email']) ? htmlspecialchars($_SESSION['user_info']['email']) : ''; ?></td>
                    <td><?php echo isset($_SESSION['user_info']['phoneNumber']) ? htmlspecialchars($_SESSION['user_info']['phoneNumber']) : ''; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="cart">
            <button onclick="confirmBooking()">Xác Nhận</button>
        </div>
    </div>

    <script>
        function confirmBooking() {
            alert("Vé đã được đưa vào giỏ hàng, hãy vào giỏ hàng và thanh toán");
        }
    </script>
</body>
</html>