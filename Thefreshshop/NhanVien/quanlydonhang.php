<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
require_once('../API/capnhatdonhang.php');
?>

<?php


$username = $_COOKIE['username'];
$msnv = "'$username'";
if(!empty($_GET['ttdh'])){
  $ttdh_now = "'".$_GET['ttdh']."'";
}else{
  $ttdh_now = 'dc';
}

if(!empty($_GET['ttdh'])){
  $checkOrder = $_GET['ttdh'];
}else{
  $checkOrder = 'dc';
}

$search = getGet('search');
if($search==''){
  $sql_search = '';
}else{
  $searchkq = "'$search'";
  $sql_search = "AND khachhang.MSKH = " . $searchkq;
}






switch ($checkOrder) {
  
  case 'dc':
    $sql ='SELECT dathang.SoDonDH, khachhang.HoTenKH, khachhang.SoDienThoai, diachikh.DiaChi,dathang.MSNV ,dathang.NgayDH, dathang.TrangThaiDH
    FROM dathang, khachhang, diachikh
    WHERE dathang.SoDonDH = diachikh.MaDC
    AND dathang.MSKH = khachhang.MSKH
    '. $sql_search .'
    AND dathang.TrangThaiDH LIKE "Đang chờ duyệt" ORDER BY SoDonDH DESC;';

    break;
  case 'dd':
    $sql ='SELECT dathang.SoDonDH, khachhang.HoTenKH, khachhang.SoDienThoai, diachikh.DiaChi, dathang.MSNV ,dathang.NgayDH,dathang.NgayGH, dathang.TrangThaiDH, nhanvien.HoTenNV
    FROM dathang, khachhang, diachikh, nhanvien
    WHERE dathang.SoDonDH = diachikh.MaDC
    AND dathang.MSKH = khachhang.MSKH
    AND dathang.MSNV = nhanvien.MSNV
    '. $sql_search .'
    AND dathang.TrangThaiDH LIKE "Đã duyệt đơn" ORDER BY SoDonDH DESC; ';

    break;
  case 'dh':
    $sql ='SELECT dathang.SoDonDH, khachhang.HoTenKH, khachhang.SoDienThoai, diachikh.DiaChi, dathang.MSNV ,dathang.NgayDH,dathang.NgayGH, dathang.TrangThaiDH, nhanvien.HoTenNV
    FROM dathang, khachhang, diachikh, nhanvien
    WHERE dathang.SoDonDH = diachikh.MaDC
    AND dathang.MSKH = khachhang.MSKH
    AND dathang.MSNV = nhanvien.MSNV
    '. $sql_search .'
    AND dathang.TrangThaiDH LIKE "Đã hủy đơn" ORDER BY SoDonDH DESC;';
    break;
  case 'tc':
    $sql ='SELECT dathang.SoDonDH, khachhang.HoTenKH, khachhang.SoDienThoai, diachikh.DiaChi, dathang.MSNV ,dathang.NgayDH,dathang.NgayGH, dathang.TrangThaiDH, nhanvien.HoTenNV
    FROM dathang, khachhang, diachikh, nhanvien
    WHERE dathang.SoDonDH = diachikh.MaDC
    AND dathang.MSKH = khachhang.MSKH
    AND dathang.MSNV = nhanvien.MSNV
    '. $sql_search .'
    AND dathang.TrangThaiDH LIKE "Đã thành công" ORDER BY SoDonDH DESC;';
    break;
}
  $result = executeResutl($sql);

  
?>

<!-- Source Code -->

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
  <link rel="stylesheet" href="../css/quanlydonhang.css">

</head>

