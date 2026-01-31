<?php
session_start();
require_once '../models/db.php';
$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode("dsadas sads");

if(isset($_SESSION['user_data'])&& isset($data["action"] )){
    $q="UPDATE orders 
    SET status = 'Pickup Requested'
    WHERE product_id = '{$data['product_id']}' AND odr_id = '{$data['odr_id']}' ;";
    if(write($q)){
        $result =  "success";
    }else{
        $result = "error";
    } 
    echo json_encode ($result);
}

?>