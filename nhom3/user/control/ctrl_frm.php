<?php
require_once "connect.php";
class ctrl_frm extends connect
{
    function get_dschuyenbay()
    {
        $sql = "select * from tuyenbay";
        $kq = $this->link->query($sql);
        return $kq;
    }
    function get_tl()
    {
        $sql = "select * from loaihinhbay";
        $kq = $this->link->query($sql);
        return $kq;
    }
    function get_noidia()
    {
        $sql = "select * from tuyenbay where Loai='Nội địa'";
        $kq = $this->link->query($sql);
        return $kq;
    }
    function get_quocte()
    {
        $sql = "select * from tuyenbay where Loai='Quốc tế'";
        $kq = $this->link->query($sql);
        return $kq;
    }
    function get_chitietchuyenbay()
    {
        $sql = "select * from tuyenbay ";
        $kq = $this->link->query($sql);
        return $kq;
    }
    function get_kqtk($key)
    {
        $sql = "select * from tuyenbay where MaCHKDen LIKE '%$key%' ";
        $kq = $this->link->query($sql);
        return $kq;
    }
    function get_dichvu()
    {
        $sql = "select * from dichvu";
        $kq = $this->link->query($sql);
        return $kq;
    }
    function get_timve()
    {
        $sql = "SELECT tb.MaCHKDen, tb.MaCHKDi, cb.ThoiGianDi
        FROM tuyenbay tb
        JOIN chuyenbay cb ON tb.MaTuyen = cb.MaTuyen
        ";
        $kq= $this->link->query($sql);
        return $kq;
    }
    public function insert_ve($ticketCode, $maTuyen, $maChuyenBay , $fullName, $birthDate, $email, $phoneNumber, $price)
{
    $sql = "INSERT INTO booking_info ( MaVe, MaTuyen, MaChuyenBay, HoTen, NgaySinh, Email, SoDienThoai, Price) 
            VALUES ('$ticketCode','$maTuyen','$maChuyenBay', '$fullName', '$birthDate', '$email', '$phoneNumber', '$price')";
    
    if ($this->link->query($sql) === TRUE) {
        return true; // Trả về true nếu thêm thành công
    } else {
        return false; // Trả về false nếu có lỗi xảy ra
    }
}

    
    
    
    public function get_total_dichvu() {
        // Thực hiện truy vấn hoặc xử lý để lấy tổng số lượng dịch vụ
        // Ví dụ:
        $query = "SELECT COUNT(*) as total FROM dichvu";
        $result = $this->link->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function get_dichvu_paging($start, $perPage) {
        // Thực hiện truy vấn SQL để lấy danh sách dịch vụ theo trang
        $query = "SELECT * FROM dichvu LIMIT $start, $perPage";
        // Thực hiện truy vấn và trả về kết quả
        return $this->link->query($query);
    }
    public function get_dichvu_by_id($maDichVu)
    {
        // Thực hiện truy vấn SQL để lấy thông tin dịch vụ theo mã dịch vụ
        $query = "SELECT * FROM dichvu WHERE MaDichVu = '$maDichVu'";

        // Thực hiện truy vấn và trả về kết quả
        return $this->link->query($query);
    }

    public function get_dichvuPaginate($startIndex = 0, $limit = 3) {

        $sql = "SELECT * FROM dichvu LIMIT $startIndex, $limit";
        $kq = $this->link->query($sql);
        return $kq;
    }

    public function get_totalDichvu() {
        // Thực hiện kết nối đến cơ sở dữ liệu
        // ...

        // Chuẩn bị truy vấn SQL để lấy tổng số lượng dịch vụ
        $query = "SELECT COUNT(*) as total FROM dichvu";

        // Thực hiện truy vấn và lấy kết quả
        $result = $this->link->query($query);

        // Kiểm tra và trả về tổng số lượng dịch vụ
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
    public function order_details(){
        $MaDon = $_SESSION['cart'];
    $sql = "SELECT * FROM chitietdonhang WHERE MaDon = '$MaDon'";
    $result = $this->link->query($sql);
    return $result;
}}
?>