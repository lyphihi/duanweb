<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>them du lieu</title>
</head>
<body>
    <h2>Them moi trong form</h2>
    <form name="themmoi" id="themmoi" method="post" action="">
    <table>
    <tr>
        <td>Them ten hinh thuc thanh toan</td>
    </tr>
    <tr>
        <td><input type="text" name="TenThanhToan" id="TenThanhToan"></td>
    </tr>
    <tr>
        <td><input type="submit" name="btntm" id="btntm" value="Luu du lieu"></td>
    </tr>
    </table>
    </form>

    <?php 
    if(isset($_POST['btntm'])){
        $httt_ten = $_POST['TenThanhToan'];

        include_once(__DIR__ . '/../dbconnect.php');
        $sql = "insert into `hinhthucthanhtoan`(httt_ten) values ('$httt_ten') ";
        mysqli_query($conn, $sql);
    }
    ?>
</body>
</html>