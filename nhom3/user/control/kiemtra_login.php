<?php 
include_once("connect.php");
$connect_1=new connect;
$link = $connect_1->getlink();
if (isset($_POST['username']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql= "select * from tb_user where username='$username' and password= '$password'";
    $kq=$link->query($sql);
    $thanhvien=$kq->fetch_assoc();
    if ($kq->num_rows==1)
    {
        $_SESSION['username']=$thanhvien['username'];
        $_SESSION['password']=$thanhvien['password'];
    }
    else{
        $thongbao="<p> <font color='red'><b>Đăng nhập thất bại. Vui lòng đăng nhập lại. </b></font></p>";
    }
}
?>