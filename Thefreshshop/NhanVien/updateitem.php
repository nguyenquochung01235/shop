<!-- Source Code -->
<?php
require_once('.././ConnectionDatabase/Connection.php');
require_once('../utility.php');
?>

<?php
$username = $_COOKIE['username'];

$item = $_GET['item'];

$sql_hanghoa = "SELECT * FROM hanghoa WHERE MSHH = '$item';";
$sql_hanghoa_result = executeResutl($sql_hanghoa);
$sql_hinhhanghoa = "SELECT * FROM hinhhanghoa WHERE MSHH = '$item';";
$sql_hinhhanghoa_result = executeResutl($sql_hinhhanghoa);
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
  <link rel="stylesheet" href="../css/updateitem.css">
  <link rel="stylesheet" href="../css/img_upload.css">


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

      <div class="chitiet">
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

        <div class="crud-item">
          <form action="./crud.php" method="post" id="form-chitiet" enctype="multipart/form-data">
            <h4 style="text-align: center;">Cập nhật sản phẩm </h4>
             
              <div class="form-group">
                <label>Mã Loại</label>
                <select class="form-control" name="maloaihang">
                  
                  <option><?php echo $sql_hanghoa_result[0]['MaLoaiHang'] ?></option>
                  <option id="at">AT</option>
                  <option id="ak">AK</option>
                  <option id="qj">QJ</option>
                  <option id="qt">QT</option>
                  <option id="gd">GD</option>
                </select>

              </div>
              <div class="form-group">
                <label>Mã Số Hàng Hóa</label>
                <input type="text" class="form-control" id="mshh" name="mshh" 
                value="<?php echo $sql_hanghoa_result[0]['MSHH'] ?>" >
              </div>
              <div class="form-group">
                <label>Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $sql_hanghoa_result[0]['TenHH'] ?>">
              </div>
             
                  <?php
                    $dir = $sql_hanghoa_result[0]['MaLoaiHang'].'/'.$item
                  ?>
                 



              <!-- Test -->
              <label>Hình Ảnh Sản Phẩm (Chỉ hỗ trợ file .jpg)</label>
              <div class="img_upload img-item">
              
                <div class="img">
                  <img id="output"class="output" style="width: 195px; height: 195px; " src="../img/<?php echo $dir?>_1.jpg">
                  <p id="btn">+</p>
                  <input type="file" id="img_1"  onchange="loadFile(event,'output')" name="img1">
                </div>
                <div class="img">
                  <img class="output" id="output2" style="width: 195px; height: 195px;" src="../img/<?php echo $dir?>_2.jpg">
                  <p id="btn">+</p>
                  <input type="file" id="img_2" onchange="loadFile(event,'output2')" name="img2">
                </div>
                <div class="img">
                  <img class="output" id="output3" style="width: 195px; height: 195px;" src="../img/<?php echo $dir?>_3.jpg">
                  <p id="btn">+</p>
                  <input type="file" id="img_3" onchange="loadFile(event,'output3')" name="img3">
                </div>
          
          
              </div>
              <!-- Test -->



        
              <div class="form-group">
                <label>Mô Tả</label>
                <!-- <input type="text" class="form-control" id="description" name="description"> -->
                <textarea class="form-control" name="description" id="description" cols="100%" rows="10"><?php echo $sql_hanghoa_result[0]['QuyCach'] ?></textarea>
              </div>
              <div class="form-group">
                <label>Giá</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $sql_hanghoa_result[0]['Gia'] ?>">
              </div>
              <div class="form-group">
                <label>Số Lượng</label>
                <input type="text" class="form-control" id="number" name="number" value="<?php echo $sql_hanghoa_result[0]['SoLuongHang'] ?>">
              </div>
              
              
              <button type="submit" class="btn btn-danger" value="delete" name="btn" style="float: left; margin-bottom:10px ;">Xóa Sản Phẩm</button>
              <button type="submit" class="btn btn-success" value="update" name="btn" style="float: right; margin-bottom:10px ;">Cập Nhật Sản Phẩm</button>
            </form>
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
  <script src="../js/img_upload.js"></script>

  


</body>

</html>