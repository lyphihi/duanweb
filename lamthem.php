<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hình thức thanh toán</title>
</head>
<body>
    <h2>Thêm hình thức thanh toán</h2>
    <form name="frmhttt" id="frmhttt" method="post" action="">
    Tên hình thức thanh toán: <input type="text" name="httt_ten" id="httt_ma"> <br>
    <input type="submit" name="btnSave" id="btnSave" value="Lưu">
    </form>
    <?php
        if( isset($_POST['btnSave'])){
            include_once(__DIR__ . '/example/dbconnect.php');
            $httt_ten = $_POST['httt_ten'];
            $sql = "insert into `hinhthucthanhtoan`(httt_ten) values('$httt_ten')";
            mysqli_query($conn, $sql);
        }
     ?>
</body>
</html>