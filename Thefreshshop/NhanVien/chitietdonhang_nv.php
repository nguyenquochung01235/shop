<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
require_once('../API/capnhatdonhang.php');  
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
  <link rel="stylesheet" href="../css/tracuudonhang.css">
  <link rel="stylesheet" href="../css/manager.css">
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
          <li class="breadcrumb-item active" aria-current="page">Tra cứu đơn hàng</li>
          <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng số
            <?php
            echo $SoDonDH;
            ?>
          </li>
        </ol>
      </nav>

      <div class="list_order">
        <!-- <form method="post" action="./tracuudonhang.php" id="form_search_order">
          <div class="form-group">
            <label for="searchOrder"><strong>Tra cứu đơn hàng</strong></label>
            <input type="text" class="form-control" placeholder="Nhập số điện thoại đặt hàng" id="searchOrder" name="searchOrder">
            <button type="submit" class="btn btn-success">Tra cứu</button>
          </div>
        </form> -->
        <div class="table_search_order">
          <table class="table table-bordered" style="background-color: #fff;">
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
          

          <div class="infor_order row" style="margin-bottom: 50px;">

            <div class="col-md-6">
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
                    <strong>Số Đơn Hàng:  </strong><p id="donhang_'.$SoDonDH.'">
                    ' .$SoDonDH. '</p>
                    <p><strong>Tên Người Đặt Hàng:  </strong>' . $infor_order['HoTenKH'] . '</p>
                    <p><strong>Số Điện Thoại:  </strong>' . $infor_order['SoDienThoai'] . '</p>
                    <p><strong>Địa Chỉ Nhận Hàng:  </strong>' . $infor_order['DiaChi'] . '</p>
                    <span class="price_item"><strong>Tổng số tiền: </strong>'.$total.' VNĐ</span>
                    ';
              }
              ?>
            </div>

            <div class="col-md-6">
            <?php
                $sql_ttdh = "SELECT TrangThaiDH FROM dathang WHERE SoDonDH = $SoDonDH;";
                $result_ttdh = executeResutl($sql_ttdh);
                $msnv = "'$username'";
                foreach ($result_ttdh as $chitiet_ttdh) {
                  

                  // 
                  switch ($chitiet_ttdh['TrangThaiDH']) {
  
                    case 'Đang Chờ Duyệt':
                      $ttdh = '
                      <select id="trangthaidonhang_'.$SoDonDH.'"  class="form-select">
                      <option selected="selected" value="Đang Chờ Duyệt">Đang Chờ Duyệt</option>
                      <option value="Đã Duyệt Đơn">Đã Duyệt Đơn</option>
                      <option value="Đã Hủy Đơn">Đã Hủy Đơn</option>
                      <option  value="Đã Thành Công">Đã Thành Công</option>
                      </select>
                      
                      ';
                      $ttdh_now = "'dc'";
                      break;
                    case 'Đã Duyệt Đơn':
                      $ttdh = '
                      <select id="trangthaidonhang_'.$SoDonDH.'"  class="form-select">
                      <option value="Đang Chờ Duyệt">Đang Chờ Duyệt</option>
                      <option selected="selected" value="Đã Duyệt Đơn">Đã Duyệt Đơn</option>
                      <option value="Đã Hủy Đơn">Đã Hủy Đơn</option>
                      <option value="Đã Thành Công">Đã Thành Công</option>
                      </select>
                      ';
                      $ttdh_now = "'dd'";
                      break;
                    case 'Đã Hủy Đơn':
                      $ttdh = '
                      <select id="trangthaidonhang_'.$SoDonDH.'"  class="form-select">
                      <option value="Đang Chờ Duyệt">Đang Chờ Duyệt</option>
                      <option value="Đã Duyệt Đơn">Đã Duyệt Đơn</option>
                      <option selected="selected"  value="Đã Hủy Đơn">Đã Hủy Đơn</option>
                      <option value="Đã Thành Công">Đã Thành Công</option>
                      </select>
                      ';
                      $ttdh_now = "'dh'";
                      break;
                    case 'Đã Thành Công':
                      $ttdh = '
                      <select id="trangthaidonhang_'.$SoDonDH.'"  class="form-select">
                      <option value="Đang Chờ Duyệt">Đang Chờ Duyệt</option>
                      <option value="Đã Duyệt Đơn">Đã Duyệt Đơn</option>
                      <option value="Đã Hủy Đơn">Đã Hủy Đơn</option>
                      <option  selected="selected" value="Đã Thành Công">Đã Thành Công</option>
                      </select>
                      ';
                      $ttdh_now = "'tc'";
                      break;
                   
                     
                  }

                  // 

                  echo '
                  <strong>XÉT DUYỆT ĐƠN HÀNG</strong>
                  <br>
                  <p><strong>Trạng Thái Đơn Hàng:  </strong>' . $chitiet_ttdh['TrangThaiDH']. '</p>
                  <div class="update_chitiet" style="display = flex;align-items: center;">
                  '.$ttdh.'
                  <button onclick="updateOrder('.$SoDonDH.','.$msnv.','.$ttdh_now.')" class="btn btn-success">Cập Nhật</button>
                  </div>
                  ';
                }
              ?>
            </div>

            <br>
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

  <script src=".././js/digit.js"></script>
  <script src=".././js/updateorder.js"></script>
</body>

</html>