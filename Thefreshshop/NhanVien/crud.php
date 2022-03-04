<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
?>

<?php
 if(!empty($_POST)){
   $maloaihang = $_POST['maloaihang'];
   if(!empty($_POST['mshh'])){
    $mshh = $_POST['mshh'];
   }
   $name = $_POST['name'];
   $description = $_POST['description'];
   $price = $_POST['price'];
   $number = $_POST['number'];
   $btnValue = $_POST['btn'];
   
   if($btnValue == 'delete'){
    $sql_delete_img = "DELETE FROM `hinhhanghoa` WHERE MSHH = '$mshh';";
    execute($sql_delete_img);
    $sql_delete_hanghoa = "DELETE FROM `hanghoa` WHERE MSHH = '$mshh';";
    execute($sql_delete_hanghoa);
    header("Location: ./quanlysanpham.php");
  }

   if($btnValue == 'update'){
    $sql_update_hanghoa = "UPDATE hanghoa SET MSHH='$mshh',TenHH='$name',QuyCach='$description',Gia='$price',SoLuongHang='$number',MaLoaiHang='$maloaihang' WHERE MSHH= '$mshh'";
    execute($sql_update_hanghoa);
    // Update img
    if(!empty($_FILES["img1"]["name"])){
      $target_dir = "../img/".$maloaihang."/";
      $target_file = $target_dir . $mshh.'_1.jpg';
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if (move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["img1"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    if(!empty($_FILES["img2"]["name"])){
      $target_dir = "../img/".$maloaihang."/";
      $target_file = $target_dir . $mshh.'_2.jpg';
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if (move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["img2"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    if(!empty($_FILES["img3"]["name"])){
      $target_dir = "../img/".$maloaihang."/";
      $target_file = $target_dir . $mshh.'_3.jpg';
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if (move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["img3"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    //end update img

    header("Location: ./quanlysanpham.php");
   }


   if($btnValue == 'addnew'){
     //check value
    $sql_truyxuat = "SELECT COUNT(MaLoaiHang) FROM hanghoa WHERE MaLoaiHang = '$maloaihang'";
    $sql_truyxuat_result = executeResutl($sql_truyxuat);
    $mshhNew = $maloaihang. ($sql_truyxuat_result[0]['COUNT(MaLoaiHang)'] + 1);
    $sql_insertnew = "INSERT INTO hanghoa(MSHH,TenHH,QuyCach,Gia,SoLuongHang,MaLoaiHang) 
    VALUES ('$mshhNew', '$name', '$description','$price', '$number', '$maloaihang')";
    execute($sql_insertnew);
    echo $sql_insertnew;
    echo "<br>";
    //Insert hinh
    for ($i=1; $i <=3 ; $i++) { 
      $TenHinh = $mshhNew.'_'.$i;
      $MSHH =$mshhNew;
      $sql_insertImg = "INSERT INTO hinhhanghoa(TenHinh, MSHH) VALUES ('$TenHinh','$MSHH');";
      execute($sql_insertImg);
      echo $sql_insertImg;
      echo "<br>";
    }

        if(!empty($_FILES["img1"]["name"])){
        $target_dir = "../img/".$maloaihang."/";
        $target_file = $target_dir . $mshhNew.'_1.jpg';
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["img1"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      if(!empty($_FILES["img2"]["name"])){
        $target_dir = "../img/".$maloaihang."/";
        $target_file = $target_dir . $mshhNew.'_2.jpg';
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["img2"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      if(!empty($_FILES["img3"]["name"])){
        $target_dir = "../img/".$maloaihang."/";
        $target_file = $target_dir . $mshhNew.'_3.jpg';
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["img3"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      header("Location: ./quanlysanpham.php");
   }

   

 }
?>