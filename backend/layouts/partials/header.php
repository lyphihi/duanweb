<!-- <nav class="navbar navbar-dark bg-dark shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">Nền tảng</a>
  <ul class="navbar-nav px-3 mr-auto">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/backend/pages/dashboard.php">Bảng tin</a>
    </li>
  </ul>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <a class="navbar-brand" href="/">Nền tảng</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/duanweb/backend/pages/dashboard.php">Bảng tin</a>
      </li>
    </ul>
    <ul class="navbar-nav px-3 ml-auto">
      <?php
      // Đã đăng nhập rồi -> hiển thị tên Người dùng và menu Đăng xuất
      if (isset($_SESSION['kh_tendangnhap_logged']) && !empty($_SESSION['kh_tendangnhap_logged'])) :
      ?>
        <li class="nav-item text-nowrap">
          <a class="nav-link">Chào <?= $_SESSION['kh_tendangnhap_logged']; ?></a>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/duanweb/backend/auth/dang_xuat.php">Đăng xuất</a>
        </li>
      <?php else : ?>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/duanweb/backend/auth/dang_nhap.php">Đăng nhập</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>