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
    $httt_ma = 4;
    $sql = <<<LPH
    delete from `hinhthucthanhtoan`
    where httt_ma = $httt_ma;
LPH;
    mysqli_query($conn, $sql);
    
    ?>
</body>
</html>