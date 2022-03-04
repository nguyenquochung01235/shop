<?php
  if(!empty($_POST)){
    $cart = [];
    if (isset($_COOKIE['cart'])) {
      $json = $_COOKIE['cart'];
      $cart = json_decode($json, true);
    }
    
    if($cart == null || count($cart) ==0){
      header('Location: ../index.php');
      die();
    }

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




    $fullname = getPost('fullname');
    $company = getPost('company');
    $phone = getPost('phone');
    $email = getPost('email');
    $address = getPost('address');
    $mskh = $phone;

    


    $check_mskh = "SELECT MSKH FROM khachhang WHERE MSKH = '$mskh'";
    $check_mskh_result = executeResutl($check_mskh);

    if($check_mskh_result != null && count($check_mskh_result) >0){
      echo ' <script>alert("Đã Đặt Hàng Thành Công !!!")</script>';
      
      $sql_dathang = "INSERT INTO dathang(MSKH,TrangThaiDH) VALUES ('$mskh','Đang Chờ Duyệt');";
      execute($sql_dathang);

      $sql_get_sodondh = "SELECT SoDonDH FROM dathang ORDER by SoDonDH desc limit 0,1;";
      $sql_get_sodondh_result = executeResutl($sql_get_sodondh);
      foreach($sql_get_sodondh_result as $SoDonDH){
        $tempSoDonDH = $SoDonDH['SoDonDH'];  
        }
      $sql_address = "INSERT INTO diachikh(MaDC,DiaChi,MSKH) VALUES ($tempSoDonDH,'$address','$mskh');";
      execute($sql_address);
      foreach ($cartList as $item) {
        $num = 0;
        foreach ($cart as $value) {
          if ($value['mshh'] == $item['MSHH']) {
            $num = $value['num'];

            break;
          }
        }
        
        $sql_chitietdathang = "INSERT INTO chitietdathang(SoDonDH, MSHH, SoLuong, GiaDatHang) VALUES ($tempSoDonDH, '".$item['MSHH']."', '".$num."', '".$item['Gia']."');";
        execute($sql_chitietdathang);


      }
       //Clearcookie

       if (isset($_COOKIE['cart'])) {
        unset($_COOKIE['cart']); 
        setcookie('cart', null, -1, '/'); 
        return true;
      } else {
          return false;
      }
      header('Location: ../KhachHang/tracuudonhang.php');
    }else{
      $sql = "INSERT INTO khachhang (MSKH,HoTenKH,TenCongTy,SoDienThoai,Email) VALUES ('$mskh','$fullname','$company','$phone','$email');";
      execute($sql);
      echo ' <script>alert("Đã Đặt Hàng Thành Công !!!")</script>';
      
      $sql_dathang = "INSERT INTO dathang(MSKH,TrangThaiDH) VALUES ('$mskh','Đang Chờ Duyệt');";
      execute($sql_dathang);

      $sql_get_sodondh = "SELECT SoDonDH FROM dathang ORDER by SoDonDH desc limit 0,1;";
      $sql_get_sodondh_result = executeResutl($sql_get_sodondh);
      foreach($sql_get_sodondh_result as $SoDonDH){
        $tempSoDonDH = $SoDonDH['SoDonDH'];  
        }
      
        $sql_address = "INSERT INTO diachikh(MaDC,DiaChi,MSKH) VALUES ($tempSoDonDH,'$address','$mskh');";
        execute($sql_address);

      foreach ($cartList as $item) {
        $num = 0;
        foreach ($cart as $value) {
          if ($value['mshh'] == $item['MSHH']) {
            $num = $value['num'];

            break;
          }
        }
        
        $sql_chitietdathang = "INSERT INTO chitietdathang(SoDonDH, MSHH, SoLuong, GiaDatHang) VALUES ($tempSoDonDH, '".$item['MSHH']."', '".$num."', '".$item['Gia']."');";
        execute($sql_chitietdathang);
      }


      //Clearcookie

      if (isset($_COOKIE['cart'])) {
        unset($_COOKIE['cart']); 
        setcookie('cart', null, -1, '/'); 
        return true;
      } else {
          return false;
      }
    header('Location: ../KhachHang/tracuudonhang.php');
  }
}
