<?php
  require_once('Database.php');
  function executeResutl($sql){
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
  
    $data = [];
    $result = mysqli_query($conn, $sql);
    if ($result) {
      while($row = mysqli_fetch_array($result)) {
        $data[] = $row;
      }
      } else {
     echo 'Lỗi Rồi Ông Nội Ơi, Kiểm Tra Lại Mấy Câu Query';
    }
  
    mysqli_close($conn);
    return $data;
  }

  function execute($sql){
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, $sql);
    mysqli_close($conn);
  }
  
?>