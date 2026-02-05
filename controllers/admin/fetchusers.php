<?php
require_once '../../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);
if(isset($data)){
    $users = read("select * from user_data");
    echo json_encode($users);
}
?>