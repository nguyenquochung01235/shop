<!-- Source Code -->
<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
?>

<?php
$username = $_COOKIE['username'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Đơn Hàng</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/2edec8b4fd.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/manager.css">
  <link rel="stylesheet" href="../css/quanlysanpham.css">


</head>

<body style="background-color: #f5f5f5;">
  <div class="container">
    <?php
    include_once('./header_nv.php');
    ?>

    <div class="content">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php" style="color: black;"><strong>The Fresh Shop</strong></a></li>
          <li class="breadcrumb-item active" aria-current="page">Quản lý đơn hàng</li>
          <!-- <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng số</li> -->
        </ol>
      </nav>

      <div class="item">
        <div class="fillter_item " style="height: fit-content; ">
          <nav id="navbar-example3" class="navbar ">

            <nav class="nav nav-pills flex-column">
              <a class="nav-link disabled" href="#">Danh Mục</a>
              <nav class="nav nav-pills flex-column">
                <a class="nav-link ml-3 my-1" href="quanlysanpham.php">Tất Cả Sản Phẩm</a>
              </nav>
              <hr>
              <nav class="nav nav-pills flex-column">
                <a class="nav-link disabled" href="#">Áo</a>
                <nav class="nav nav-pills flex-column">
                  <a class="nav-link ml-3 my-1" href="quanlysanpham.php?item=AT">Áo Thun</a>
                  <a class="nav-link ml-3 my-1" href="quanlysanpham.php?item=AK">Áo Khoác</a>
                </nav>
                <hr>
                <a class="nav-link disabled" href="">Quần</a>
                <nav class="nav nav-pills flex-column">
                  <a class="nav-link ml-3 my-1" href="quanlysanpham.php?item=QJ">Quần Jean</a>
                  <a class="nav-link ml-3 my-1" href="quanlysanpham.php?item=QT">Quần Tây</a>
                </nav>
                <hr>
                <a class="nav-link disabled" href="#">Giày, Dép</a>
                <nav class="nav nav-pills flex-column">
                  <a class="nav-link ml-3 my-1" href="quanlysanpham.php?item=GD">Giày</a>
                  <a class="nav-link ml-3 my-1" href="quanlysanpham.php?item=GD">Dép</a>
                </nav>

              </nav>
            </nav>
        </div>
        <div class="all-item-list">
          <div class="search-item" >
            <button class="btn btn-primary"><a href="./addnewitem.php">Thêm Sản Phẩm Mới</a></button>
            <form class="form-inline my-2 my-lg-0 mr-auto" method="get" action="quanlysanpham.php?item= ">
              <input class="form-control mr-sm-2" type="search" placeholder="Nhập Tên Hàng Hóa Hoặc Mã Loại Hàng" aria-label="Search" style="width: 350px;" name="item">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm
              </button>


            </form>
          </div>
          <p>* Click để chỉnh sửa sản phẩm</p>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="align-middle" style="text-align: center;">MSHH</th>
                <th class="align-middle" style="text-align: center;">Tên HH</th>
                <th class="align-middle" style="text-align: center;">Hình</th>
                <th class="align-middle" style="text-align: center;">Mô Tả</th>
                <th class="align-middle" style="text-align: center;">Giá</th>
                <th class="align-middle" style="text-align: center;">Số Lượng</th>
              </tr>
            </thead>
            <tbody>

              <?php
              if (!empty($_GET['item'])) {
                $item = $_GET['item'];
                if(strlen($item) <5){
                  $query_item = "WHERE MaLoaiHang = '" .  $item . "' ORDER BY `MaLoaiHang` ASC";
                }else{
                  $query_item = "WHERE TenHH Like '%" .  $item . "%' ORDER BY `MaLoaiHang` ASC";
                }
                
              } else {
                $item = '';
                $query_item = "";
              }

              $sql_hanghoa = "SELECT * FROM hanghoa " .  $query_item;
              $sql_hanghoa_result = executeResutl($sql_hanghoa);
              foreach ($sql_hanghoa_result as $hanghoa) {
                echo '
                    <tr class="clickable-row" data-href="./updateitem.php?item=' . $hanghoa['MSHH'] . '">
                      <td class="align-middle" style="text-align: center;">' . $hanghoa['MSHH'] . '</td>
                      <td class="align-middle" style="text-align: center;">' . $hanghoa['TenHH'] . '</td>
                      <td class="align-middle" style="text-align: center;"><img style="width: 140px;" src="../img/' . $hanghoa['MaLoaiHang'] . '/' . $hanghoa['MSHH'] . '_1.jpg" alt=""></td>
                      <td class="align-middle mo-ta" style="text-align: center; width: 250px;">' . $hanghoa['QuyCach'] . '</td>
                      <td class="align-middle" style="text-align: center;">
                      <span class="price_item">' . $hanghoa['Gia'] . '</span> VNĐ
                      </td>
                      <td class="align-middle" style="text-align: center;">' . $hanghoa['SoLuongHang'] . '</td>
                  </tr>
                    ';
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>





  <script>
    $(document).ready(function() {
      $('[data-toggle="popover"]').popover();
    });

    var timeDisplay = document.getElementById("time");


    function refreshTime() {
      var dateString = new Date().toLocaleString("en-US", {
        timeZone: "Asia/Bangkok"
      });
      var formattedString = dateString.replace(", ", " - ");
      timeDisplay.innerHTML = formattedString;
    }

    setInterval(refreshTime, 1000);
  </script>

  
<script>
    $(document).ready(function() {
      $('.mo-ta').each(function(i) {
        var len = $(this).text().trim().length;
        if (len > 200) {
          $(this).text($(this).text().substr(0, 200) + '...');
        }
      });
    });


    if (window.history.replaceState) {
              window.history.replaceState(null, null, window.location.href);
            }  

            jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
          window.location = $(this).data("href");
    });
    });
  </script>
  <script src="../js/digit.js"></script>
</body>

</html>