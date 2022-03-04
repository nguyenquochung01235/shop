<?php
  require_once('../utility.php');
  require_once('../ConnectionDatabase/Connection.php');
  if(!empty($_POST)){
    $msnv = $_POST['msnv'];
    $SoDonDH = $_POST['SoDonDH'];
    $TTDH = $_POST['TTDH'];
    $ttdh_now = $_POST['ttdh_now'];
    $currentDay = date('Y-m-d', strtotime(' +1 day'));

    if($TTDH == 'Đang Chờ Duyệt'){
      $sql = "UPDATE dathang SET MSNV = null,NgayGH=null,TrangThaiDH='$TTDH' WHERE SoDonDH = $SoDonDH;";
      execute($sql);
      $sql_capnhatsoluong = "SELECT MSHH, SoLuong FROM chitietdathang WHERE SoDonDH = $SoDonDH;";
      $sql_capnhatsoluong_result = executeResutl($sql_capnhatsoluong);
      if($ttdh_now == 'dd' || $ttdh_now == 'tc'){
        foreach($sql_capnhatsoluong_result as $capnhatsoluong){
            $temp_sl = $capnhatsoluong['SoLuong'];
            $mshh = $capnhatsoluong['MSHH'];
            $sql_update ="UPDATE hanghoa SET SoLuongHang = SoLuongHang + $temp_sl WHERE MSHH = '$mshh';";
            execute($sql_update);
        }
    }
    }else{
      // $sql = "UPDATE dathang SET MSNV = 'adm',NgayGH = '$currentDay',TrangThaiDH= '$TTDH' WHERE SoDonDH = $SoDonDH;";
      $sql = "UPDATE dathang SET MSNV = '$msnv',NgayGH = '$currentDay',TrangThaiDH= '$TTDH' WHERE SoDonDH = $SoDonDH;";
      execute($sql);
      $sql_capnhatsoluong = "SELECT MSHH, SoLuong FROM chitietdathang WHERE SoDonDH = $SoDonDH;";
      $sql_capnhatsoluong_result = executeResutl($sql_capnhatsoluong);
   


      switch ($TTDH) {
        case 'Đã Duyệt Đơn':
         
          if($ttdh_now == 'dc'){
              foreach($sql_capnhatsoluong_result as $capnhatsoluong){
                  $temp_sl = $capnhatsoluong['SoLuong'];
                  $mshh = $capnhatsoluong['MSHH'];
                  $sql_update ="UPDATE hanghoa SET SoLuongHang = SoLuongHang - $temp_sl WHERE MSHH = '$mshh';";
                  execute($sql_update);
              }
          }
          
          break;
        case 'Đã Hủy Đơn':
            
          if($ttdh_now == 'dd' || $ttdh_now == 'tc'){
            foreach($sql_capnhatsoluong_result as $capnhatsoluong){
                $temp_sl = $capnhatsoluong['SoLuong'];
                $mshh = $capnhatsoluong['MSHH'];
                $sql_update ="UPDATE hanghoa SET SoLuongHang = SoLuongHang + $temp_sl WHERE MSHH = '$mshh';";
                execute($sql_update);
            }
          break;
        }
      }

    }
    echo 'Đã cập nhật thành ( ' . $TTDH . ')';
    
  //  echo $test;
  }
