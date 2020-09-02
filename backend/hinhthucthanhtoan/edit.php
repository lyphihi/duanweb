<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    include_once(__DIR__ . '/../layouts/styles.php');
    ?>
</head>
<body>
    
    <!-- header -->
    <?php 
    include_once(__DIR__ . '/../layouts/partials/header.php');
    ?>
    <!-- end header -->

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- sidebar -->
                <?php 
                include_once(__DIR__ . '/../layouts/partials/sidebar.php');
                ?>
                <!-- end sidebar -->
            </div>
            <div class="col-md-8" >
            <!-- day la noi dung -->

            <h2>Thực thi câu lệnh update trong form</h2>
            <?php

            include_once(__DIR__ . '/../../dbconnect.php');
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
            <td> <a href="#"<?php  ?>>Xóa</a> 
            <a href="xuly_edit.php?idmuonsua=<?php echo $httt['ma']; ?>">Sửa</a></td>
            </tr>
            <?php endforeach; ?>
            </table>

                </div>
            </div>
        </div>


    <!-- footer -->
    <?php 
    include_once(__DIR__ . '/../layouts/partials/footer.php');
    ?>
    <!-- end footer -->

    <?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>
</body>
</html>