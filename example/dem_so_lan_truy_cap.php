<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
         // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
        session_start();

        // Nội dung file trong file session sẽ được biến $_SESSION của PHP quản lý theo dạng key=value
        // Truy xuất thông tin bằng cách: $_SESSION['keyname']
        // Gán giá trị bằng               $_SESSION['keyname'] = value;

        if (isset($_SESSION['counter'])) {
            $_SESSION['counter'] += 1;
        } else {
            $_SESSION['counter'] = 1;
        }
        $msg = '<p>Bạn đã truy cập vào trang này:' . $_SESSION['counter'] . '</p>';
        echo $msg;
    ?>
</body>
</html>