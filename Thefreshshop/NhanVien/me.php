<!-- Source Code -->
<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
?>

<?php
$username = $_COOKIE['username'];
$sql_chitietnv = "SELECT * FROM nhanvien WHERE msnv = '$username'";
$sql_chitietnv_result = executeResutl($sql_chitietnv);

foreach ($sql_chitietnv_result as $nhanvien) {
}
?>

<?php
  $name = getPost('name');
  $phone = getPost('phone');
  $address = getPost('address');
  $email = getPost('email');
  $password = getPost('password');
  
  if(!empty($_POST['phone']) && $_POST['phone'] != ''){
    $sql_update_nv = "UPDATE nhanvien SET HoTenNV='$name',DiaChi='$address' ,SoDienThoai='$phone', Password = '$password' WHERE MSNV = '$username';";
    execute($sql_update_nv);
    header("Refresh:0");
  }
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
      <div class="row">
        <div class="col col-md-6">
          <form method="post" action="./me.php">
            <div class="form-group">
              <h4>MSNV: <?= $username ?> / Ch???c v???: <?= $nhanvien['ChucVu'] ?></h4>
            </div>
            <div class="form-group">
              <label for="name">H??? T??n NV</label>
              <input type="text" class="form-control" id="name" placeholder="Nh???p h??? t??n" value="<?= $nhanvien['HoTenNV'] ?>" name="name">
            </div>
            <div class="form-group">
              <label for="phone">S??? ??i???n Tho???i</label>
              <input type="text" class="form-control" id="phone" placeholder="Nh???p S??? ??i???n Tho???i" value="<?= $nhanvien['SoDienThoai'] ?>" name="phone">
            </div>
            <div class="form-group">
              <label for="address">?????a Ch???</label>
              <input type="text" class="form-control" id="address" placeholder="Nh???p ?????a Ch???" value="<?= $nhanvien['DiaChi'] ?>" name="address">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Nh???p Email" value="<?= $nhanvien['MSNV'] . '@fresh586.staff.com' ?>" name="email">
            </div>
            <div class="form-group">
              <label for="password">M???t Kh???u</label>
              <input type="text" class="form-control" id="password" placeholder="Nh???p Password" value="<?= $nhanvien['Password'] ?>" name="password">
            </div>
            <button type="submit" class="btn btn-primary" style="float: right;">C???p nh???t</button>
          </form>
        </div>
        <div class="col col-md-6">
          <h4>T???ng K???t Qu??? L??m Vi???c</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="align-middle" style="text-align: center;">???? Duy???t</th>
                <th class="align-middle" style="text-align: center;">???? H???y</th>
                <th class="align-middle" style="text-align: center;">Th??nh C??ng</th>
                <th class="align-middle" style="text-align: center;">Th??nh T??ch</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql_kqlv = "SELECT COUNT(SoDonDH), TrangThaiDH FROM dathang WHERE MSNV = '$username' GROUP BY TrangThaiDH;";
              $ddd = 0;
                $dhd = 0;
                $dtc = 0;
              $sql_kqlv_result = executeResutl($sql_kqlv);
              if ($sql_kqlv_result == null) {
              } else {
                
                foreach ($sql_kqlv_result as $kqlv) {
                  // echo '<td> kq = '.$kqlv['COUNT(SoDonDH)'].'</td>';
                  if ($kqlv['TrangThaiDH'] == '???? Duy???t ????n') {
                    $ddd = $kqlv['COUNT(SoDonDH)'];
                  } else {
                    if ($kqlv['TrangThaiDH'] == '???? H???y ????n') {
                      $dhd = $kqlv['COUNT(SoDonDH)'];
                    } else {
                      $dtc = $kqlv['COUNT(SoDonDH)'];
                      
                    }
                  }
                }
              }


              ?>
              <tr>
                <td class="align-middle" style="text-align: center;"><?= $ddd  ?></td>
                <td class="align-middle" style="text-align: center;"><?= $dhd ?></td>
                <td class="align-middle" style="text-align: center;"> <?= $dtc ?></td>
                <td class="align-middle" style="text-align: center;"><?php
                  if($dtc <= 5){
                    echo '<button class="btn btn-warning disabled">C???n C??? G???ng Th??m</button>';
                  }else{
                    echo' <button class="btn btn-success disabled">Th??nh T??ch T???t</button>';
                  }
                
                ?></td>

              </tr>
            </tbody>
          </table>
          <div class="thanhtich">
            <h5>Th??nh T??ch</h5>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada suscipit mi, vitae luctus odio malesuada a. Sed vitae rutrum tellus. Ut mi lacus, commodo sed volutpat nec, varius sit amet ante. Nunc a tempus nisl. Donec sit amet dictum nisl, nec bibendum quam. Sed nisl diam, convallis quis tristique sit amet, rutrum ac nibh. Suspendisse pharetra nibh ultricies dui faucibus tincidunt. Aliquam eleifend egestas lacinia. Proin convallis quis neque quis interdum. Sed eu eros urna. In ut metus in arcu aliquam gravida. Duis lacinia molestie eros sed venenatis. Donec bibendum ligula non ultricies congue. Phasellus consectetur sagittis commodo.
            </p>
          </div>
        </div>
      </div>

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
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>