<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['maDichVu'])) {
    $maDichVu = $_GET['maDichVu'];

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['maDichVu'] === $maDichVu) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
}

header("Location: giohang.php");
exit();
?>
