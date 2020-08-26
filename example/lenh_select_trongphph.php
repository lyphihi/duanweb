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
        ////1
        include_once(__DIR__ . '/dbconnect.php');
        ////2
        
        // 3. Thực thi
        mysqli_query($conn, $sql);
    ?>
</body>
</html>