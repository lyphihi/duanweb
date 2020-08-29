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
    $tenhttt = 'Quẹt thẻ';
    $sql = "insert into `hinhthucthanhtoan`(httt_ten) values ('$tenhttt') ";
    mysqli_query($conn, $sql);

    
    ?>
</body>
</html>