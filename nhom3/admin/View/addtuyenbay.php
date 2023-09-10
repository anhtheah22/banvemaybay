<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh sách tuyến bay</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3>Thêm danh sách tuyến bay</h3>
        <form action="index.php?pid=21" method="POST" enctype="multipart/form-data">
            <label for="maTuyen">Mã Tuyến:</label>
            <input type="text" id="maTuyen" name="maTuyen" required><br><br>

            <label for="maCHKDen">Mã Cảng Hàng không đến:</label>
            <input type="text" id="maCHKDen" name="maCHKDen" required><br><br>

            <label for="maCHKDi">Mã Cảng Hàng không đi:</label>
            <input type="text" id="maCHKDi" name="maCHKDi" required><br><br>

            <label for="khoangCach">Khoảng cách:</label>
            <input type="text" id="khoangCach" name="khoangCach" required><br><br>

            <label for="loai">Loại hình bay:</label>
            <input type="text" id="loai" name="loai" required><br><br>

            <label for="images">Hình ảnh:</label>
            <input type="file" id="images" name="images" required><br><br>

            <label for="moTa">Mô tả:</label><br>
            <textarea id="moTa" name="moTa" rows="4" cols="50"></textarea><br><br>

            <input type="submit" value="Thêm tuyến bay">
        </form>
    </div>
</body>
</html>
