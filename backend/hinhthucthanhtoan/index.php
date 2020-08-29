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

            <h2>Thực thi câu lệnh SELECT trong php</h2>
            <?php
            include_once(__DIR__ . '/../../dbconnect.php');
            $sql = <<<LPH
            select httt_ma as MaThanhToan, httt_ten as TenThanhToan from `hinhthucthanhtoan`;
LPH;
            $result = mysqli_query($conn, $sql);
            $data = [];
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data[] = array(
                'ma' => $row['MaThanhToan'],
                'ten' => $row['TenThanhToan'],
                );
            }
            ?>
            <table border="1">
            <tr>
            <td>Mã thanh toán</td>
            <td>Tên thanh toán</td>
            </tr>
            <?php foreach($data as $httt): ?>
            <tr>
            <td> <?php echo $httt['ma']; ?> </td>
            <td> <?php echo $httt['ten']; ?> </td>
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