<?php
session_start();
require_once '../models/db.php';
$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode("dsadas sads");

if(isset($_SESSION['user_data'])&& isset($data["status"] ))
    if($data["status"]=="no" || $data["status"]=="requested"){
    $q="SELECT 
        o.odr_id,
        o.quantity,
        o.total_price,
        o.name AS customer_name,
        o.status,
        p.name AS product_name,
        p.unit_price,
        p.seller_id,
        p.unit
    FROM orders o
    JOIN product p ON o.product_id = p.product_id
    WHERE p.seller_id = '{$_SESSION['user_data']['uid']}' AND o.status = 'pending';";
    $result = read($q);
    echo json_encode ($result);
    }
if(isset($_SESSION['user_data'])&& isset($data["status"] ))
    if($data["status"]=="delivered"){
    $q="SELECT 
        o.odr_id,
        o.quantity,
        o.total_price,
        o.name AS customer_name,
        o.status,
        p.name AS product_name,
        p.unit_price,
        p.seller_id,
        p.unit
    FROM orders o
    JOIN product p ON o.product_id = p.product_id
    WHERE p.seller_id = '{$_SESSION['user_data']['uid']}' AND o.status = 'Delivered';";
    $result = read($q);
    echo json_encode ($result);
    }
    if(isset($_SESSION['user_data'])&& isset($data["status"] ))
    if($data["status"]=="process"){
    $q="SELECT 
        o.odr_id,
        o.quantity,
        o.total_price,
        o.name AS customer_name,
        o.status,
        p.name AS product_name,
        p.unit_price,
        p.seller_id,
        p.unit
    FROM orders o
    JOIN product p ON o.product_id = p.product_id
    WHERE p.seller_id = '{$_SESSION['user_data']['uid']}' AND (o.status = 'Accepted' OR o.status = 'Processesing');";
    $result = read($q);
    echo json_encode ($result);
    }
    if(isset($_SESSION['user_data'])&& isset($data["status"] ))
    if($data["status"]=="history"){
    $q="SELECT 
        o.odr_id,
        o.quantity,
        o.total_price,
        o.name AS customer_name,
        o.status,
        p.name AS product_name,
        p.unit_price,
        p.seller_id,
        p.unit
    FROM orders o
    JOIN product p ON o.product_id = p.product_id
    WHERE p.seller_id = '{$_SESSION['user_data']['uid']}';";
    $result = read($q);
    echo json_encode ($result);
    }




?>