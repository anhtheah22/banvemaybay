
<a href="index.php?pid=14" class="add-link">Thêm chuyến bay</a>


<table>
    <thead>
        <tr>
            <th>MaChuyenBay</th>
            <th>MaTuyen</th>
            <th>SoHieuTauBay</th>
            <th>ThoiGianDi</th>
            <th>ThoiGianDen</th>
            <th>Price</th>
            <th>TrangThai</th>
            <th>ThoiGian</th>
            <th>SoLuongVe</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dữ liệu chuyến bay -->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db-quanlivemaybay";
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM chuyenbay";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["MaChuyenBay"]; ?></td>
                    <td><?php echo $row["MaTuyen"]; ?></td>
                    <td><?php echo $row["SoHieuTauBay"]; ?></td>
                    <td><?php echo $row["ThoiGianDi"]; ?></td>
                    <td><?php echo $row["ThoiGianDen"]; ?></td>
                    <td><?php echo $row["Price"]; ?></td>
                    <td><?php echo $row["TrangThai"]; ?></td>
                    <td><?php echo $row["ThoiGian"]; ?></td>
                    <td><?php echo $row["SoLuongVe"]; ?></td>
                    <td>
                        <a href="index.php?pid=12&maChuyenBay=<?php echo $row["MaChuyenBay"]; ?>" class="edit-link">Sửa</a>
                        <a href="index.php?pid=13maChuyenBay=<?php echo $row["MaChuyenBay"]; ?>" class="delete-link">Xoá</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='10'>Không có dữ liệu chuyến bay</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>



<style>
    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
    }

    table th,
    table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f5f5f5;
    }

    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tbody td {
        position: relative;
    }

    table tbody td a {
        display: inline-block;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 4px;
        color: #fff;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    table tbody td a.edit-link {
        background-color: #007bff;
        margin-right: 5px;
    }

    table tbody td a.delete-link {
        background-color: #dc3545;
        margin-right: 5px;
    }

    table tbody td a.add-link {
        display: inline-block;
        text-decoration: none;
        padding: 8px 16px;
        background-color: #28a745;
        color: #fff;
        font-weight: bold;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    table tbody td a:hover {
        background-color: #0056b3;
    }

    table tbody td a.add-link:hover {
        background-color: #218838;
    }

    /* Hiệu ứng khi hover vào hàng */
    table tbody tr:hover {
        background-color: #f5f5f5;
    }

    /* Hiệu ứng di chuyển và phóng to khi hover vào các thẻ */
    table tbody td a {
        position: relative;
        z-index: 1;
        transform: scale(1);
        transition: transform 0.3s ease;
    }

    table tbody td a::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    table tbody td a:hover::before {
        opacity: 1;
    }

    table tbody td a:hover {
        transform: scale(1.1);
    }

    /* Hiệu ứng di chuyển và phóng to khi hover vào nút "Thêm chuyến bay" */
    table tbody td a.add-link {
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    table tbody td a.add-link::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.5);
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
        z-index: -1;
    }

    table tbody td a.add-link:hover::before {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }
</style>
