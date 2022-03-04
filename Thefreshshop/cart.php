<?php
require_once('././ConnectionDatabase/Connection.php');
require_once('./utility.php');
  $cart = [];
  if (isset($_COOKIE['cart'])) {
    $json = $_COOKIE['cart'];
    $cart = json_decode($json, true);
}

  $mshhList = [];
  foreach ($cart as $item) {
    $mshhList[] = "'".$item['mshh']."'";
  }
  if(count($mshhList) >0){
    $mshhList = implode(',', $mshhList);
    $sql = 'select * from hanghoa where MSHH in ('.$mshhList.');';
    $cartList = executeResutl($sql);
  }else{
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
  <link rel="stylesheet" href="./css/cart.css">
</head>

<body style="background-color: #f5f5f5;">
  <div class="container">
    <?php
      include_once('./header.php');
    ?>
    
    <div class="content">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.php"><strong>The Fresh Shop</strong></a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
          </ol>
        </nav>
      <div class="list-product">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="width: 20px; text-align: center;">STT</th>
                  <th>Tên</th>
                  <th style="width: 105px;">Hình ảnh</th>
                  <th>Giá</th>
                  <th style="width: 130px; text-align: center;">Số Lượng</th>
                  <th>Tổng Tiền</th>
                  <th>Xóa</th>
                  
                </tr>
                
              </thead>
              <tbody>
              <?php             
                $STT = 0;
                $total = 0;
                  foreach($cartList as $item){
                    $num = 0;
                    foreach($cart as $value){
                      if($value['mshh'] == $item['MSHH']){
                        $num = $value['num'];
                        
                        break;
                      }
                    }
                    $total += $num * $item['Gia'];
                  
                    echo '
                      <tr class="align-middle">
                        <td class="align-middle" style="width: 20px; text-align: center;">'.(++$STT).'</td>
                        <td class="align-middle">'.$item['TenHH'].'</td>
                        <td class="align-middle"><img src="./img/' . $item['MaLoaiHang'] . '/' . $item['MSHH'] . '_1.jpg" alt="" width="100px"></td>
                        <td class="align-middle"><span class="price_item">'.$item['Gia'].' VNĐ</span></td>
                        
                        <td class="align-middle"><div class="input-group">

                        <span class="input-group-btn">
                          <button type="button" class="quantity-left-minus" data-type="minus" data-field="" onClick="remove(\'' . $item['MSHH'] . '\');updateToCart(\'' . $item['MSHH'] . '\',\'' . $item['MSHH'] . '\')">
                            -
                          </button>
                        </span>
                        <input type="text" id="' . $item['MSHH'] .'" name="quantity" class="input-number" value="'.$num.'" min="1" max="100"  disabled>
                        <span class="input-group-btn">
                          <button type="button" class="quantity-right-plus " data-type="plus" data-field="" onClick="add(\'' . $item['MSHH'] . '\');updateToCart(\'' . $item['MSHH'] . '\',\'' . $item['MSHH'] . '\')">
                            +
                          </button>
                        </span>
                        
                      </div></td>
                        <td class="align-middle"><span class="price_item">'.$num * $item['Gia'].'VNĐ</span></td>
                        <td class="align-middle">
                        <button class="btn btn-danger" onclick="deleteToCart(\''.$item['MSHH'].'\')">Xóa</button>
                        </td>
                      </tr>
                    ';
                  
                  }
                ?>
              </tbody>
            </table>
            <?php
              if($STT == 0){
                echo '<h3 class="align-middle">Bạn chưa có sản phẩm nào !!!</h3>';
                echo'
                <a href="./index.php"><button class="btn btn-success">Mua hàng ngay</button></a>
                ';
              }
            ?>
            <hr>
            <div>
              <span class="price_item">Tổng số tiền: <?=$total?> VNĐ</span>
              <a href="./KhachHang/thanhtoan.php"><button class="btn btn-success" style="float: right;"> Đặt hàng</button></a>
            </div>
              
              
          </div>
        </div>
      </div>
                  
                  
      <!--  -->
      <div class="footer">
      
      
      </div>
       
        
      
      <!--  -->
      <div class="footer-infor"></div>
          
        
    </div>
  </div>


  <script src="./js/digit.js"></script>
  <script src="./js/input-quantity.js"></script>
  <script src="./js/addToCart.js"></script>
</body>

</html>