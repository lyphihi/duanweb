<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
</head>
<body>
    <form name="timkiem" id="timkiem" method="GET" action="xly_timkiem.php">
    Loại sản phẩm: <br> <input type="checkbox" name="lsp[]" id="lsp-1" value="1">Máy tính bảng<br>
    <input type="checkbox" name="lsp[]" id="lsp-2" value="2">Máy tính xách tay<br>
    <input type="checkbox" name="lsp[]" id="lsp-3" value="3">Điện thoại<br>
    <input type="checkbox" name="lsp[]" id="lsp-4" value="4">linh phụ kiện<br>
    Nhà sản xuất: <br> <input type="checkbox" name="nsx[]" id="nsx-1" value="1">Apple<br>
    <input type="checkbox" name="nsx[]" id="nsx-2" value="2">Samsung<br>
    <input type="checkbox" name="nsx[]" id="nsx-3" value="3">Vivo<br>
    <input type="checkbox" name="nsx[]" id="nsx-4" value="4">Nokia<br>
    Khuyến mãi: <br> <input type="radio" name="rdkm" id="km-1">Khuyến mãi trung thu <br>
    <input type="radio" name="rdkm" id="km-2">Khuyến mãi dịp sinh nhật <br>
    <input type="submit" value="Tìm kiếm">
    </form>
</body>
</html>