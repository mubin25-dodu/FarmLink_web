<?php
session_start();
require_once '../models/db.php';
$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode($data);


if(isset($data["category"]) && isset($data["load"]) && $data["load"] !=="all" && isset($data['offset'])){
    $search = $data["load"];
    $category = $data["category"];
    $qury="SELECT * FROM product 
           WHERE available_unit > 0 and name LIKE '%$search%' and category == $category'
           ORDER BY product_id
           LIMIT 24 OFFSET {$data['offset']}";
    $result = read($qury);
    echo json_encode ($result);
    exit();
}
else if(!isset($data["category"]) && isset($data["load"])&& $data["load"]==="all" and isset($data['offset'])){
    $qury="SELECT * FROM product 
           where available_unit > 0
           ORDER BY product_id
           LIMIT 24 OFFSET {$data['offset']}";

    $result = read($qury);
    echo json_encode ($result);
    exit();
}
else if(!isset($data["category"]) && isset($data["load"])&& $data["load"]!=="all" && isset($data['offset'])){
    $search = $data["load"];
    $qury="SELECT * FROM product 
           where available_unit > 0
           AND (name LIKE '%$search%' or description LIKE '%$search%')
           ORDER BY product_id
           LIMIT 24 OFFSET {$data['offset']}";

    $result = read($qury);
    echo json_encode ($result);
    exit();
}
else if(!isset($data["load"]) && isset($data["category"]) && isset($data['offset'])){
    $search = $data["category"];
    $qury="SELECT * FROM product 
           WHERE available_unit > 0 and category LIKE '%$search%'
           ORDER BY product_id
           LIMIT 24 OFFSET {$data['offset']}";

    $result = read($qury);
    echo json_encode ($result);
    exit();

}


?>