<?php
session_start();

if(!isset($_SESSION['user_data'])){
   header("Location: home.php");
}
elseif($_SESSION['user_data']['role'] != 'Buyer'){
   header("Location: home.php");
   exit();
}

?>