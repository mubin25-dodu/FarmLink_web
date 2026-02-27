<?php
require_once '../../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data)&& isset($data['action']) && isset($data['role'])){
   $limit = isset($data['limit']) ? (int)$data['limit'] : 10;
   $offset = isset($data['offset']) ? (int)$data['offset'] : 0;

   if($data['action'] == 'all'){
    if(isset($data['filter'])){
        $users = read("select * from user_data where role='".$data['role']."' AND status LIKE '%".$data['filter']."%' LIMIT ".$limit." OFFSET ".$offset);
    }else if($data['role'] == 'staff'){
        $users = read("select * from Staffs where role='".$data['role']."' LIMIT ".$limit." OFFSET ".$offset);
    }else{
        $users = read("select * from user_data where role='".$data['role']."' LIMIT ".$limit." OFFSET ".$offset);
    }
    echo json_encode($users);
    }else {
    if(isset($data['filter'])){
        $users = read("select * from user_data where (name LIKE '%".$data['action']."%' OR UID LIKE '%".$data['action']."%') AND role='".$data['role']."' AND status LIKE '%".$data['filter']."%' LIMIT ".$limit." OFFSET ".$offset);

    }else if($data['role'] == 'staff'){
        $users = read("select * from Staffs where role='".$data['role']."' LIMIT ".$limit." OFFSET ".$offset);
    }else{
        $users = read("select * from user_data where (name LIKE '%".$data['action']."%' OR UID LIKE '%".$data['action']."%') AND role='".$data['role']."' LIMIT ".$limit." OFFSET ".$offset);
    }
    echo json_encode($users);
    
}
}


?>