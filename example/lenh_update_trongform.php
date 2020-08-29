<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh update</title>
</head>
<body>
    <h2>Thực thi câu lệnh update trong form</h2>
    <?php

    include_once(__DIR__ . '/dbconnect.php');
    $sql = <<<LPH
    select httt_ma, httt_ten from `hinhthucthanhtoan`;
LPH;
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = array(
        'ma' => $row['httt_ma'],
        'ten' => $row['httt_ten'],
        );
    }
    ?>
    <table border="1">
    <tr>
    <td>Mã thanh toán</td>
    <td>Tên thanh toán</td>
    <td>Hành động</td>
    </tr>
    <?php foreach($data as $httt): ?>
    <tr>
    <td> <?php echo $httt['ma']; ?> </td>
    <td> <?php echo $httt['ten']; ?> </td>
    <td> <a href="xuly_xoa.php?idmuonxoa=<?php echo $httt['ma']; ?>">Xóa</a> 
    <a href="xuly_update.php?idmuonsua=<?php echo $httt['ma']; ?>">Sửa</a></td>
    </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>