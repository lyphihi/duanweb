<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh INSERT</title>
</head>
<body>
    <h2>Thêm mới dữ liệu</h2>
    <form name="frmtm" id="frmtm" method="POST" action="">
    <input type="text" name="themmoi" id="themmoi"> <br>
    <input type="submit" name="luudl" id="luudl" value="Lưu dữ liệu">
    </form>
    
    <?php
        if(isset($_POST['luudl'])){
            $httt_ten = $_POST['themmoi'];

            ////1
            include_once(__DIR__ . '/dbconnect.php');
            ////2
            $sql = "INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES('$httt_ten');";
            // 3. Thực thi
            mysqli_query($conn, $sql);
        }
    ?>
</body>
</html>