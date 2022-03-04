<?php
  $username = $_COOKIE['username'];
  $sql = "SELECT * FROM nhanvien WHERE MSNV = '$username'";
  $result_nv = executeResutl($sql);
  foreach ($result_nv as $nv) {
    $title_nv = $nv['HoTenNV'] . ' / ' . $nv['ChucVu'];
  }
?>


<div class="header fixed-top mr-auto">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php"><strong>The Fresh Shop</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./Manager_Page.php">Dardboard<span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="./quanlydonhang.php">Quản lý đơn hàng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./quanlysanpham.php">Quản lý sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Quản lý nhân sự</a>
          </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quản lý công việc
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./quanlydonhang.php">Quản lý đơn hàng</a>
            <a class="dropdown-item" href="./quanlysanpham.php">Quản lý sản phẩm</a>
            <div class="dropdown-divider"></div>
            <?php
              if($username == 'admin'){
                echo '<a class="dropdown-item" href="./quanlynhansu.php">Quản lý nhân sự</a>';
              }else{
                echo '<a class="dropdown-item disabled" href="#">Quản lý nhân sự</a>';
              }
            ?>
            

          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-auto" method="get" action="./quanlydonhang.php">
        <input class="form-control mr-sm-2" type="search" placeholder="Nhập Số Điện Thoại KH" aria-label="Search" style="width: 300px;" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search">
          </i>
        </button>


      </form>
      <ul class="navbar-nav " id="log-in" style="margin-top: 20px;" >
        <li class="nav-item" >
            <a href="./me.php" title="<?=$title_nv?>"  data-trigger="focus" style="color: #333;"><?= $username ?></a>
        </li>
        <li class="nav-item" style="margin-left: 20px;">
          <p id="time"></p>
        </li>
      </ul>
    </div>
  </nav>
</div>