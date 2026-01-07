<?php
require('../models/db.php');
require('auth.php');


if(!isset($_SESSION['user_data'])){
   $_SESSION['msg']="Please login to continue";
   header("Location: ../views/buyers/home.php");
}
elseif($_SESSION['user_data']['role'] != 'Buyer'){
   $_SESSION['msg']="Access denied";
   header("Location: ../views/buyers/home.php");
   exit();
}
else if(isset($_GET['quantity']) && isset($_GET['id'])){
    // print_r($_SESSION['user_data']['uid']);
    // print_r($_GET['id']);
    // print_r($_GET['quantity']);
  write("insert into basket values(NULL,'{$_SESSION['user_data']['uid']}' , '{$_GET['id']}','{$_GET['quantity']}')");

    $_SESSION['msg']="alert('Product added to basket')";
    header("Location: ../views/buyers/product_details.php?id={$_GET['id']}");
    exit();
}
else if(isset($_GET['id'])){
  // print_r($_SESSION['user_data']['uid']);
  // print_r($_GET['id']);
  if(count(read("select * from basket where buyer_id='{$_SESSION['user_data']['uid']}' and product_id='{$_GET['id']}'"))>0){
  // header("Location: ../views/buyers/home.php");
  }else { 
    write("insert into basket values(NULL,'{$_SESSION['user_data']['uid']}' , '{$_GET['id']}','1')");}

//   $_SESSION['msg']="alert('Product added to basket')";
  header("Location: ../views/buyers/home.php");
  exit();
}
?>