<body style="background-color: #f5f5f5;">
  <div class="container">
    <?php
    include_once('./header_nv.php');
    ?>
    
    <div class="content">
      <div class="filter">
        <a href="./quanlydonhang.php?ttdh=dc&search=<?=$search?>"><button class="btn btn-warning" 
          <?php
          if($checkOrder == 'dc'){
            echo 'style="border: 5px solid #f8cb42"';
          }
            
          ?>
        >Đang chờ duyệt</button></a>
        <a href="./quanlydonhang.php?ttdh=dd&search=<?=$search?>"><button class="btn btn-primary"
        <?php
          if($checkOrder == 'dd'){
            echo 'style="border: 5px solid #4d91f6"';
          }
            
          ?>
        >Đã duyệt đơn</button></a>
        <a href="./quanlydonhang.php?ttdh=dh&search=<?=$search?>"><button class="btn btn-danger"
        <?php
          if($checkOrder == 'dh'){
            echo 'style="border: 5px solid #fa6271"';
          }
            
          ?>
        >Đã hủy đơn</button></a>
        <a href="./quanlydonhang.php?ttdh=tc&search=<?=$search?>"><button class="btn btn-success"
        <?php
          if($checkOrder == 'tc'){
            echo 'style="border: 5px solid #39936a"';
          }
            
          ?>
        >Đã thành công</button></a>
      </div>
      <div class="row">
        <p>* Click để xem chi tiết đơn hàng</p>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="20px" class="align-middle" style="text-align: center;">MSDH</th>
              <th width="250px">Thông Tin Đặt Hàng</th>
              <th width="180px"style="text-align: center;">Nhân Viên Duyệt</th>
              <th width="150px"style="text-align: center;">Ngày Đặt Hàng</th>
              <th width="150px"style="text-align: center;">Ngày Giao Hàng</th>
              <th width="180px"style="text-align: center;">Trạng Thái ĐH</th>
              <th style="text-align: center;">Cập Nhật</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($result as $quanlydonhang) {
              
              if(isset($quanlydonhang['HoTenNV'])){
                $nhanvien = $quanlydonhang['HoTenNV'];
              }else {
                $nhanvien = '';
              }
              if(isset($quanlydonhang['NgayGH'])){
                $quanlydonhang['NgayGH'];
              }else {
                $quanlydonhang['NgayGH'] = '';
              }

              
              // Test-------------------------------
              $sql_chitietdathang = "SELECT SoDonDH, SoLuong, GiaDatHang FROM chitietdathang WHERE SoDonDH = ".$quanlydonhang['SoDonDH'].";";
                      $sql_chitietdathang_result = executeResutl($sql_chitietdathang);
                      $sl_item = 0;
                      $tongtien = 0;
                      foreach ($sql_chitietdathang_result as $chitietdathang) {
                        $sl_item +=$chitietdathang['SoLuong'];
                        $tongtien +=$chitietdathang['SoLuong'] * $chitietdathang['GiaDatHang'];
                      }
              // Test-------------------------------
              switch ($checkOrder) {
  
                case 'dc':
                  $ttdh = '
                  <select id="trangthaidonhang_'.$quanlydonhang['SoDonDH'].'"  class="form-select">
                  <option selected="selected" value="Đang Chờ Duyệt">Đang Chờ Duyệt</option>
                  <option value="Đã Duyệt Đơn">Đã Duyệt Đơn</option>
                  <option value="Đã Hủy Đơn">Đã Hủy Đơn</option>
                  <option  value="Đã Thành Công">Đã Thành Công</option>
                  </select>
                  ';
              
                  break;
                case 'dd':
                  $ttdh = '
                  <select id="trangthaidonhang_'.$quanlydonhang['SoDonDH'].'"  class="form-select">
                  <option value="Đang Chờ Duyệt">Đang Chờ Duyệt</option>
                  <option selected="selected" value="Đã Duyệt Đơn">Đã Duyệt Đơn</option>
                  <option value="Đã Hủy Đơn">Đã Hủy Đơn</option>
                  <option value="Đã Thành Công">Đã Thành Công</option>
                  </select>
                  ';
              
                  break;
                case 'dh':
                  $ttdh = '
                  <select id="trangthaidonhang_'.$quanlydonhang['SoDonDH'].'"  class="form-select">
                  <option value="Đang Chờ Duyệt">Đang Chờ Duyệt</option>
                  <option value="Đã Duyệt Đơn">Đã Duyệt Đơn</option>
                  <option selected="selected"  value="Đã Hủy Đơn">Đã Hủy Đơn</option>
                  <option value="Đã Thành Công">Đã Thành Công</option>
                  </select>
                  ';
              
                  break;
                case 'tc':
                  $ttdh = '
                  <select id="trangthaidonhang_'.$quanlydonhang['SoDonDH'].'"  class="form-select">
                  <option value="Đang Chờ Duyệt">Đang Chờ Duyệt</option>
                  <option value="Đã Duyệt Đơn">Đã Duyệt Đơn</option>
                  <option value="Đã Hủy Đơn">Đã Hủy Đơn</option>
                  <option  selected="selected" value="Đã Thành Công">Đã Thành Công</option>
                  </select>
                  ';
              
                  break;
               
                 
              }

              echo '
                <tr>
                  <td class="align-middle clickable-row" data-href="./chitietdonhang_nv.php?SoDonDH='.$quanlydonhang['SoDonDH'].'" style="text-align: center;"><p id="donhang_'.$quanlydonhang['SoDonDH'].'">'.$quanlydonhang['SoDonDH'].'</p></td>
                  <td class="align-middle clickable-row" data-href="./chitietdonhang_nv.php?SoDonDH='.$quanlydonhang['SoDonDH'].'">
                    <strong>Tên KH:</strong><span style="margin-left: 10px;">'.$quanlydonhang['HoTenKH'].'</span>
                    <br>
                    <strong>SĐT:</strong><span style="margin-left: 10px;">'.$quanlydonhang['SoDienThoai'].'</span>
                    <br>
                    <strong>Địa chỉ:</strong><span style="margin-left: 10px;">'.$quanlydonhang['DiaChi'].'</span>
                    <br>
                    <strong>Số món:</strong><span style="margin-left: 10px;">'.$sl_item.'</span>
                    <br>
                    <strong>Tổng tiền:</strong><span class = "price_item" style="margin-left: 10px;">'.$tongtien.' VNĐ</span>
                  </td>
                  <td class="align-middle clickable-row" data-href="./chitietdonhang_nv.php?SoDonDH='.$quanlydonhang['SoDonDH'].'" style="text-align: center;" >'.$nhanvien.'</td>
                  <td class="align-middle clickable-row" data-href="./chitietdonhang_nv.php?SoDonDH='.$quanlydonhang['SoDonDH'].'" style="text-align: center;">'.$quanlydonhang['NgayDH'].'</td>
                  <td class="align-middle clickable-row" data-href="./chitietdonhang_nv.php?SoDonDH='.$quanlydonhang['SoDonDH'].'" style="text-align: center;">'.$quanlydonhang['NgayGH'].'</td>
                  <td class="align-middle" style="text-align: center;">
                    '.$ttdh.'
                  </td>
                  <td class="align-middle" style="text-align: center;"><button onclick="updateOrder('.$quanlydonhang['SoDonDH'].','.$msnv.','.$ttdh_now.')" class="btn btn-success">Cập Nhật</button></td>
                </tr>
              
              ';
            }
              
            ?>
            
          </tbody>
        </table>
      </div>

            
      <div class="footer-infor row">
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
    jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
          window.location = $(this).data("href");
        });
        });
  </script>

  <script src="../js/updateorder.js"></script>
  <script src="../js/digit.js"></script>
  
</body>

</html>