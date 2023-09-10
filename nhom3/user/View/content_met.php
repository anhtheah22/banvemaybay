<div class="content_chuyenbay">
    <div class="content_met">
        <table>
            <thead>
                <tr>
                    <th>Mã Tuyến Bay</th>
                    <th>Tuyến Bay</th>
                    <th>Khoảng Cách</th>
                    <th>Loại Hình Bay</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $kq->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $row["MaTuyen"]; ?>
                        </td>
                        <td>
                            <?php echo $row["MaCHKDen"]; ?> -
                            <?php echo $row["MaCHKDi"]; ?>
                        </td>
                        <td>
                            <?php echo $row["KhoangCach"]; ?>
                        </td>
                        <td>
                            <?php echo $row["Loai"]; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>