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
   $result=read("SELECT role FROM user_data where (email ='{$data['email_or_phone']}'  or phone ='{$data['email_or_phone']}') and password ='{$data['password']}' ");
//    echo json_encode($result);
    if(count($result) === 1 && isset($result[0]['role'])){
        echo json_encode(['status' => 'success' , 'role' => $result[0]['role']]);
        if($result[0]['role']=='Buyer'){
            $_SESSION['user_data']['uid']= $data['email_or_phone'];
            $_SESSION['user_data']['role'] = 'Buyer';
        }
        else if($result[0]['role']=='Seller'){
            $_SESSION['user_data']['uid']= $data['email_or_phone'];
            $_SESSION['user_data']['role'] = 'Seller';
        }
    }else{
        echo json_encode(['status' => 'invalid credentials']);
    }
}
?>