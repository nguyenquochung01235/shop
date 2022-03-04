<?php
  require_once('login.php');
  login();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Nhập</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/DangNhap_NhanVien.css">
</head>

<body>
  <div class="container_register">
    <div class="content">
      <div class="register-form">
        <h2>Quản Lý Vận Đơn</h2>
        <form action="" method="post">
        
          <div class="form-group">
            <label >Mã Số Nhân Viên:</label>
            <input type="text" class="form-control" id="phone" placeholder="Nhập mã số nhân viên" name="username">
          </div>
          <div class="form-group">
            <label >Mật Khẩu:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pswd">
          </div>
          <div class="form-group">  
            <label >Chức vụ:</label>
            <select class="form-control" name="position">      
              <option>Quản Lý</option>
              <option>Bán Hàng</option>
              <option>Thu Ngân</option>
              <option>Tư Vấn Viên</option>
            </select>
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember"> Lưu Tài Khoản
            </label>
          </div>
          <button class="btn btn-danger"><a href="../index.php" id="btn">Trở Về</a></button>
          <button type="submit" class="btn btn-primary" >Đăng Nhập</button>
          <!-- <button type="submit" class="btn btn-primary" ><a href="?username=nv247'">Đăng Nhập</a></button> -->
        </form>
      </div>
    </div>
  </div>

  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>

</html>