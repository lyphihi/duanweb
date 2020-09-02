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

            <h2>Them moi trong form</h2>
            <form name="themmoi" id="themmoi" method="post" action="">
            <table>
            <tr>
                <td>
                    <label for="exampleInputEmail1">Them ten hinh thuc thanh toan</label>
                </td>
            </tr>
            <tr>
                  <td>
                  <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="text" name="TenThanhToan" id="TenThanhToan">
                  </div>
                  
                  </td>
             </tr>
            <tr>
                <td>
                <input type="submit"  name="btntm" id="btntm" value="Luu du lieu">
                <a class="btn btn-outline-primary" href="index.php">Quay ve danh sach</a></td>
            </tr>
            

            </table>
            </form>

            <?php 
            if(isset($_POST['btntm'])){
                $httt_ten = $_POST['TenThanhToan'];

                include_once(__DIR__ . '/../../dbconnect.php');
                $sql = "insert into `hinhthucthanhtoan`(httt_ten) values ('$httt_ten') ";
                mysqli_query($conn, $sql);
            }
            ?>

            </div>
        </div>
    </div>

    <!-- Phan tich nguoi dung gui den server -->
    <?php
    // Truy vấn database
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__ . '/../../dbconnect.php');
        // 2. Nếu người dùng có bấm nút "Lưu dữ liệu" thì kiểm tra VALIDATE dữ liệu
        if( isset($_POST['btntm'])){
            $httt_ten = $_POST['TenThanhToan'];

            //print_r($httt_ten); die;
            // Kiểm tra ràng buộc dữ liệu (Validation)
            // Tạo biến lỗi để chứa thông báo lỗi
            $errors = [];
            // Validate Ten hinh thuc thanh toan
            // rule: required
            if(empty($httt_ten)) {
                $errors['TenThanhToan'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $httt_ten,
                    'msg' => 'Vui lòng nhập Ten hinh thuc thanh toan'
                  ];
      
            }
            // minlength 3
            if(!empty($httt_ten) && strlen($httt_ten) < 3) {
                $errors['TenThanhToan'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 3,
                    'value' => $httt_ten,
                    'msg' => 'Vui lòng nhập Ten hinh thuc thanh toan tren 3 ky tu'
                  ];
      
            }
            // maxlength 50
            if(!empty($httt_ten) && strlen($httt_ten) >50) {
                $errors['TenThanhToan'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 50,
                    'value' => $httt_ten,
                    'msg' => 'Vui lòng nhập Ten hinh thuc thanh toan duoi 50 ky tu'
                  ];
      
            }
        }

    ?>
    <?php
        if(isset($_POST['btntm'])
            && isset($errors)
            && !isset($errors)):
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!--Thong bao loi -->
        <ul>
            <?php foreach ($errors as $fields) : ?>
                <?php foreach ($fields as $field) : ?>
                <li><?php echo $field['msg']; ?></li>
                <?php endforeach; ?>
                <?php endforeach; ?>
        </ul>

        </div>
            <?php endif; ?>
        </div>
    <?php 
        // Nếu không có lỗi VALIDATE dữ liệu (tức là dữ liệu đã hợp lệ)
        // Tiến hành thực thi câu lệnh SQL Query Database
        // => giá trị của biến $errors là rỗng
        if (
            isset($_POST['btntm'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
            && (!isset($errors) || (empty($errors))) // Nếu biến $errors không tồn tại Hoặc giá trị của biến $errors rỗng
        ) {
            // VALIDATE dữ liệu đã hợp lệ
            // Thực thi câu lệnh SQL QUERY
            // Câu lệnh INSERT
            $sql = "INSERT INTO `hinhthucthanhtoan` (category_code, category_name, description) VALUES ('$category_code', '$category_name', '$description');";
            // Thực thi INSERT
            mysqli_query($conn, $sql) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sql");
            // Đóng kết nối
            mysqli_close($conn);
            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            // Điều hướng bằng Javascript
            echo '<script>location.href = "index.php";</script>';
        }

    ?>

    
    <!-- footer -->
    <?php 
    include_once(__DIR__ . '/../layouts/partials/footer.php');
    ?>
    <!-- end footer -->

    <?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>
</body>
</html>