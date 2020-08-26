<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh update</title>
</head>
<body>
    <h2>Thực thi câu lệnh UPDATE trong php</h2>
    <?php 
        ////1
        include_once(__DIR__ . '/dbconnect.php');
        ////2
        $httt_ma = 1;
        $httt_ten = 'Tiền mặt';
        $sql = <<<LPH
        update hinhthucthanhtoan
        set httt_ten= '$httt_ten'
        where httt_ma= $httt_ma;
        LPH;
        // 3. Thực thi
        mysqli_query($conn, $sql);
    ?>
</body>
</html>