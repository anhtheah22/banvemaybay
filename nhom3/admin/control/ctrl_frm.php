<?php
require "connect.php";
class ctrl_frm extends connect
{
    function get_dschuyenbay()
    {
        $sql = "select * from tuyenbay";
        $kq = $this->link->query($sql);
        return $kq;
    }

    function get_canghangkhong()
    {
        $sql = "select * from canghangkhong";
        $kq = $this->link->query($sql);
        return $kq;
    }
    // function post_dschk($machk,$tencang,$diachi,$sdt)
    function post_dschk()
    {

        if (isset($_POST['btn-reg'])) {
            $machk = $_POST['machk'];
            $tencang = $_POST['tencang'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            if (!empty($machk) && !empty($tencang) && !empty($diachi) && !empty($sdt)) {
                $sql = "INSERT INTO canghangkhong (MaCHK, TenCang, DiaChi, SoDienThoai)
                 VALUES(N'$machk', N'$tencang', N'$diachi', N'$sdt')";
                $kq = $this->link->query($sql);
                return $kq;
            } else
                echo "<script>alert('bạn cần nhập đầy đủ thông tin!')</script>";
        }
    }
    function post_chuyenbay()
{
    if (isset($_POST['btn-reg'])) {
        $maChuyenBay = $_POST['maChuyenBay'];
        $maTuyen = $_POST['maTuyen'];
        $soHieuTauBay = $_POST['soHieuTauBay'];
        $thoiGianDi = $_POST['thoiGianDi'];
        $thoiGianDen = $_POST['thoiGianDen'];
        $price = $_POST['price'];
        $trangThai = $_POST['trangThai'];
        $thoiGian = $_POST['thoiGian'];
        $soLuongVe = $_POST['soLuongVe'];

        if (!empty($maChuyenBay) && !empty($maTuyen) && !empty($soHieuTauBay) && !empty($thoiGianDi) && !empty($thoiGianDen) && !empty($price) && !empty($trangThai) && !empty($thoiGian) && !empty($soLuongVe)) {
            $sql = "INSERT INTO chuyenbay (MaChuyenBay, MaTuyen, SoHieuTauBay, ThoiGianDi, ThoiGianDen, Price, TrangThai, ThoiGian, SoLuongVe)
             VALUES ('$maChuyenBay', '$maTuyen', '$soHieuTauBay', '$thoiGianDi', '$thoiGianDen', '$price', '$trangThai', '$thoiGian', '$soLuongVe')";
            $kq = $this->link->query($sql);
            return $kq;
        } else {
            echo "<script>alert('Bạn cần nhập đầy đủ thông tin!')</script>";
        }
    }
}

    function post_dstuyenbay()
    {

        if (isset($_POST['btn-reg'])) {
            $matuyen = $_POST['matuyen'];
            $machkden = $_POST['machkden'];
            $machkdi = $_POST['machkdi'];
            $kc = $_POST['kc'];
            $giobaydk = $_POST['giobaydk'];
            $loai = $_POST['loai'];
            $fileim = $_POST['fileim'];
            $mota = $_POST['mota'];

            if (!empty($matuyen) && !empty($machkden) && !empty($machkdi) && !empty($kc) && !empty($giobaydk) && !empty($loai) && !empty($fileim) && !empty($mota)) {
                $sql = "INSERT INTO tuyenbay (MaTuyen,MaCHKDen,MaCHKDi,KhoangCach,GioBayDuKien,Loai,Images,MoTa) VALUES(N'$matuyen', N'$machkden', N'$machkdi', N'$kc', N'$giobaydk', N'$loai', N'$fileim', N'$mota')";
                $kq = $this->link->query($sql);
                return $kq;
            } else
                echo "<script>alert('bạn cần nhập đầy đủ thông tin!')</script>";
        }
    }

}
?>