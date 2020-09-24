<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>

</head>
<body>
    <!-- header -->
    <?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>
    <!-- end header -->

    <main role="main" class="mb-2">
        <!-- Block content -->
        <?php
        // Hiển thị tất cả lỗi trong PHP
        // Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
        // Không nên hiển thị lỗi trên môi trường Triển khai (Production)
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Truy vấn database
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__ . '/../../dbconnect.php');

        /* --- 
        --- 2.Truy vấn dữ liệu Sản phẩm 
        --- Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
        --- 
        */
        $sp_ma = $_GET['sp_ma'];
        $sqlSelectSanPham = <<<EOT
            SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota_ngan, sp.sp_mota_chitiet, sp.sp_soluong, lsp.lsp_ten
            FROM `sanpham` sp
            JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
            WHERE sp.sp_ma = $sp_ma
EOT;

        // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
        $resultSelectSanPham = mysqli_query($conn, $sqlSelectSanPham);

        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $sanphamRow;
        while ($row = mysqli_fetch_array($resultSelectSanPham, MYSQLI_ASSOC)) {
            $sanphamRow = array(
                'sp_ma' => $row['sp_ma'],
                'sp_ten' => $row['sp_ten'],
                'sp_gia' => $row['sp_gia'],
                'sp_gia_formated' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
                'sp_giacu_formated' => number_format($row['sp_giacu'], 2, ".", ",") . ' vnđ',
                'sp_mota_ngan' => $row['sp_mota_ngan'],
                'sp_mota_chitiet' => $row['sp_mota_chitiet'],
                'sp_soluong' => $row['sp_soluong'],
                'lsp_ten' => $row['lsp_ten']
            );
        }
        /* --- End Truy vấn dữ liệu Sản phẩm --- */

        /* --- 
        --- 3.Truy vấn dữ liệu Hình ảnh Sản phẩm 
        --- 
        */
        $sqlSelect = <<<EOT
            SELECT hsp.hsp_ma, hsp.hsp_tentaptin
            FROM `hinhsanpham` hsp
            WHERE hsp.sp_ma = $sp_ma
