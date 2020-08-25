<?php
$loaisanpham = [];
if( isset($_GET['lsp'])){
    $loaisanpham = $_GET['lsp'];
}
$nhasanxuat = [];
if( isset($_GET['nsx'])){
    $nhasanxuat = $_GET['nsx'];
}
$khuyenmai = null;
if( isset($_GET['rdkm'])){
    $khuyenmai = $_GET['rdkm'];
}
echo '<ul>';
if(!empty($loaisanpham)){
    $chuoituychon = implode(',', $loaisanpham);
    echo "<li>tuy chon la: {$chuoituychon}</li>";
}

if(!empty($nhasanxuat)){
    $chuoituychon1 = implode(',', $nhasanxuat);
    echo "<li>tuy chon nha san xuat la: {$chuoituychon1}</li>";
}

if(!empty($khuyenmai)){
    echo "<li>khuyen mai la: {$khuyenmai}</li>";
}
echo '</ul>';
?>