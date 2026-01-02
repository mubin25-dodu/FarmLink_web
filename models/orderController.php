<?php
session_start();
require_once '../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);
$result=readone('SELECT COUNT(*) FROM orders');
$OID= 'ODR_'.($result+1);
$name = $data[count($data)-1]['userdata']['name'];
$phone = $data[count($data)-1]['userdata']['phone'];
$address = $data[count($data)-1]['userdata']['address'];
$payment_method = $data[count($data)-1]['userdata']['payment_method'];

    for ( $i = 0;  $i < count($data)-1; $i++) {
        $total_price = $data[$i]['quantity'] * $data[$i]['unit_price'];
        write("DELETE FROM basket WHERE product_id = '{$data[$i]['id']}'");
        write("INSERT INTO orders (odr_id , user_id, product_id, quantity, total_price, name, phone, address, payment_method, status) VALUES ('{$OID}', 
        '{$_SESSION['user_data']['uid']}', '{$data[$i]['id']}', '{$data[$i]['quantity']}', '{$total_price}', '{$name}', '{$phone}', '{$address}', '{$payment_method}', 'Pending')");
    }
?>