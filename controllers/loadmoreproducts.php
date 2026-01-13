<?php
session_start();
require_once '../models/db.php';
$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode($data);

if(isset($data["load"])&& $data["load"]==="all" and isset($data['offset'])){
    $qury="SELECT * FROM product 
           ORDER BY product_id
           LIMIT 50 OFFSET {$data['offset']}";

    $result = read($qury);
    echo json_encode ($result);
}
if(isset($data["load"])&& $data["load"]!=="all" and isset($data['offset'])){
    $search = $data["load"];
    $qury="SELECT * FROM product 
           WHERE  name LIKE '%$search%'
           ORDER BY product_id
           LIMIT 50 OFFSET {$data['offset']}";

    $result = read($qury);
    echo json_encode ($result);
}

?>