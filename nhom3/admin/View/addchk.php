<?php
require_once("control/ctrl_frm.php");
$ctrl_add = new ctrl_frm();
$kq = $ctrl_add->post_dschk();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <?php

//    if (!$kq) {
//        echo "<script>alert('Thêm thất bại!')</script>";
//     } else {
//         echo "<script>alert('Thêm thành công!')</script>";
//     }
    ?>
    <div class="form-container">
        <form  action=""  method="post" style="width:600">
            <table class="tb_chk"  width="600" cellpadding="4" >
                <tr class="title-header">
                    <td colspan="2">
                        <h3> THÊM DANH SÁCH CẢNG HÀNG KHÔNG </h3>
                    </td>
                </tr>
                <tr class="input-group" colspan="3">
                    <td class="text-info" ><b>Mã Cảng Hàng không: </b></td>
                    <td colspan="2">
                        <input class="form-input" type="text" name="machk" />
                    </td>
                </tr>
                <tr class="input-group ">
                    <td class="text-info" ><b>Tên Cảng:</b></td>
                    <td>
                        <input  class="form-input" type="text" name="tencang" />
                    </td>
                </tr>
                <tr>
                    <td class="text-info" ><b>Địa chỉ:</b></td>
                    <td>
                        <input  class="form-input" type="text" name="diachi" />
                    </td>
                </tr>
                <tr>
                    <td  class="text-info" ><b>Số điện thoại:</b></td>
                    <td>
                        <input  class="form-input" type="text" name="sdt" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input class="btn-submit" type="submit" name="btn-reg" value="Tạo" /></td>
                </tr>
            </table>
        </form>
       
    </div>
</body>