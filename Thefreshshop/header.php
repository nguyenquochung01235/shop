<div class="header fixed-top mr-auto">
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
            <a class="dropdown-item" href="fillter_item.php?item=all">Sản phẩm khác</a>

          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./KhachHang/tracuudonhang.php">Tra Cứu Đơn Hàng </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-auto" method="post" action="index.php">
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
          <a class="nav-link dropdown-toggle" href="./cart.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <td class="align-middle"><img src="./img/' . $item['MaLoaiHang'] . '/' . $item['MSHH'] . '_1.jpg" alt="" width="50px"></td>                    
                                
                              
                                
                              </tr>
                        ';
                          if($slsp > 4){
                            
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
              if($slsp == 0){
                echo '<h5 style="text-align: center">Bạn chưa có sản phẩm nào !!!</h5>';
              }
            ?>
                </div>
              </div>
            </div>
            <hr>
            <div class="see-more" style="text-align: center;">
            <?php
              if($slsp == 0){
                echo ' <a href="./index.php"><button class="btn btn-success">Mua Sắm Ngay</button></a>';
              }else{
                echo '<a href="./cart.php"><button class="btn btn-success">Chi Tiết Giỏ Hàng</button></a>';
              }
            ?>
              
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./NhanVien/DangNhap_NhanVien.php" style="font-size: 11px; line-height: 25px;"> Đăng Nhập</a>
        </li>
      </ul>
    </div>
  </nav>
</div>