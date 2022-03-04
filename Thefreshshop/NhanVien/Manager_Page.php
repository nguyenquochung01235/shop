<?php
$username = $_COOKIE['username'];

?>

<!-- Source Code -->
<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/2edec8b4fd.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/manager.css">

</head>

<body style="background-color: #f5f5f5;">
  <div class="container">
    <?php
    include_once('./header_nv.php');
    ?>

    <div class="content">
      <?php
        $sql_tongquan = "SELECT COUNT(SoDonDH), TrangThaiDH FROM dathang GROUP BY TrangThaiDH;";
        $sql_tongquan_result = executeResutl( $sql_tongquan);
        $cd = 0;
        $dd = 0;
        $dh = 0;
        $tc = 0;
        foreach ( $sql_tongquan_result as $tongquan) {
          switch ($tongquan['TrangThaiDH']) {
            case 'Đang Chờ Duyệt':
              $cd += $tongquan['COUNT(SoDonDH)'];
              break;
            case 'Đã Duyệt Đơn':
              $dd += $tongquan['COUNT(SoDonDH)'];
              break;
            case 'Đã Hủy Đơn':
              $dh += $tongquan['COUNT(SoDonDH)'];
              break;
            case 'Đã Thành Công':
              $tc += $tongquan['COUNT(SoDonDH)'];
              break;
            
           
          }
        }
        
      ?>
      <div class="tongquan">
        <div class="total" id="donchoduyet">
          <h4><strong>Số Đơn Chờ Duyệt</strong></h4>
          <strong>
            <p><?= $cd?> Đơn</p>
          </strong>
          <a href="./quanlydonhang.php?ttdh=dc">Liên hệ khách hàng để duyệt</a>
        </div>
        <div class="total" id="dondaduyet">
          <h4><strong>Số Đơn Đã Duyệt</strong></h4>
          <strong>
            <p><?= $dd?> Đơn</p>
          </strong>
          <a href="./quanlydonhang.php?ttdh=dd">Liên hệ bộ phận chuẩn bị hàng</a>
        </div>
        <div class="total" id="dondahuy">
          <h4><strong>Số Đơn Đã Hủy</strong></h4>
          <strong>
            <p><?= $dh?> Đơn</p>
          </strong>
          <a href="./quanlydonhang.php?ttdh=dh">Liên hệ chăm sóc khách hàng</a>
        </div>
        <div class="total" id="donthanhcong">
          <h4><strong>Số Đơn Thành Công</strong></h4>
          <strong>
            <p><?= $tc?> Đơn</p>
          </strong>
          <a href="/quanlydonhang.php?ttdh=tc">Liên hệ phòng kế toán</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <canvas id="myChart-2" width="400" height="400"></canvas>
        </div>

        <div class="col-md-6">
          <canvas id="myChart" width="400" height="400"></canvas>
        </div>



      </div>
      <div class="row">
        <div class="col-md-6">
          <h4>Danh sách sản phẩm bán chạy</h4>
          <table class="table">
            <thead>
              <tr>
                <th style="width: 20px; text-align: center;">STT</th>
                <th>Tên</th>
                <th style="text-align: center;">Số lượng</th>
                <th>Doanh thu</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $sql_hot = "SELECT hanghoa.MaLoaiHang,hanghoa.TenHH,hanghoa.Gia,hanghoa.SoLuongHang,chitietdathang.MSHH, SUM(chitietdathang.SoLuong) AS TSL, (chitietdathang.GiaDatHang * SUM(chitietdathang.SoLuong)) AS TT
              FROM chitietdathang, hanghoa
              WHERE hanghoa.MSHH = chitietdathang.MSHH
              GROUP BY chitietdathang.MSHH  
              ORDER BY TSL  DESC LIMIT 0,5";

              $sql_hot_resutl = executeResutl($sql_hot);
              $stt = 1;
              foreach ($sql_hot_resutl as $sphot) {
                $string_temp1 = "'".$sphot['MSHH']."'";
                
                echo'
                <tr>
                <td>'.$stt++.'</td>
                <td>'.$sphot['TenHH'].'</td>
                <td>'.$sphot['TSL'].'</td>
                <td><span class="price_item">'.$sphot['TT'].'</span>VNĐ</td>
              </tr>
                ';

              }
          ?>
              
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <h4>Biểu đồ sản phẩm bán chạy</h4>
          <canvas id="myChart-3"></canvas>
        </div>

      </div>


      <div class="footer-infor row">
          
      </div>
    </div>

  </div>




              <script src="../js/digit.js"></script>
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
  <!-- Chart 1 -->
  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
          label: 'Doanh Thu Theo Tháng',
          data: [12, 19, 3, 5, 2, 3, 1, 7, 9, 10, 11, 12],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

  <!-- Chart 2 -->
  <script>
    var xValues = ["Đang Chờ Duyệt", "Đã Duyệt", "Đã Hủy", "Đã Bán"];
    var yValues = [<?= $cd?>, <?= $dd?>, <?= $dh?>, <?= $tc?>];
    var barColors = [
      "#fd7e14",
      "#029df0",
      "#fd1414",
      "#238d00",
    ];

    new Chart("myChart-2", {
      type: "doughnut",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Tổng quan đơn hàng"
        }

      }
    });
  </script>

  <!-- Chart 3 -->
  <script>
    var xValues = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

    new Chart("myChart-3", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
          label: 'Áo Thun',
          borderColor: "red",
          fill: false
        }, {
          data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
          borderColor: "green",
          fill: false
        }, {
          data: [800, 700, 2000, 5000, 300, 4010, 2000, 1000, 200, 100],
          borderColor: "blue",
          fill: false
        }, {
          data: [100, 700, 2000, 5000, 800, 4000, 2000, 1000, 200, 100],
          borderColor: "black",
          fill: false
        }, {
          data: [600, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
          borderColor: "yellow",
          fill: false
        }]
      },
      options: {
        legend: {
          display: false
        }
      }
    });
  </script>
</body>

</html>