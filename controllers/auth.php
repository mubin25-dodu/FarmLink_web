<?php
session_start();
setcookie('status',true,time()+43200 , '/');
if(!isset($_SESSION['userdata']) || $_SESSION['userdata']['status'] !== "active"){
    header("Location: ../Login.php");
    exit();
}
?>