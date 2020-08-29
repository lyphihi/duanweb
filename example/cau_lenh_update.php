<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once(__DIR__ . '/../dbconnect.php');
    $httt_ten = 'Tiền mặt';
    $httt_ma = 1;
    $sql = <<<LPH
    update hinhthucthanhtoan
    set httt_ten = '$httt_ten'
    where httt_ma = $httt_ma;
LPH;
    mysqli_query($conn, $sql);
    var_dump($sql);
    die;
    ?>
</body>
</html>