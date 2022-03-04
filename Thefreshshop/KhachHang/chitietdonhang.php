<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
$SoDonDH = getGet('SoDonDH');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tra cứu đơn hàng || The Fresh Shop</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/2edec8b4fd.js"></script>
  <link rel="stylesheet" href="../css/cart.css">
  <link rel="stylesheet" href="../css/tracuudonhang.css">
</head>

<body style="background-color: #f5f5f5;">
  <div class="container">
    <div class="header fixed-top mr-auto">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php"><strong>The Fresh Shop</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Trang Chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sản Phẩm
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../fillter_item.php?item=AT">Áo Thun</a>
                <a class="dropdown-item" href="../fillter_item.php?item=AK">Áo Khoác</a>
                <a class="dropdown-item" href="../fillter_item.php?item=QJ">Quần Jean</a>
                <a class="dropdown-item" href="../fillter_item.php?item=QT">Quần Tây</a>
                <a class="dropdown-item" href="../fillter_item.php?item=GD">Giày, Dép</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../fillter_item.php?item=all">Sản phẩm khác</a>

              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tra Cứu Đơn Hàng </a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 mr-auto" method="post" action="../index.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Nhập Tên Sản Phẩm" aria-label="Search" style="width: 300px;" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search">
              </i>
            </button>


          </form>
          <ul class="navbar-nav">
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Thanh Toán</a>
              </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="../cart.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Giỏ hàng <i class="fa fa-shopping-cart"></i>
                <?php
                $cart = [];
                if (isset($_COOKIE['cart'])) {
                  $json = $_COOKIE['cart'];
                  $cart = json_decode($json, true);
                  $count = 0;
                  foreach ($cart as $item) {
                    $count += $item['num'];
                  }
                } else {
                  $count = '';
                }

                ?>
                <span class="cart"><?= $count ?>

                </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 350px;">
                <?php
                $mshhList = [];
                foreach ($cart as $item) {
                  $mshhList[] = "'" . $item['mshh'] . "'";
                }
                if (count($mshhList) > 0) {
                  $mshhList = implode(',', $mshhList);
                  $sql = 'select * from hanghoa where MSHH in (' . $mshhList . ');';
                  $cartList = executeResutl($sql);
                } else {
                  $cartList = [];
                }

                ?>

                <div class="list-product">
                  <div class="row">
                    <div class="col-md">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Tên</th>
                            <th style="width: 100px; text-align: center;">Hình ảnh</th>

                          </tr>

                        </thead>
                        <tbody>
                          <?php
                          $STT = 0;
                          $slsp = 0;


                          foreach ($cartList as $item) {
                            $num = 0;

                            foreach ($cart as $value) {
                              if ($value['mshh'] == $item['MSHH']) {
                                $num = $value['num'];
                                $slsp++;
                                break;
                              }
                            }
                            echo '
                                <tr>
                              
                                  <td class="align-middle">' . $item['TenHH'] . '</td>
                                  <td class="align-middle"><img src=".././img/' . $item['MaLoaiHang'] . '/' . $item['MSHH'] . '_1.jpg" alt="" width="50px"></td>                    
                                  
                                
                                  
                                </tr>
                          ';
                            if ($slsp > 4) {
                              $temp = count($cartList) - 5;
                            echo '
                              <tr>
                            
                                <td class="align-middle">Và '.$temp.' sản phẩm khác</td>               
                                <td class="align-middle"></td>               
                                
                              
                                
                              </tr>
                        ';
                            break;
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                      <?php
                      if ($slsp == 0) {
                        echo '<h5 style="text-align: center">Bạn chưa có sản phẩm nào !!!</h5>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="see-more" style="text-align: center;">
                  <a href="../cart.php"><button class="btn btn-success">Chi Tiết Giỏ Hàng</button></a>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href=".././NhanVien/DangNhap_NhanVien.php" style="font-size: 11px; line-height: 25px;"> Đăng Nhập</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="content">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php"><strong>The Fresh Shop</strong></a></li>
          <li class="breadcrumb-item active" aria-current="page">Tra cứu đơn hàng</li>
          <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng số 
            <?php 
            echo $SoDonDH;
            ?> 
          </li>
        </ol>
      </nav>

      <div class="list_order">
        <form method="post" action="./tracuudonhang.php" id="form_search_order">
          <div class="form-group">
            <label for="searchOrder"><strong>Tra cứu đơn hàng</strong></label>
            <input type="text" class="form-control" placeholder="Nhập số điện thoại đặt hàng" id="searchOrder" name="searchOrder">
            <button type="submit" class="btn btn-success">Tra cứu</button>
          </div>
          <div class="table_search_order">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 20px; text-align: center;">STT</th>
                  <th>Tên</th>
                  <th>Hình ảnh</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Tổng Tiền</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $STT = 0;
                  $total = 0;
                  $sql_chitietdonhang = "SELECT hanghoa.MaLoaiHang,hanghoa.Gia, hanghoa.TenHH, hanghoa.MSHH, chitietdathang.GiaDatHang,   chitietdathang.SoLuong 
                  FROM chitietdathang, hanghoa 
                  WHERE SoDonDH = $SoDonDH
                  AND hanghoa.MSHH = chitietdathang.MSHH;
                  ";
                  $sql_chitietdonhang_result = executeResutl($sql_chitietdonhang);
                  foreach ($sql_chitietdonhang_result as $item) {
                    $total += $item['SoLuong'] * $item['Gia'];
                    echo '
                    <tr class="align-middle">
                      <td class="align-middle" style="width: 20px; text-align: center;">' . (++$STT) . '</td>
                      <td class="align-middle">' . $item['TenHH'] . '</td>
                      <td class="align-middle"><img src=".././img/' . $item['MaLoaiHang'] . '/' . $item['MSHH'] . '_1.jpg" alt="" width="100px"></td>
                      <td class="align-middle"><span class="price_item">' . $item['Gia'] . ' VNĐ</span></td>
                      
                      <td class="align-middle" style="text-align: center;"><p>' . $item['SoLuong'] . '</p></td>               
                      <td class="align-middle"><span class="price_item">' . $item['SoLuong'] * $item['Gia'] . ' VNĐ</span></td>
                    
                  </tr>
                    ';
                  }
                  
                ?>
              </tbody>
            </table>
            <span class="price_item">Tổng số tiền: <?=$total?> VNĐ</span>
            <hr>
            <div class="infor_order">
              <?php
                $sql_infor_order = "SELECT khachhang.HoTenKH, khachhang.SoDienThoai, diachikh.DiaChi 
                FROM khachhang, diachikh 
                WHERE khachhang.MSKH = diachikh.MSKH 
                AND diachikh.MaDC = $SoDonDH";
                $sql_infor_order_result = executeResutl($sql_infor_order);
                foreach ($sql_infor_order_result as $infor_order) {
                  echo '
                  <strong>THÔNG TIN ĐẶT HÀNG</strong>
                  <br>
                  <p><strong>Tên Người Đặt Hàng:  </strong>'.$infor_order['HoTenKH'].'</p>
                  <p><strong>Số Điện Thoại:  </strong>'.$infor_order['SoDienThoai'].'</p>
                  <p><strong>Địa Chỉ Nhận Hàng:  </strong>'.$infor_order['DiaChi'].'</p>
                  
                  ';
                }
              ?>
              
              <br>
            </div>
          </div>
          
        </form>
      </div>

      <!--  -->
      <div class="footer"></div>






      <!--  -->
      <div class="footer-infor"></div>


    </div>
  </div>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <script src=".././js/digit.js"></script>
  <script src=".././js/input-quantity.js"></script>
  <script src=".././js/addToCart.js"></script>
</body>

</html>