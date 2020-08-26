<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh delete</title>
</head>
<body>
    <h2>Thực thi câu lệnh DELETE trong php</h2>
    <?php 
        ////1
        include_once(__DIR__ . '/dbconnect.php');
        ////2
        $httt_ma = 4;
        $sql = <<<LPH
        delete from `hinhthucthanhtoan`
        where httt_ma= $httt_ma;
        LPH;
        // 3. Thực thi
        mysqli_query($conn, $sql);
    ?>
</body>
</html>