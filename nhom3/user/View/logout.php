<?php session_start();
if (isset($_SESSION['username'])){
unset($_SESSION['username']); // xóa session login
header('location:../index.php');
}
?>
<?php if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}?>