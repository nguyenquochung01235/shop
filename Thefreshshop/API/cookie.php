<?php
  require_once('../utility.php');

  if(!empty($_POST)){
    $action = getPost('action');
    $mshh = getPost('mshh');
    $num = getPost('num');
    $updateNum = getPost('updateNum');
    $cart = [];
    if(isset($_COOKIE['cart'])){
      $json = $_COOKIE['cart'];
      $cart = json_decode($json, true);
    }

    switch ($action) {
      case 'add':
        $isFind = false;
        for ($i=0; $i < count($cart); $i++) { 
          if($cart[$i]['mshh'] == $mshh){
            $cart[$i]['num'] += $num;
            $isFind = true;
            break;
          }
        }
        if(!$isFind){
          $cart[] = [
            'mshh' => $mshh,
            'num'=>$num
          ];
        }
        setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
        break;

      case 'update':
        $isFind = false;
        for ($i=0; $i < count($cart); $i++) { 
          if($cart[$i]['mshh'] == $mshh){
            $cart[$i]['num'] += ($updateNum - $cart[$i]['num']);
            $isFind = true;
            break;
          }
        }

        if(!$isFind){
          $cart[] = [
            'mshh' => $mshh,
            'num'=>$num
          ];
        }
        setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
        break;
     
        case 'delete':
          for ($i=0; $i < count($cart); $i++) { 
            if($cart[$i]['mshh'] == $mshh){
             array_splice($cart, $i, 1);
              break;
            }
          }
          setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
          
      }
  }
?>