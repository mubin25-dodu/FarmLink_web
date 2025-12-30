<?php
require('../db/db.php');
// require('auth.php');
session_start();

if(!isset($_SESSION['user_data'])){
   header("Location: ../views/buyers/home.php");
}
elseif($_SESSION['user_data']['role'] != 'Buyer'){
   header("Location: ../views/buyers/home.php");
   exit();
}
else if(isset($_GET['id']))
{
  print_r($_SESSION['user_data']['uid']);
  print_r($_GET['id']);
  write("insert into basket values(NULL,'{$_SESSION['user_data']['uid']}' , '{$_GET['id']}','1')");
  header("Location: ../views/buyers/home.php");
   exit();
}
?>