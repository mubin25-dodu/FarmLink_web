<?php
session_start();
require_once '../models/db.php';

$data = json_decode(file_get_contents('php://input'), true);
echo json_encode($data);
$result=readone("SELECT COUNT(*) FROM user_data where email ='{$data['email']}' or phone ='{$data['phone']}' ");
return $result;
?>