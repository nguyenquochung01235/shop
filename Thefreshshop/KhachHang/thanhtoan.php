<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
require_once('../API/dathang.php');
$cart = [];
if (isset($_COOKIE['cart'])) {
  $json = $_COOKIE['cart'];
  $cart = json_decode($json, true);
}

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
  <link rel="stylesheet" href="../css/cart.css">
  <link rel="stylesheet" href="../css/thanhtoan.css">
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
              <a class="nav-link" href="./tracuudonhang.php">Tra Cứu Đơn Hàng </a>
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
          <li class="breadcrumb-item active" aria-current="page">Thanh Toán</li>
        </ol>
      </nav>

      <div class="list-product">
        <div class="row">


          <div class="col-md-6">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 20px; text-align: center;">STT</th>
                  <th>Tên</th>
                  <th style="width: 105px;">Hình ảnh</th>
                  <th>Giá</th>
                  <th style="text-align: center;">Số lượng</th>
                  <th>Tổng Tiền</th>


                </tr>

              </thead>
              <tbody>
                <?php
                $STT = 0;
                $total = 0;
                foreach ($cartList as $item) {
                  $num = 0;
                  foreach ($cart as $value) {
                    if ($value['mshh'] == $item['MSHH']) {
                      $num = $value['num'];

                      break;
                    }
                  }
                  $total += $num * $item['Gia'];

                  echo '
                      <tr class="align-middle">
                        <td class="align-middle" style="width: 20px; text-align: center;">' . (++$STT) . '</td>
                        <td class="align-middle">' . $item['TenHH'] . '</td>
                        <td class="align-middle"><img src=".././img/' . $item['MaLoaiHang'] . '/' . $item['MSHH'] . '_1.jpg" alt="" width="100px"></td>
                        <td class="align-middle"><span class="price_item">' . $item['Gia'] . ' VNĐ</span></td>
                        
                        <td class="align-middle" style="text-align: center;"><p>' . $num . '</p></td>               
                        <td class="align-middle"><span class="price_item">' . $num * $item['Gia'] . ' VNĐ</span></td>
                        
                      </tr>
                    ';
                }
                ?>
              </tbody>
            </table>
            <?php
            if ($STT == 0) {
              echo '<h3 class="align-middle">Bạn chưa có sản phẩm nào !!!</h3>';
              echo '
                <a href="../index.php"><button class="btn btn-success">Mua hàng ngay</button></a>
                ';
            }
            ?>
            <hr>



          </div>
          <div class="col-md-6">
            <div class="form-thanh-toan">
              <form id="main-form" method="post">
                <div class="form-group">
                  <label for="fullname">Họ Và Tên</label>
                  <input type="text" class="form-control" placeholder="Nhập họ và tên của bạn" id="fullname" name="fullname">
                </div>
                <div class="form-group">
                  <label for="company">Tên Công Ty</label>
                  <input type="text" class="form-control" placeholder="Nhập tên công ty (nếu có)" id="company" name="company">
                </div>
                <div class="form-group">
                  <label for="phone">Số Điện Thoại:</label>
                  <input type="text" class="form-control" placeholder="Nhập số điện thoại" id="phone" name="phone">
                </div>
                <div class="form-group">
                  <label for="email">Email: </label>
                  <input type="email" class="form-control" placeholder="Nhập email của bạn" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="address">Địa chỉ giao hàng: </label>
                  <input type="text" class="form-control" placeholder="Nhập địa chỉ nhận hàng" id="address" name="address">
                </div>
                <div class="form-group" id="dat-hang">
                  <span class="price_item">Tổng số tiền: <?= $total ?> VNĐ</span>
                  <button type="submit" class="btn btn-success" style="float: right;"> Đặt hàng</button>
                </div>
               
              </form>
            </div>
          </div>
        </div>
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