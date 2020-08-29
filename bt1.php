<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bt1</title>
</head>
<body>
    <?php
    //////cau2
    $a =10;
    $b =3;
    $tong = $a + $b;
    echo 'Tong la:' .$tong ."<br>" ;
    $tich =  $a + $b;
    echo 'Tich la:' .$tich ."<br>" ;
    $thuong = $a / $b;
    echo 'Thuong la:' .$thuong ."<br>" ;
    $songuyencuathuong = (int)$thuong;
    echo 'So nguyen cua thuong la:' .$songuyencuathuong ."<br>" ;
    //////cau3
    echo 'Cac so chia het cho 7 la';
    for($i=1;$i<=100;$i++){
        if( ($i%7) ==0 ){
            echo ''.$i ."<br>" ;
        }
    }
    /////cau4
    echo '<table border="1">';
    for($i=1;$i<=4;$i++)    {
        echo '<tr>';
        for($j=1;$j<=5;$j++){
            echo '<td>';
            echo "Dong {$i} Cot {$j}";
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>
</html>