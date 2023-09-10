<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhật ký đặt vé</title>
    <link rel="stylesheet" href="CSS/nhatkydatve.css">
</head>

<body>
    <div class="container">
        <h1>Danh sách Nhật ký đặt vé</h1>
        <table>
            <thead>
                <tr>
                    <th>Mã Nhật ký đặt vé</th>
                    <th>Mã khách hàng</th>
                    <th>Mã vé</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu Nhật ký đặt vé -->
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "db-quanlivemaybay";
                $link = new mysqli($servername, $username, $password, $database);
                $sql = "SELECT * FROM nhatkydatve";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row["MaNhatKyDatVe"]; ?></td>
                            <td><?php echo $row["MaKhachHang"]; ?></td>
                            <td><?php echo $row["MaVe"]; ?></td>
                            <td><?php echo $row["TrangThai"]; ?></td>
                            <td>
                                <button class="btn-edit">Sửa</button>
                                <button class="btn-delete">Xóa</button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>Không có dữ liệu Nhật ký đặt vé</td></tr>";
                }
                ?>
                <!-- Các dòng dữ liệu khác -->
            </tbody>
        </table>
    </div>

</body>

</html>
