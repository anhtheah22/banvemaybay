<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm chuyến bay</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    .form-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        margin-top: 50px;
    }

    h3 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-input {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .btn-submit {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #45a049;
    }
</style>

</head>

<body>
    <div class="form-container">
        <h3>THÊM DANH SÁCH CHUYẾN BAY</h3>
        <form action="index.php?pid=23" method="POST">
            <input class="form-input" type="text" name="maChuyenBay" placeholder="Mã chuyến bay" required>
            <input class="form-input" type="text" name="maTuyen" placeholder="Mã tuyến" required>
            <input class="form-input" type="text" name="soHieuTauBay" placeholder="Số hiệu tàu bay" required>
            <input class="form-input" type="text" name="thoiGianDi" placeholder="Thời gian đi" required>
            <input class="form-input" type="text" name="thoiGianDen" placeholder="Thời gian đến" required>
            <input class="form-input" type="text" name="price" placeholder="Price" required>
            <input class="form-input" type="text" name="trangThai" placeholder="Trạng thái" required>
            <input class="form-input" type="text" name="thoiGian" placeholder="Thời gian" required>
            <input class="form-input" type="text" name="soLuongVe" placeholder="Số lượng vé" required>
            <input class="btn-submit" type="submit" name="btn-reg" value="Tạo">
        </form>
    </div>
</body>
</html>
