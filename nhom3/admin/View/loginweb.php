<?php
if (isset($thongbao))
    echo $thongbao;
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<br>
<div id="dangky" align="center">
    <form action="" method="post" style="width:500px">
    <table id="dangky" width="498" border="1" cellpadding="4">
        <tr>
            <td colspan="2"><div align="center">ĐĂNG NHẬP</div>
            <div align="center"></div></td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td><input class="dangky" type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input class="dangky" type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td colspan="2" align="center" valign="middle">
                <input class="tieudebtn" name="login" type="submit" id="login" value="Đăng nhập">
                <input class="tieudebtn" type="reset" name="lamtuoi" id="reset" value="Thoát">
            </td>
        </tr>
    </table>

    </form>
</div>