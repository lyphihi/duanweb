<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh INSERT</title>
</head>
<body>

    <?php
        include_once(__DIR__ . '/dbconnect.php');
        //lấy lại thông tin dòng muốn chỉnh sửa
        $idmuonsua = $_GET['idmuonsua'];
        $sql = <<<LPH
        select httt_ma , httt_ten from `hinhthucthanhtoan` where httt_ma= $idmuonsua;
LPH;
        $result = mysqli_query($conn, $sql);
        $dataRow = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $dataRow = array(
            'ma' => $row['httt_ma'],
            'ten' => $row['httt_ten'],
            );
        }
    ?>

    <h2>Thêm mới dữ liệu</h2>
    <form name="frmtm" id="frmtm" method="POST" action="">
    <input type="text" name="txtupdate" id="txtupdate" value="<?php echo $dataRow['ten'] ?>"> <br>
    <input type="submit" name="suadl" id="suadl" value="Lưu dữ liệu">
    </form>
    
    <?php
        if(isset($_POST['suadl'])){
            $httt_ten = $_POST['txtupdate'];
            ////1
            include_once(__DIR__ . '/dbconnect.php');
            ////2
            $sql = <<<LPH
            update hinhthucthanhtoan
            set httt_ten= '$httt_ten'
            where httt_ma= $idmuonsua;
LPH;
            // 3. Thực thi
            mysqli_query($conn, $sql);
        }
    ?>
    
</body>
</html>

