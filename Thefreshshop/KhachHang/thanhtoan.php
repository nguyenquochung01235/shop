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
              <a class="nav-link" href="../index.php">Trang Ch??? <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                S???n Ph???m
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../fillter_item.php?item=AT">??o Thun</a>
                <a class="dropdown-item" href="../fillter_item.php?item=AK">??o Kho??c</a>
                <a class="dropdown-item" href="../fillter_item.php?item=QJ">Qu???n Jean</a>
                <a class="dropdown-item" href="../fillter_item.php?item=QT">Qu???n T??y</a>
                <a class="dropdown-item" href="../fillter_item.php?item=GD">Gi??y, D??p</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../fillter_item.php?item=all">S???n ph???m kh??c</a>

              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./tracuudonhang.php">Tra C???u ????n H??ng </a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 mr-auto" method="post" action="../index.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Nh???p T??n S???n Ph???m" aria-label="Search" style="width: 300px;" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search">
              </i>
            </button>


          </form>
          <ul class="navbar-nav">
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Thanh To??n</a>
              </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="../cart.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gi??? h??ng <i class="fa fa-shopping-cart"></i>
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
                            <th>T??n</th>
                            <th style="width: 100px; text-align: center;">H??nh ???nh</th>

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
                          
                              <td class="align-middle">V?? '.$temp.' s???n ph???m kh??c</td>               
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
                        echo '<h5 style="text-align: center">B???n ch??a c?? s???n ph???m n??o !!!</h5>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="see-more" style="text-align: center;">
                  <a href="../cart.php"><button class="btn btn-success">Chi Ti???t Gi??? H??ng</button></a>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href=".././NhanVien/DangNhap_NhanVien.php" style="font-size: 11px; line-height: 25px;"> ????ng Nh???p</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="content">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php"><strong>The Fresh Shop</strong></a></li>
          <li class="breadcrumb-item active" aria-current="page">Thanh To??n</li>
        </ol>
      </nav>

      <div class="list-product">
        <div class="row">


          <div class="col-md-6">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 20px; text-align: center;">STT</th>
                  <th>T??n</th>
                  <th style="width: 105px;">H??nh ???nh</th>
                  <th>Gi??</th>
                  <th style="text-align: center;">S??? l?????ng</th>
                  <th>T???ng Ti???n</th>


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
                        <td class="align-middle"><span class="price_item">' . $item['Gia'] . ' VN??</span></td>
                        
                        <td class="align-middle" style="text-align: center;"><p>' . $num . '</p></td>               
                        <td class="align-middle"><span class="price_item">' . $num * $item['Gia'] . ' VN??</span></td>
                        
                      </tr>
                    ';
                }
                ?>
              </tbody>
            </table>
            <?php
            if ($STT == 0) {
              echo '<h3 class="align-middle">B???n ch??a c?? s???n ph???m n??o !!!</h3>';
              echo '
                <a href="../index.php"><button class="btn btn-success">Mua h??ng ngay</button></a>
                ';
            }
            ?>
            <hr>



          </div>
          <div class="col-md-6">
            <div class="form-thanh-toan">
              <form id="main-form" method="post">
                <div class="form-group">
                  <label for="fullname">H??? V?? T??n</label>
                  <input type="text" class="form-control" placeholder="Nh???p h??? v?? t??n c???a b???n" id="fullname" name="fullname">
                </div>
                <div class="form-group">
                  <label for="company">T??n C??ng Ty</label>
                  <input type="text" class="form-control" placeholder="Nh???p t??n c??ng ty (n???u c??)" id="company" name="company">
                </div>
                <div class="form-group">
                  <label for="phone">S??? ??i???n Tho???i:</label>
                  <input type="text" class="form-control" placeholder="Nh???p s??? ??i???n tho???i" id="phone" name="phone">
                </div>
                <div class="form-group">
                  <label for="email">Email: </label>
                  <input type="email" class="form-control" placeholder="Nh???p email c???a b???n" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="address">?????a ch??? giao h??ng: </label>
                  <input type="text" class="form-control" placeholder="Nh???p ?????a ch??? nh???n h??ng" id="address" name="address">
                </div>
                <div class="form-group" id="dat-hang">
                  <span class="price_item">T???ng s??? ti???n: <?= $total ?> VN??</span>
                  <button type="submit" class="btn btn-success" style="float: right;"> ?????t h??ng</button>
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