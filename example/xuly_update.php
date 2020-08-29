<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua du lieu</title>
</head>
<body>
    <?php 
        include_once(__DIR__ . '/../dbconnect.php');
        $sql = <<<LPH
        select httt_ma as MaThanhToan, httt_ten as TenThanhToan from `hinhthucthanhtoan`;
        LPH;
        $result = mysqli_query($conn, $sql);
        $dataRow = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
            'ma' => $row['MaThanhToan'],
            'ten' => $row['TenThanhToan'],
            );
        }
    ?>

    <h2>Sua du lieu trong form</h2>
    <form name="txtsua" id="txtsua" method="get" action="">
    <table>
    <tr>
        <td>Thay doi ten hinh thuc thanh toan</td>
    </tr>
    <tr>
        <td><input type="text" name="TenThanhToan" id="TenThanhToan"></td>
    </tr>
    <tr>
        <td><input type="submit" name="btnsua" id="btnsua" value="Luu du lieu"></td>
    </tr>
    </table>
    </form>

    <?php 
    if(isset($_POST['btnsua'])){
    $httt_ten = $_POST['btnsua'];
    $sql = <<<LPH
    update hinhthucthanhtoan
    set httt_ten = '$httt_ten'
    where httt_ma = $idmuonsua;
LPH;
    mysqli_query($conn, $sql);
    }
    ?>
</body>
</html>
