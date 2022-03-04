<!-- CONNECT TO DATABASE -->
<?php
require_once('././ConnectionDatabase/Connection.php');
if(!empty($_GET['item'])){
  $item_fillter = $_GET['item'];
}else{
  $item_fillter='';
}



?>
<!-- -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Fresh Shop</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/2edec8b4fd.js"></script>
  <link rel="stylesheet" href="./css/homepage.css">
</head>

<body style="background-color: #f5f5f5;">
  <div class="container">
    <?php
      include_once('./header.php');
    ?>
    <!-- <div class="header fixed-top mr-auto">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><strong>The Fresh Shop</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Trang Chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sản Phẩm
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="fillter_item.php?item=AT">Áo Thun</a>
                <a class="dropdown-item" href="fillter_item.php?item=AK">Áo Khoác</a>
                <a class="dropdown-item" href="fillter_item.php?item=QJ">Quần Jean</a>
                <a class="dropdown-item" href="fillter_item.php?item=QT">Quần Tây</a>
                <a class="dropdown-item" href="fillter_item.php?item=GD">Giày, Dép</a> 
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="illter_item.php?item=all">Sản phẩm khác</a>

              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tra Cứu Đơn Hàng </a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 mr-auto" method="post" action="index.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Nhập Tên Sản Phẩm" aria-label="Search" style="width: 300px;" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search">
            </i>
            </button>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Thanh Toán</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./NhanVien/DangNhap_NhanVien.php" style="font-size: 11px; line-height: 25px;"> Đăng Nhập</a>
            </li>
          </ul>
        </div>
      </nav>
    </div> -->
    <div class="content">
      <div class="introduction_item">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="./img/introduction_item1.png" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>The Fresh Shop</h5>
                <p>Thời trang tạo nên chất lượng cuộc sống</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/introduction_item2.png" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Black Friday</h5>
                <p>Siêu sale ngày đen tối</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/introduction_item3.png" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Khuyến Mãi</h5>
                <p>Ưu đãi bất tận, mua để nhận quà</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <hr>
      <div class="title_item">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tất Cả Sản Phẩm</li>
            <?php
              $sql_title = 'Select TenLoaiHang From loaihanghoa Where loaihanghoa.MaLoaiHang ="'.$item_fillter.'";';
              $result_title = executeResutl($sql_title);
              if(!empty($result_title)){
                foreach ($result_title as $loaihanghoa) {
                  echo '
                    <li class="breadcrumb-item active" aria-current="page">'. $loaihanghoa['TenLoaiHang'].'</li>
                    ';
                }
              }else{
                               
              }

            ?>
          </ol>
        </nav>

      </div>
      <br>
      <div class="item">
        <div class="fillter_item">
          <nav id="navbar-example3" class="navbar navbar-light bg-light ">
            <strong><a class="navbar-brand disabled" href="#" style="font-size: 15px;">Danh Sách Sản Phẩm</a></strong>
            <nav class="nav nav-pills flex-column">
              <a class="nav-link disabled" href="#">Áo</a>
              <nav class="nav nav-pills flex-column">
                <a class="nav-link ml-3 my-1" href="fillter_item.php?item=AT">Áo Thun</a>
                <a class="nav-link ml-3 my-1" href="fillter_item.php?item=AK">Áo Khoác</a>
              </nav>
              <hr>
              <a class="nav-link disabled" href="">Quần</a>
              <nav class="nav nav-pills flex-column">
                <a class="nav-link ml-3 my-1" href="fillter_item.php?item=QJ">Quần Jean</a>
                <a class="nav-link ml-3 my-1" href="fillter_item.php?item=QT">Quần Tây</a>
              </nav>
              <hr>
              <a class="nav-link disabled" href="#">Giày, Dép</a>
              <nav class="nav nav-pills flex-column">
                <a class="nav-link ml-3 my-1" href="fillter_item.php?item=GD">Giày</a>
                <a class="nav-link ml-3 my-1" href="fillter_item.php?item=GD">Dép</a>
              </nav>
              <hr>
              <a class="nav-link disabled" href="#">Giá</a>
              <nav class="nav nav-pills flex-column">
                <a class="nav-link ml-3 my-1"href="fillter_item.php?item=mintomax">Từ Thấp Tới Cao</a>
                <a class="nav-link ml-3 my-1" href="fillter_item.php?item=maxtomin">Từ Cao Tới Thấp</a>
              </nav>
            </nav>
          </nav>
        </div>
        <div class="all-item-list row row-cols-5">
          <?php
          
          if($item_fillter == 'mintomax' || $item_fillter == 'maxtomin'){
            $sql = 'Select count(MSHH) as number from hanghoa;';
          }else{
            $sql = 'Select count(MSHH) as number from hanghoa WHERE hanghoa.MaLoaiHang ="'.$item_fillter.'"';
          }

        
          $result = executeResutl($sql);
          $number = 0;
          if ($result != null && count($result) > 0) {
            $number = $result[0]['number'];
          }
          $item = 12;
          $pages = ceil($number / $item);

          $current_page = 1;
          if (isset($_GET['page'])) {
            $current_page = $_GET['page'];
          }
          $index = ($current_page - 1) * $item;

          if($item_fillter == 'mintomax' || $item_fillter == 'maxtomin'){
            if($item_fillter == 'mintomax'){
              $sql = 'SELECT hanghoa.MaLoaiHang , hanghoa.MSHH,  hanghoa.TenHH, hanghoa.Gia, hanghoa.SoLuongHang, hinhhanghoa.TenHinh FROM hanghoa, hinhhanghoa WHERE hanghoa.MSHH = hinhhanghoa.MSHH
            and hinhhanghoa.TenHinh  LIKE "%_1" ORDER BY hanghoa.Gia ASC limit ' . $index . ',' . $item;
            }else{
              $sql = 'SELECT hanghoa.MaLoaiHang , hanghoa.MSHH,  hanghoa.TenHH, hanghoa.Gia, hanghoa.SoLuongHang, hinhhanghoa.TenHinh FROM hanghoa, hinhhanghoa WHERE hanghoa.MSHH = hinhhanghoa.MSHH
              and hinhhanghoa.TenHinh  LIKE "%_1" ORDER BY hanghoa.Gia DESC limit ' . $index . ',' . $item;
            }
            
            
          }else{
            $sql = 'SELECT hanghoa.MaLoaiHang , hanghoa.MSHH,  hanghoa.TenHH, hanghoa.Gia, hanghoa.SoLuongHang, hinhhanghoa.TenHinh FROM hanghoa, hinhhanghoa WHERE hanghoa.MSHH = hinhhanghoa.MSHH
            and hanghoa.MaLoaiHang = "'.$item_fillter.'"
            and hinhhanghoa.TenHinh  LIKE "%_1" limit ' . $index . ',' . $item;
          }


          
        
          
          
          $result = executeResutl($sql);
          if(!empty($result)){
            foreach ($result as $hanghoa) {
              $string_temp = "'".$hanghoa['MSHH']."'";
              echo '
                <div class="col" id="item_card">
                <a href="chitietsanpham.php?MSHH='.$hanghoa['MSHH'].'"><img src="./img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['TenHinh'] . '.jpg" alt="Hình ' . $hanghoa['TenHH'] . '"></a>
            
                <a href=""><strong class="title_name_item" maxlength ="15">' . $hanghoa['TenHH'] . '</strong></a>
                <p>Giá: <span class="price_item">' . $hanghoa['Gia'] . '</span> VNĐ</p>
                <div class="buy_item">
                  <p>Sô Lượng: ' . $hanghoa['SoLuongHang'] . '</p>
                  <button onclick="addToCart('. $string_temp.')">Thêm vào giỏ</button>
                </div>
              </div>
                ';
            }
          }else{
            echo '<script>
            alert("Không Tìm Thấy Kết Quả");          
            </script>';
            
          }
          
          ?>
          <div class="clearfix"></div>
          
        </div>
      </div>

      <!--  -->
      <div class="footer">
        <ul class="pagination justify-content-center">
          <li class="page-item">

            <?php
            
            $page = $current_page;
            if ($page > 1) {
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }
              $page = $page - 1;
              echo '<a class="page-link list-group-item" href="?page=' . $page . '&item='.$item_fillter.'">&laquo;</a>';
            } else {
              echo '<a class="page-link  list-group-item disabled" href="?page=' . $page . '&item='.$item_fillter.'">&raquo;</a>';
            }

            ?>

          </li>
          <?php
          for ($i = 1; $i <= $pages; $i++) {
            echo '<li class="page-item"><a class="page-link list-group-item" href="?page=' . $i . '&item='.$item_fillter.'">' . $i . '</a></li>';
            
          }
          ?>
          <li class="page-item">

            <?php
            $page = $current_page;
            if ($page < $pages) {
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }
              $page = $page + 1;
              echo '<a class="page-link list-group-item" href="?page=' . $page . '&item='.$item_fillter.'">&raquo;</a>';
            } else {
              echo '<a class="page-link  list-group-item disabled" href="?page=' . $page . '&item='.$item_fillter.'">&laquo;</a>';
            }

            ?>

          </li>
        </ul>
            
      </div>
      <!--  -->
      <div class="footer-infor">
          
        </div>
    </div>
  </div>



  <script>
    $(document).ready(function() {
      $('.title_name_item').each(function(i) {
        var len = $(this).text().trim().length;
        if (len > 15) {
          $(this).text($(this).text().substr(0, 15) + '...');
        }
      });
    });

    
  </script>
  <script src="./js/digit.js"></script>
  <script src="./js/addToCart.js"></script>
</body>