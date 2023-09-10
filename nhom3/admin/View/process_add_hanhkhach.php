<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db-quanlivemaybay";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "INSERT INTO customers (name, username, email, password)
            VALUES ('$name', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm hành khách thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>
