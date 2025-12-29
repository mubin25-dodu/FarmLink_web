<?php
session_start();
if(!isset($_SESSION['user_data'])){
   header("Location: ../login.php");
}
elseif($_SESSION['user_data']['role'] != 'Seller'){
   header("Location: ../login.php");
   exit();
}

?>