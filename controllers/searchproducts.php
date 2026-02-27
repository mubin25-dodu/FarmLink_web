<?php
require_once '../models/db.php';
session_start();
$data = json_decode(file_get_contents('php://input'), true);
if(isset($data['search'])){
    $query ="select * from orders where odr_id LIKE '%{$data['search']}%' ";
    if(read($query)){
        $result = read($query);
        echo json_encode($result);
    }
    else{
        echo json_encode ("no results found");
    }
}
?>
