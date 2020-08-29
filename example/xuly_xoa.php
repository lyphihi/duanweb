<?php
$idmuonxoa = $_GET['idmuonxoa'];

include_once(__DIR__ . '/../dbconnect.php');
    $sql = <<<LPH
    delete from `hinhthucthanhtoan`
    where httt_ma = $idmuonxoa;
LPH;
    mysqli_query($conn, $sql);
?>