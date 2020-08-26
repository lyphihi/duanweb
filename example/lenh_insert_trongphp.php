<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh INSERT</title>
</head>
<body>
    <h2>Thực thi câu lệnh INSERT trong php</h2>
    <?php 
        ////1
        include_once(__DIR__ . '/dbconnect.php');
        ////2
        $tenhinhthucthanhtoan = 'Quẹt thẻ';
        $sql = "INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES('$tenhinhthucthanhtoan');";
        // 3. Thực thi
        mysqli_query($conn, $sql);
    ?>
</body>
</html>