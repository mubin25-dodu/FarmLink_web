<?php
session_start();
require_once '../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode($data);

if(isset($data['email']) && isset($data['phone'])){
   $result=readone("SELECT COUNT(*) FROM user_data where email ='{$data['email']}' or phone ='{$data['phone']}' ");
    if($result==0){
     echo json_encode(['status' => 'success']);
}else{
    echo json_encode(['status' => 'user exists']);
}
}
if(isset($data['email_or_phone']) && isset($data['password'])){
   $result=readone("SELECT COUNT(*) FROM user_data where (email ='{$data['email_or_phone']}'  or phone ='{$data['email_or_phone']}') and password ='{$data['password']}' ");
    if($result==1){
        echo json_encode(['status' => 'success']);
    }else{
        echo json_encode(['status' => 'invalid credentials']);
    }
}
?>