EOT;

        // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
        $result = mysqli_query($conn, $sqlSelect);

        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $danhsachhinhanh = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $danhsachhinhanh[] = array(
                'hsp_ma' => $row['hsp_ma'],
                'hsp_tentaptin' => $row['hsp_tentaptin']
            );
        }
        /* --- End Truy vấn dữ liệu Hình ảnh sản phẩm --- */

        // Hiệu chỉnh dữ liệu theo cấu trúc để tiện xử lý
        $sanphamRow['danhsachhinhanh'] = $danhsachhinhanh;
        ?>

        <div class="container mt-4">
            <!-- Vùng ALERT hiển thị thông báo -->
            <div id="alert-container" class="alert alert-warning alert-dismissible fade d-none" role="alert">
                <div id="thongbao">&nbsp;</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post" action="">
                        <?php
                        $hinhsanphamdautien = empty($sanphamRow['danhsachhinhanh'][0]) ? '' : $sanphamRow['danhsachhinhanh'][0];
                        ?>
                        <input type="hidden" name="sp_ma" id="sp_ma" value="<?= $sanphamRow['sp_ma'] ?>" />
                        <input type="hidden" name="sp_ten" id="sp_ten" value="<?= $sanphamRow['sp_ten'] ?>" />
                        <input type="hidden" name="sp_gia" id="sp_gia" value="<?= $sanphamRow['sp_gia'] ?>" />
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="<?= empty($hinhsanphamdautien) ? '' : $hinhsanphamdautien['hsp_tentaptin'] ?>" />

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <!-- Nếu có hình sản phẩm nào => duyệt vòng lặp để hiển thị các hình ảnh -->
                                <?php if (count($sanphamRow['danhsachhinhanh']) > 0) : ?>
                                    <div class="preview-pic tab-content">
                                        <?php foreach ($sanphamRow['danhsachhinhanh'] as $hinhsanpham) : ?>
                                            <div class="tab-pane <?= ($hinhsanpham == $hinhsanphamdautien) ? 'active' : '' ?>" id="pic-<?= $hinhsanpham['hsp_ma'] ?>">
                                                <img src="/duanweb/assets/uploads/products/<?= $hinhsanpham['hsp_tentaptin'] ?>" />
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                        <?php foreach ($sanphamRow['danhsachhinhanh'] as $hinhsanpham) : ?>
                                            <li class="<?= ($hinhsanpham == $hinhsanphamdautien) ? 'active' : '' ?>">
                                                <a data-target="#pic-<?= $hinhsanpham['hsp_ma'] ?>" data-toggle="tab">
                                                    <img src="/duanweb/assets/uploads/products/<?= $hinhsanpham['hsp_tentaptin'] ?>" />
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <!-- Không có hình sản phẩm nào => lấy ảnh mặc định -->
                                <?php else : ?>
                                    <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-1">
                                            <img src="/duanweb/assets/shared/img/default.png" />
                                        </div>
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                        <li class="active">
                                            <a data-target="#pic-1" data-toggle="tab">
                                                <img src="/duanweb/assets/shared/img/default.png" />
                                            </a>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title"><?= $sanphamRow['sp_ten'] ?></h3>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <span class="review-no">999 đánh giá</span>
                                </div>
                                <p class="product-description"><?= $sanphamRow['sp_mota_ngan'] ?></p>
                                <small class="text-muted">Giá cũ: <s><span><?= $sanphamRow['sp_giacu_formated'] ?></span></s></small>
                                <h4 class="price">Giá hiện tại: <span><?= $sanphamRow['sp_gia_formated'] ?></span></h4>
                                <p><?= $sanphamRow['sp_mota_ngan'] ?></p>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo <strong>Uy
                                        tín</strong>!</p>
                                <h5 class="sizes">sizes:
                                    <span class="size" data-toggle="tooltip" title="cỡ Nhỏ">s</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Trung bình">m</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Lớn">l</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Đại">xl</span>
                                </h5>
                                <h5 class="colors">colors:
                                    <span class="color orange not-available" data-toggle="tooltip" title="Hết hàng"></span>
                                    <span class="color green"></span>
                                    <span class="color blue"></span>
                                </h5>
                                <div class="form-group">
                                    <label for="soluong">Số lượng đặt mua:</label>
                                    <input type="number" class="form-control" id="soluong" name="soluong">
                                </div>
                                <div class="action">
                                    <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Thêm vào giỏ hàng</a>
                                    <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <h3>Thông tin chi tiết về Sản phẩm</h3>
                <div class="row">
                    <div class="col">
                        <?= $sanphamRow['sp_mota_chitiet'] ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- End block content -->
    </main>

    <!-- footer -->
    <?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
    <!-- end footer -->

    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
    <?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>
    <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
    <script>
        function addSanPhamVaoGioHang() {
            // Chuẩn bị dữ liệu gởi
            var dulieugoi = {
                sp_ma: $('#sp_ma').val(),
                sp_ten: $('#sp_ten').val(),
                sp_gia: $('#sp_gia').val(),
                hinhdaidien: $('#hinhdaidien').val(),
                soluong: $('#soluong').val(),
            };
            // console.log((dulieugoi));

            // Gọi AJAX đến API ở URL `/php/myhand/frontend/api/giohang-themsanpham.php`
            $.ajax({
                url: '/duanweb/frontend/api/giohang-themsanpham.php',
                method: "POST",
                dataType: 'json',
                data: dulieugoi,
                success: function(data) {
                    console.log(data);
                    var htmlString =
                        `Sản phẩm đã được thêm vào Giỏ hàng. <a href="/duanweb/frontend/thanhtoan/giohang.php">Xem Giỏ hàng</a>.`;
                    $('#thongbao').html(htmlString);
                    // Hiện thông báo
                    $('.alert').removeClass('d-none').addClass('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    var htmlString = `<h1>Không thể xử lý</h1>`;
                    $('#thongbao').html(htmlString);
                    // Hiện thông báo
                    $('.alert').removeClass('d-none').addClass('show');
                }
            });
        };

        // Đăng ký sự kiện cho nút Thêm vào giỏ hàng
        $('#btnThemVaoGioHang').click(function(event) {
            event.preventDefault();
            addSanPhamVaoGioHang();
        });
    </script>
</body>
</html>