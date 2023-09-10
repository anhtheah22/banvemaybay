<h2>Thêm hành khách</h2>
<form action="index.php?pid=25" method="POST">
    <label for="name">Họ và tên:</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" value="Thêm hành khách">
</form>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    h2 {
        margin-top: 20px;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: inline-block;
        width: 100px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
        width: 200px;
        padding: 5px;
        margin-bottom: 10px;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
