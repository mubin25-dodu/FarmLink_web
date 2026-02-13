<?php
require_once '../../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data)&& isset($data['action']) && isset($data['role'])){
    if($data['role'] == 'staff'){
    $users = read("select * from Staffs where role='".$data['role']."'");
    }else{
        $users = read("select * from user_data where role='".$data['role']."'");
        
    }
    echo json_encode($users);
}

?>