<?php
require_once("control/ctrl_frm.php");
$ctrl2 = new ctrl_frm();
$kq = $ctrl2->get_canghangkhong();
?>
<link rel="stylesheet" href="CSS/sanbay.css">
<style>
    /* CSS cho bảng sân bay */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead th {
        background-color: #f5f5f5;
        border-bottom: 1px solid #ddd;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody td {
        border-bottom: 1px solid #ddd;
    }

    /* CSS cho nút Sửa và Xóa */
    form {
        display: inline-block;
        margin-right: 5px;
    }

 /* CSS cho liên kết Sửa */
a.edit-link {
  display: inline-block;
  padding: 5px 10px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
}

a.edit-link:hover {
  background-color: #0056b3;
}

/* CSS cho liên kết Xoá */
a.delete-link {
  display: inline-block;
  padding: 5px 10px;
  background-color: #dc3545;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
}

a.delete-link:hover {
  background-color: #c82333;
}


    td.a:hover {
        background-color: #0056b3;
    }

    button:hover {
        background-color: #0056b3;

    }
</style>

<table>
    <thead>
        <tr>
            <th>Mã cảng</th>
            <th>Tên sân bay</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Thao tác</th>
            <th>Thao tác</th>

        </tr>
    </thead>
    <tbody>
        <!-- Dữ liệu sân bay -->
        <?php
        if ($kq->num_rows > 0) {
            while ($row = $kq->fetch_assoc()) {
                $maCHK = $row["MaCHK"];
                $tenCang = $row["TenCang"];
                $diaChi = $row["DiaChi"];
                $soDienThoai = $row["SoDienThoai"];
                ?>
                <tr>
                    <td>
                        <?php echo $maCHK; ?>
                    </td>
                    <td>
                        <?php echo $tenCang; ?>
                    </td>
                    <td>
                        <?php echo $diaChi; ?>
                    </td>
                    <td>
                        <?php echo $soDienThoai; ?>
                    </td>
                    <td>
                        <!-- Mã sửa -->
                        <a href="index.php?pid=8&maCHK=<?php echo $row["MaCHK"]; ?>" class="edit-link">Sửa</a>
                    </td>
                    <td>
                        <!-- Mã xóa -->
                        <a href="index.php?pid=9&maCHK=<?php echo $row["MaCHK"]; ?>" class="delete-link">Xoá</a>

                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>Không có dữ liệu sân bay</td></tr>";
        }
        ?>
        <!-- Các dòng dữ liệu khác -->
    </tbody>
</table>