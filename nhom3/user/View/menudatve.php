<?php
// session_start();

require_once("control/ctrl_frm.php");
$ctrl = new ctrl_frm();
$kq = $ctrl->get_timve();

$isLoggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;

if (isset($_POST['search_submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $class = $_POST['class'];
    $date = $_POST['date'];

    // Kiểm tra dữ liệu đầu vào
    if (empty($from) || empty($to) || empty($class) || empty($date)) {
        // Xử lý thông báo lỗi hoặc điều hướng lại trang tìm kiếm
        exit();
    }

    $_SESSION['from'] = $from;
    $_SESSION['to'] = $to;
    $_SESSION['class'] = $class;
    $_SESSION['date'] = $date;

    header("Location: xuly_datve.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm chuyến bay</title>
<style>
        /* CSS cho giao diện */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .container {
            /* max-width: 600px; */
            /* margin: 0 auto; */
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fade-in 1s ease-in;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        select, input[type="date"], input[type="number"], button {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
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
            font-weight: bold;
            color: #333;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Tìm kiếm chuyến bay</h1>
    
    <!-- Form tìm kiếm -->
    <form method="post" action="index.php?pid=15">
        <label for="from">Nơi đi:</label>
        <select id="from" name="from">
            <?php while ($option = $kq->fetch_assoc()) { ?>
                <option value="<?php echo htmlspecialchars($option['MaCHKDi']); ?>"><?php echo htmlspecialchars($option['MaCHKDi']); ?></option>
            <?php } ?>
        </select>

        <label for="to">Nơi đến:</label>
        <select id="to" name="to">
            <?php $kq->data_seek(0); ?>
            <?php while ($option = $kq->fetch_assoc()) { ?>
                <option value="<?php echo htmlspecialchars($option['MaCHKDen']); ?>"><?php echo htmlspecialchars($option['MaCHKDen']); ?></option>
            <?php } ?>
        </select>

        <label for="class">Hạng ghế:</label>
        <select id="class" name="class">
            <option value="volvo">Phổ thông</option>
            <option value="saab">Thương gia</option>
            <option value="opel">Kinh doanh</option>
        </select>

        <label for="date">Ngày đi:</label>
        <input type="date" id="date" name="date">

        <button type="submit" name="search_submit" value="Tìm Kiếm">Tìm kiếm</button>
    </form>
    
</div>

</body>
</html>
