<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
?>
<?php
$username = $_COOKIE['username']; 
  if(!empty($_POST) && !empty($_POST['msnvAdd'])){
    $msnv = $_POST['msnvAdd'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pwd = $_POST['pwd'];
    
    $sql_add_nhanvien = "INSERT INTO nhanvien(MSNV, HoTenNV, ChucVu, DiaChi, SoDienThoai, Password) VALUES ('$msnv', '$name','$position','$address','$phone','$pwd');";
    execute($sql_add_nhanvien);
    echo '<script>alert("Đã Thêm Thành Công Nhân Viên '.$name.'");</script>';
    $_POST = null;
   header("Refresh:0");
  }


  if(!empty($_GET['msnvDelete'])){
    $msnvDelete = $_GET['msnvDelete'];     
    $sql_delete_nhanvien = "DELETE FROM nhanvien WHERE MSNV = '$msnvDelete'";
    execute($sql_delete_nhanvien);
    echo '<script>alert("Đã xóa nhân viên !!!");</script>';
    $_GET = null;
    header("Location: quanlynhansu.php");
  }

  if(!empty($_POST) && !empty($_POST['msnvUpdateForm'])){
    $msnv = $_POST['msnvUpdateForm'];
    $name = $_POST['nameUpdateForm'];
    $position = $_POST['positionUpdateForm'];
    $phone = $_POST['phoneUpdateForm'];
    $address = $_POST['addressUpdateForm'];
    $pwd = $_POST['pwdUpdateForm'];
    $sql_update_nhanvien = "UPDATE nhanvien SET HoTenNV = '$name', ChucVu ='$position', DiaChi = '$address', SoDienThoai = ' $phone', Password = '$pwd' WHERE MSNV = '$msnv';";

    execute($sql_update_nhanvien);
    $_POST = null;
   header("Refresh:0");
  }



?>

<!-- Source Code -->

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
  <link rel="stylesheet" href="../css/quanlynhansu.css">
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
          <li class="breadcrumb-item active" aria-current="page">Quản Lý Nhân Sự</li>
        </ol>
      </nav>
      <button class="btn btn-primary" style="margin-bottom: -30px;" onclick="openForm('form-add')">Thêm Nhân Viên</button>
      <div class="content-add" id="form-add">
       <div class="addNhanVien">
          <div class="col col-md-12">
            <form action="./quanlynhansu.php" method="post" >
             <h4 style="text-align: center;">Thêm Nhân Viên Mới</h4>
              <div class="form-group">
                <label>Mã Số NV</label>
                <input type="text" class="form-control" placeholder="Nhập mã số nhân viên" id="msnv" name="msnvAdd">
              </div>
              <div class="form-group">
                <label>Họ Tên NV</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên nhân viên" id="name" name="name">
              </div>
              <div class="form-group">
                <label>Chức vụ</label>
                <select class="form-control" name="position">
                  <option>Bán Hàng</option>
                  <option>Thu Ngân</option>
                  <option>Tư Vấn Viên</option>
                  <option>Quản Lý</option>
                </select>
              </div>
              <div class="form-group">
                <label>Số Điện Thoại</label>
                <input type="text" class="form-control" placeholder="Nhập số điện thoại" id="phone" name="phone">
              </div>
              <div class="form-group">
                <label>Địa Chỉ</label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ" id="address" name="address">
              </div>
              <div class="form-group">
                <label for="pwd">Mật Khẩu</label>
                <input type="password" class="form-control" placeholder="Nhập Mật Khẩu" id="pwd" name="pwd">
              </div>
              <button  type="button" class="btn btn-danger" id="close" onclick="closeForm('form-add');">Hủy</button>
              <button type="submit" class="btn btn-success" style="float: right;">Thêm nhân viên</button>
            </form>
          </div>
      
       </div>
      </div>
      <!-- Form Update -->
      <div class="content-update" id="form-update">
       <div class="updateNhanVien">
          <div class="col col-md-12">
            <form action="./quanlynhansu.php" method="post" >
            <h4 style="text-align: center;" id="msnvUpdate"></h4>
              
              <div class="form-group">
                <input style="display: none;" type="text" class="form-control"  id="msnvUpdateForm" name="msnvUpdateForm" >
              </div>
              <div class="form-group">
                <label>Họ Tên NV</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên nhân viên" id="nameUpdateForm" name="nameUpdateForm">
              </div>
              <div class="form-group">
                <label>Chức vụ</label>
                <select class="form-control" name="positionUpdateForm">
                  <option id="bh">Bán Hàng</option>
                  <option id="tn">Thu Ngân</option>
                  <option id="tv">Tư Vấn Viên</option>
                  <option id="ql">Quản Lý</option>
                </select>
              </div>
              <div class="form-group">
                <label>Số Điện Thoại</label>
                <input type="text" class="form-control" placeholder="Nhập số điện thoại" id="phoneUpdateForm" name="phoneUpdateForm">
              </div>
              <div class="form-group">
                <label>Địa Chỉ</label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ" id="addressUpdateForm" name="addressUpdateForm">
              </div>
              <div class="form-group">
                <label for="pwd">Mật Khẩu</label>
                <input type="text" class="form-control" placeholder="Nhập Mật Khẩu" id="pwdUpdateForm" name="pwdUpdateForm">
              </div>
              <button  type="button" class="btn btn-danger" id="close" onclick="closeForm('form-update');">Hủy</button>
              <button type="submit" class="btn btn-success" style="float: right;">Cập nhật</button>
            </form>
          </div>
      
       </div>
      </div>

      <div class="table_admin row">
        <h4>Thông tin nhân viên</h4>
        <table class="table table-bordered table-hover" style="background-color: #fff;">
          <thead>
            <tr>
              <th>MSNV</th>
              <th>Tên NV</th>
              <th>Chức Vụ</th>
              <th>SĐT</th>
              <th>Địa Chỉ</th>
              <th>Password</th>
              <th>Chức Năng</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $sql_quanlynhansu = "SELECT * FROM nhanvien";
            $sql_quanlynhansu_result = executeResutl($sql_quanlynhansu);
            foreach ($sql_quanlynhansu_result as $nhanvien) {
              echo '
                <tr class="align-middle">
                  <td class="align-middle" id="'.$nhanvien['MSNV'].'">'.$nhanvien['MSNV'].'</td>
                  <td class="align-middle" id="name_'.$nhanvien['MSNV'].'">' . $nhanvien['HoTenNV'] . '</td>
                  <td class="align-middle" id="chucvu_'.$nhanvien['MSNV'].'">' . $nhanvien['ChucVu'] . '</td>
                  <td class="align-middle" id="phone_'.$nhanvien['MSNV'].'">' . $nhanvien['SoDienThoai'] . '</td>
                  <td class="align-middle" id="address_'.$nhanvien['MSNV'].'">' . $nhanvien['DiaChi'] . '</td>
                  <td class="align-middle" id="pwd_'.$nhanvien['MSNV'].'">' . $nhanvien['Password'] . '</td>
                  <td class="align-middle">
                        <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle  dropdown-toggle-split" data-toggle="dropdown">Chỉnh Sửa</button>
                          

                        <div class="dropdown-menu">
                          <a class="dropdown-item" onclick="openForm(\'form-update\'), 
                          updateForm(\''.$nhanvien['MSNV'].'\')">Cập nhật</a>
                          <a class="dropdown-item" href="?msnvDelete=' . $nhanvien['MSNV'] . '">Xóa</a>
                        </div>
                      </div>
                  </td>
                </tr>
                ';
            }
            ?>

            <!-- <tr class="align-middle">
              <td class="align-middle">admin</td>
              <td class="align-middle">Nguyễn Quốc Hưng</td>
              <td class="align-middle">Quản Lý</td>
              <td class="align-middle">0967105247</td>
              <td class="align-middle">Đường 22A B7/96 KDC 586, Phú Thứ, Cái Răng, Cần Thơ</td>
              <td class="align-middle">admin</td>
              <td class="align-middle">
                <select>
                  <option value="update">Chỉnh Sửa</option>
                  <option value="delete">Xóa</option>
                </select>
              </td>
            </tr> -->

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
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script src="../js/add-nv-form.js"></script>
</body>

</html>