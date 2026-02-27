<?php
require_once '../../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data)&& isset($data['action']) && isset($data['role'])){
   if($data['action'] == 'all'){
    if($data['role'] == 'staff'){
        $users = read("select * from Staffs where role='".$data['role']."' LIMIT ".$data['limit']." OFFSET ".$data['offset']);
    }else{
        $users = read("select * from user_data where role='".$data['role']."' LIMIT ".$data['limit']." OFFSET ".$data['offset']);
    }
    echo json_encode($users);
    }else {

    if($data['role'] == 'staff'){
        $users = read("select * from Staffs where role='".$data['role']."'");
    }else{
        $users = read("select * from user_data where name LIKE '%".$data['action']."%' AND role='".$data['role']."'");
    }
    echo json_encode($users);
    
}
}


?>