<?php
require('db.php');
session_start();
if(isset($_GET['id'])){
    print_r($_GET['id']);
    print_r($_SESSION['user_data']['uid']);
    write("DELETE FROM basket WHERE basket_id = '{$_GET['id']}' ");
    header("Location: ../views/buyers/basket.php");
    exit();
}
?>