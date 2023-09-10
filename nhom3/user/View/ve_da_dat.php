<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vé đã đặt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .success-message {
            font-size: 18px;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-back {
            margin-top: 20px;
            text-align: center;
        }

        .btn-back a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-back a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Vé đã đặt</h1>

        <!-- Thông báo thành công -->
        <div class="success-message">
            <p>Thanh toán thành công!</p>
            <p>Cảm ơn bạn đã đặt vé.</p>
        </div>

        <!-- Nút quay lại -->
        <div class="btn-back">
            <a href="../index.php">Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html>
