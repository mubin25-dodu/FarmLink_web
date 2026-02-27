<?php
session_start();
require_once '../models/db.php';
$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode($data);

if(isset($data["category"]) && isset($data["load"]) &&isset($data['offset'])){

$qury="";
    if($data["load"]==="all" && $data["category"]==="all"){
        $qury="SELECT * FROM product 
            WHERE available_unit > 0 
            ORDER BY product_id
            LIMIT 24 OFFSET {$data['offset']}";
     }
   else if($data["category"]==="all"){
        $qury="SELECT * FROM product 
            WHERE available_unit > 0 and name LIKE '%$data[load]%' 
            ORDER BY product_id
            LIMIT 24 OFFSET {$data['offset']}";
     }
    else if($data["load"]==="all"){
        $qury="SELECT * FROM product 
            WHERE available_unit > 0 and category = '$data[category]'
            ORDER BY product_id
            LIMIT 24 OFFSET {$data['offset']}";
    }
    else{
      $qury="SELECT * FROM product 
            WHERE available_unit > 0 and name LIKE '%$data[load]%' and category = '$data[category]'
            ORDER BY product_id
            LIMIT 24 OFFSET {$data['offset']}";
    }
        
    if($result = read($qury)){
        echo json_encode ($result);
        exit();
    }
    else{
        $result = "No Data";
        echo json_encode ($result);
        exit();
    }
}
?>