<?php
  function login(){
    if (!empty($_POST)) {
      $username = $_POST['username'];
      setcookie("username", $username);
      $pswd = $_POST['pswd'];
      $position = $_POST['position'];
      require_once("../ConnectionDatabase/Connection.php");
      $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
      //CHECK VALUE
      $query = "SELECT * FROM NhanVien WHERE msnv ='".$username."' AND PASSWORD ='".$pswd."' AND chucvu ='".$position."'  "; 
      $result = mysqli_query($conn,$query);
      
      $data = array();
      while($row = mysqli_fetch_array($result,1)){
        $data[] = $row;
      }

      $conn->close();
      
      if($data!=null && count($data) > 0){
        echo '
        <script>
        alert("Đăng Nhập Thành Công");
      </script>
        ';
        header('Location: Manager_Page.php');
      }else{
        echo '
        <script>
        alert("Đăng Nhập Không Thành Công");
      </script>';
      }
    }
  }

?>