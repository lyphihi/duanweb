<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web07</title>
    <style>
    .dongchan {
        background: red;
    }
    .dongle {
        background: blue;
        color: white;
    }
    </style>
</head>
<body>
    <?php
    ////////cau1 gán giá trị cho biến: sử dụng hàm define
    define('FAVMOVIE','Huong mat tua khoi suong') ;
    echo 'Bo phim toi yeu thich nhat la:' .'<br>';
    echo FAVMOVIE;
    $FAVMOVIE= 'Danh nghia nguoi nha';
    echo '<br> Bo phim toi yeu thich nhat la:' .'<br>' .$FAVMOVIE;
    echo '<br><br><br>';
    ///////cau2
    $a=10;
    $b=3;
    $tong =$a + $b;
    $hieu =$a - $b;
    $tich =$a * $b;
    $thuong =$a / $b;
    echo 'Chúng ta có $a=' .$a .' và $b=' .$b .'<br>';
    echo 'Tong la: ' .$tong .'<br>';
    echo 'Hieu la: ' .$hieu .'<br>';
    echo 'Tich la: ' .$tich .'<br>';
    echo 'Thuong la: ' .$thuong .'<br>';
    $sodu= $a % $b;
    echo 'Số dư la: ' .$sodu .'<br>';
    $songuyen= (int)$thuong;
    $tb = $tong / 2 ;
    echo 'Số nguyên sau khi chia la: ' .$songuyen .'<br>';
    echo 'Trung bình cộng la: ' .$tb .'<br>';
    /////////cau3
    echo 'Các số chia hết cho 7 từ 1 đến 100 là: <br>';
    $j=0;
    for($i=1;$i<=100;$i++){
        if(($i%7)==0){
            echo '<br>' .$i;
            $j++;
        }
    }
    echo '<br> Có ' .$j .' số chia hết cho 7';
    echo '<br><br><br>';
    //////cau4 cách 1
    echo '<table border=1>';
    for($i=1;$i<=4;$i++){
        if(($i%2)==0){
            echo '<tr class="dongchan">';
        } else {
            echo '<tr class="dongle">';
        }
        for($j=1;$j<=5;$j++){
            echo '<td>';
            echo "Dong {$i} cot {$j}";
            echo '</td>';
        }
        echo '<tr>';
    }
    echo '</table>';
    echo '<br><br><br>';
    ////////cau4 cách 2
    ////////cau5
    echo '<table border=1>';
    for($h=1;$h<=10;$h++){
        echo '<tr>';
            echo '<td>';
            echo $h;
            echo '</td>';
            echo '<td>';
            echo 'Dong ' .$h .':Lap trinh PHP';
            echo '</td>';
        echo '<tr>';
    }
    echo '</table>';
    ?>
</body>
</html>