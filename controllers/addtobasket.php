<?php
require('../models/db.php');
// require('auth.php');
session_start();
$data = json_decode(file_get_contents('php://input'), true);

if(!isset($_SESSION['user_data'])){
    echo json_encode (["status"=>"Not loggedin"] );
}
else if(isset($data['quantity']) && isset($data['id'])){
    // print_r($_SESSION['user_data']['uid']);
    // print_r($_GET['id']);
    // print_r($_GET['quantity']);
  if(count(read("select * from basket where buyer_id='{$_SESSION['user_data']['uid']}' and product_id='{$data['id']}'"))>0){
      echo json_encode (["status"=>"Product already in basket"] );
  }else { 
    write("insert into basket values(NULL,'{$_SESSION['user_data']['uid']}' , '{$data['id']}','{$data['quantity']}')");}
    echo json_encode (["status"=>"Product added to basket"] );
  }

else if( isset($_SESSION['user_data']) && isset($data['id'])){
  // print_r($_SESSION['user_data']['uid']);
  // print_r($_GET['id']);
  if(count(read("select * from basket where buyer_id='{$_SESSION['user_data']['uid']}' and product_id='{$data['id']}'"))>0){
  // header("Location: ../views/buyers/home.php");
      echo json_encode (["status"=>"Product already in basket"] );
  }else { 
    write("insert into basket values(NULL,'{$_SESSION['user_data']['uid']}' , '{$data['id']}','1')");
    echo json_encode (["status"=>"Product added to basket"] );
}
}
?>