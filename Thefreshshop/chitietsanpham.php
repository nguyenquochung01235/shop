<!-- CONNECT TO DATABASE -->
<?php
require_once('././ConnectionDatabase/Connection.php');

if (!empty($_POST['search'])) {
  $searchItem = $_POST['search'];
} else {
  $searchItem = '';
}
$MSHH = $_GET['MSHH'];
$sql = 'select * from hanghoa, hinhhanghoa where hanghoa.mshh = "' . $MSHH . '" and hanghoa.mshh = hinhhanghoa.mshh;';
$result = executeResutl($sql);
if (!empty($result)) {
  foreach ($result as $hanghoa) {
  }
}

$string_temp = "'".$MSHH."'";

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
  <script src="./js/input-quantity.js"></script>
  <link rel="stylesheet" href="./css/chitietsanpham.css">
</head>

<body style="background-color: #f5f5f5;">
  <div class="container">
    <?php
      include_once('./header.php');
    ?>
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
                <p>Th???i trang t???o n??n ch???t l?????ng cu???c s???ng</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/introduction_item2.png" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Black Friday</h5>
                <p>Si??u sale ng??y ??en t???i</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/introduction_item3.png" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Khuy???n M??i</h5>
                <p>??u ????i b???t t???n, mua ????? nh???n qu??</p>
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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi Ti???t S???n Ph???m</li>
            <?php
            echo '<li class="breadcrumb-item active" aria-current="page">' . $hanghoa['TenHH'] . '</li>';
            ?>
          </ol>
        </nav>
      </div>
      <br>
      <div class="description">
        <?php
          $sql_daban = "SELECT SUM(SoLuong) FROM chitietdathang WHERE MSHH = $string_temp;";
          $sql_daban_result = executeResutl($sql_daban);
        if (!empty($result)) {
          foreach ($result as $hanghoa) {
          }

          echo '
            <div class="img-description">
              <div class="slide-img">
                <button class="btn-img" id="btn-img-left" onclick="prev()"><i class="fa fa-arrow-left"></i></button>
                <img src="./img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['MSHH'] . '_1.jpg" alt="" class="img_item face_index" id="img_1">
                <img src="./img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['MSHH'] . '_2.jpg" alt="" class="img_item" id="img_2">
                <img src="./img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['MSHH'] . '_3.jpg" alt="" class="img_item" id="img_3">
                <button class="btn-img" id="btn-img-right" onclick="next()"><i class="fa fa-arrow-right"></i></button>
              </div>
              <div class="img_btn">
                <img  onclick="selectImg(1)" src="./img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['MSHH'] . '_1.jpg" alt="" class="img_btn_child btn_border" id="img_1_1">
                <img  onclick="selectImg(2)" src="./img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['MSHH'] . '_2.jpg" alt="" class="img_btn_child" id="img_2_2">
                <img onclick="selectImg(3)" src="./img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['MSHH'] . '_3.jpg" alt="" class="img_btn_child" id="img_3_3">
              </div>
              // social
              <div class="social">
              
              <ul>
                <li>Chia S???: </li>
                <li style="width: 20px; border-radius: 100px;"><img style="width: 30px; border-radius: 100px;" src="https://image.pngaaa.com/707/5797707-middle.png" alt=""></li>
                <li style="width: 20px; border-radius: 100px;"><img style="width: 30px; border-radius: 100px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/1024px-Facebook_Logo_%282019%29.png" alt=""></li>
                <li style="width: 20px; border-radius: 100px;"><img style="width: 30px; border-radius: 100px;" src="https://the7.vn/wp-content/uploads/2019/09/instagram-png-instagram-png-logo-1455.png" alt=""></li>
                <li style="width: 20px; border-radius: 100px;"><img style="width: 30px; border-radius: 100px;" src="https://toppng.com/uploads/preview/format-twitter-logo-transparent-11549680770lolovrdq8m.png" alt=""></li>
              </ul>
            </div>
            </div>
            

            <div class="item-description">
              <h4>' . $hanghoa['TenHH'] . '</h4>
              <hr>
              <div class="rating">
                <ul>
                  <li id="rating-star">5.0 <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                  <li id="danh-gia">39 ????nh Gi??</li>
                  <li id="da-ban">'.( 0 + $sql_daban_result[0]['SUM(SoLuong)'] ).' ???? B??n</li>
                </ul>
              </div>
              <span class="price_item">Gi??: ' . $hanghoa['Gia'] . ' VN??</span>

              <span id="flash-sale-icon"><i class="fa fa-bolt"></i> Flash Sale</span>
              <hr>
              <div class="quy-cach">
                <strong>M?? t??? s???n ph???m</strong>
                <p><strong>T??n s???n ph???m: </strong> ' . $hanghoa['TenHH'] . '.</p>
                <p><strong>M?? t???: </strong> ' . $hanghoa['QuyCach'] . '</p>
              </div>
              <div class="soluongconlai">
                <p>S??? l?????ng c??n l???i l?? ' . $hanghoa['SoLuongHang'] . ' c??i</p>
              </div>
              <div class="add-to-basket">
                <strong>S??? l?????ng: </strong>
                <div class="input-group">

                  <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus" data-type="minus" data-field="">
                      -
                    </button>
                  </span>
                  <input type="text" id="quantity" name="quantity" class=" input-number" value="1" min="1" max="100">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-right-plus " data-type="plus" data-field="">
                      +
                    </button>
                  </span>
                </div>

                <div>
                  <button class="btn-add" onclick="addToCart('.$string_temp.')"><i class="fa fa-shopping-cart"></i>Th??m V??o Gi??? H??ng</button>
                </div>
              </div>

            </div>     
            ';
            
        } else {
          echo '<script>
            alert("Kh??ng T??m Th???y K???t Qu???");          
            </script>';
        }
        ?>




      </div>
      <hr>
      
      

      <p>C??c S???n Ph???m T????ng T???</p>
      <div class="suggestions all-item-list row row-cols-6">
        <?php
          $sql_suggestions = 'SELECT * FROM `hanghoa`  WHERE hanghoa.MaLoaiHang ="'.$hanghoa['MaLoaiHang'].'" ORDER BY `SoLuongHang` DESC LIMIT 0,5';
          $result_suggestions = executeResutl($sql_suggestions);
          foreach($result_suggestions as $hanghoa){
            $string_temp = "'".$hanghoa['MSHH']."'";
            echo '
            <div class="col" id="item_card">
              <a href="chitietsanpham.php?MSHH='.$hanghoa['MSHH'].'"><img src="./img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['MSHH'] . '_1.jpg" alt="" width="100px"></a>
              <a href=""><strong class="title_name_item" maxlength="15">' . $hanghoa['TenHH'] . '</strong></a>
              <p>Gi??: <span class="price_item" id="price_item">' . $hanghoa['Gia'] . '</span> VN??</p>
              <div class="buy_item">
                <p>S??? L?????ng: ' . $hanghoa['SoLuongHang'] . '</p>
                <button onclick="addToCart('. $string_temp.')">Th??m v??o gi???</button>
              </div>
           </div>
            
            ';
          }
        ?>
        
        
      </div>

      <hr>

      <div class="footer">
         
      </div>
      <div class="footer-infor"></div>

    </div>
  </div>
  <!-- test -->
          

  <script src="./js/digit.js"></script>
  <script src="./js/addToCart.js"></script>
  <script src="./js/Next-and-Prev.js"></script>

 
</body>