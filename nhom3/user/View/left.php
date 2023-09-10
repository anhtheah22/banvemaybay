<style>
    a:link {text-decoration: none;}

    a:hover {color: red; text-decoration: underline;}
    </style>
    <?php
require_once("control/ctrl_frm.php");
$ctrl1 = new ctrl_frm();
$kq = $ctrl1->get_tl();
?>
    <ul>
    <?php 
    while ($row = $kq->fetch_assoc()) 
    {?>
        <li><a hrep="dstlchuyenbay.php?pid=1& mt1 "><?php echo $row["MaTheLoai"];?></a></li>
        <?php }
    ?>
</ul>