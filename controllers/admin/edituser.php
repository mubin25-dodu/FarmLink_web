<?php
require_once '../../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data) && isset($data['UID']) && isset($data['status']) && isset($data['date'])){
    $uid = $data['UID'];
    $status = $data['status'];
    $date = $data['date'];
    if(write("UPDATE user_data SET status='$status' , temp_ban='$date' where UID='$uid'")){
        echo json_encode(['status' => 'success']);
    }else{
        echo json_encode(['status' => 'update failed']);
    }
    
}

?>