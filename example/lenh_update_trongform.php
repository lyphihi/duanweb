<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh select</title>
</head>
<body>
    <h2>Thực thi câu lệnh SELECT trong php</h2>
    <?php
    // lay thong tin cu
    include_once(__DIR__ . '/../dbconnect.php');
    $sql = <<<LPH
    select httt_ma as MaThanhToan, httt_ten as TenThanhToan from `hinhthucthanhtoan`;
LPH;
    $result = mysqli_query($conn, $sql);
    $dataRow = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $dataRow = array(
        'ma' => $row['MaThanhToan'],
        'ten' => $row['TenThanhToan'],
        );
    }
    ?>
    
    <form name="themmoi" id="themmoi" method="post" action="">
    <table>
    <tr>
        <td>sua hinh thuc thanh toan</td>
    </tr>
    <tr>
        <td><input type="text" name="TenThanhToan" id="TenThanhToan" value="<?php echo $dataRow['ten']?>"></td>
    </tr>
    <tr>
        <td><input type="submit" name="btntm" id="btntm" value="Luu du lieu"></td>
    </tr>
    </table>
    </form>
   
</body>
</html>