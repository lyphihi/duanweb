<?php
    $tendangnhap=$_POST['username'];
    $matkhau=$_POST['pass'];
    $hoten=$_POST['full_name'];
    echo "<ul>";
    echo "<li>";
    echo "Tên đăng nhập là: {$tendangnhap}";
    echo "</li>";
    echo "<li>";
    echo "Mật khẩu là: {$matkhau}";
    echo "Họ tên là: {$hoten}";
    echo "</li>";
    echo "</ul>";
?>