<?php
session_start();
require_once '../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data[count($data)-1]['userdata'])){
$result=readone('SELECT COUNT(*) FROM orders');
$OID= 'ODR_'.($result+1);
$name = $data[count($data)-1]['userdata']['name'];
$phone = $data[count($data)-1]['userdata']['phone'];
$address = $data[count($data)-1]['userdata']['address'];
$payment_method = $data[count($data)-1]['userdata']['payment_method'];
$del_charges = $data[count($data)-1]['userdata']['del_charges'];

    $success = true;
    for ( $i = 0;  $i < count($data)-1; $i++) {
        $total_price = $data[$i]['quantity'] * $data[$i]['unit_price'];
        
        if(!write("DELETE FROM basket WHERE product_id = '{$data[$i]['id']}'")){
            $success = false;
        }
        if(!write("INSERT INTO orders (odr_id , user_id, product_id, quantity, total_price, name, phone, address, payment_method, status ,del_charge ,city) VALUES ('{$OID}', 
        '{$_SESSION['user_data']['uid']}', '{$data[$i]['id']}', '{$data[$i]['quantity']}', '{$total_price}', '{$name}', '{$phone}', '{$address}', '{$payment_method}', 'Pending', '{$del_charges}', '{$data[count($data)-1]['userdata']['city']}')")){
            $success = false;
        }
        if(!write("UPDATE product SET available_unit = available_unit - '{$data[$i]['quantity']}' WHERE product_id = '{$data[$i]['id']}'")){
            $success = false;
        }
    }

    if($success){
        echo json_encode("Order placed successfully.");
    }else{
        echo json_encode("Failed to place order.");
    }
}
else if(isset($data['sid'])){
   $result = readone("select city from user_data where UID='se-1'");
   echo json_encode($result);
}
?>