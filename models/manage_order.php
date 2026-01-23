<?php
session_start();
require_once '../models/db.php';
$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode("dsadas sads");

if(isset($_SESSION['user_data'])&& isset($data["action"] )){
    $q="UPDATE orders AS a
    JOIN product AS b 
    ON a.product_id = b.product_id
    SET a.status = 'Pickup Requested'
    WHERE a.product_id = '{$data['product_id']}' AND b.seller_id = '{$_SESSION['user_data']['uid']}' AND a.odr_id = '{$data['odr_id']}' ;";
    if(write($q)){
        $result =  "success";
    }else{
        $result = "error";
    } 
    echo json_encode ($result);
}

?>