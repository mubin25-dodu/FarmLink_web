<?php
session_start();
require_once '../models/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode($data);

if(isset($data["status"])&& $data["status"]=="no_search"){
    $qury="SELECT * FROM product where Seller_id= '".$_SESSION['user_data']['uid'] ."'";
    $result = read($qury);
    echo json_encode ($result);
}else if(isset($data["query"])){ 
    $qury="SELECT * FROM product where Seller_id= '".$_SESSION['user_data']['uid'] ."' and name LIKE '%".$data["query"]."%' ";
    $result = read($qury);
    echo json_encode($result);
}


?>