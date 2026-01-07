<?php
session_start();

if(!isset($_SESSION['user_data'])){
   // $_SESSION['msg'] = "alert('Login to continue')";
   header("Location: home.php");
   exit();
}
elseif($_SESSION['user_data']['role'] != 'Buyer'){
   // $_SESSION['msg'] = "alert('Login to continue')";
   header("Location: home.php");
   exit();
}


?>