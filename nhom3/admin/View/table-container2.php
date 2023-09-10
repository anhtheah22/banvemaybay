<table>
    <thead>
        <tr>
            <th>Mã Chuyến Bay</th>
            <th>Mã CHK Đến</th>
            <th>Mã CHK Đi</th>
            <th>Khoảng Cách</th>
            <th>Loại</th>
            <th>Hình Ảnh</th>
            <th>Mô Tả</th>
            <th>Thao tác</th>
            <th>Thao tác</th>

            
        </tr>
    </thead>
    <tbody>
        <!-- Dữ liệu sân bay -->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db-quanlivemaybay";
        $link = new mysqli($servername, $username, $password, $database);
        $sql = "SELECT * FROM tuyenbay";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["MaTuyen"]; ?>
                    </td>
                    <td>
                        <?php echo $row["MaCHKDen"]; ?>
                    </td>
                    <td>
                        <?php echo $row["MaCHKDi"]; ?>
                    </td>
                    <td>
                        <?php echo $row["KhoangCach"]; ?>
                    </td>
                   
                    <td>
                        <?php echo $row["Loai"]; ?>
                    </td>
                    <td><img src="Image/<?php echo $row["Images"]; ?>" alt="Airport Image"></td>
                    <td>
                        <?php echo $row["MoTa"]; ?>
                    </td>
                    <td>
                        <!-- Mã sửa -->
                        <a href="index.php?pid=10&maTuyen=<?php echo $row["MaTuyen"]; ?>" class="delete-link">Xóa</a>
                    </td>
                    <td>
                        <!-- Mã xóa -->
                        <a href="index.php?pid=11&maTuyen=<?php echo $row["MaTuyen"]; ?>" class="edit-link">Sửa</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu sân bay</td></tr>";
        }
        ?>
        <!-- Các dòng dữ liệu khác -->
    </tbody>
    <style>
    /* CSS cho nút Sửa */
    .edit-link {
        display: inline-block;
        padding: 8px 12px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .edit-link:hover {
        background-color: #0056b3;
    }

    /* CSS cho nút Xóa */
    .delete-link {
        display: inline-block;
        padding: 8px 12px;
        background-color: #dc3545;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .delete-link:hover {
        background-color: #c82333;
    }
</style>
</table>