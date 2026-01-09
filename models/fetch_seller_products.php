<?php
session_start();
require_once '../models/db.php';
$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode($data);

if(isset($data["status"])&& $data["status"]=="no_search"){
    $qury="SELECT * FROM product where Seller_id= '".$_SESSION['user_data']['uid'] ."' and available_unit!='-1' ORDER BY product_id ASC";
    $result = read($qury);
    echo json_encode ($result);
}else if(isset($data["query"])){
    $qury="SELECT * FROM product where Seller_id= '".$_SESSION['user_data']['uid'] ."' and name LIKE '%".$data["query"]."%' ORDER BY product_id ASC";
    $result = read($qury);
    echo json_encode($result);
}

if(isset($data["product_id"])){
    $product_id = $data["product_id"];
    $qury="UPDATE product set available_unit='-1' where product_id= '".$product_id."' and Seller_id= '".$_SESSION['user_data']['uid'] ."' ";
    if(write($qury)){
        echo json_encode (["status" => "deleted"]);
    }else{
        echo json_encode (["status" => "error"]);
    }
}
if(isset($data["edit_product_id"])){
    $product_id = $data["edit_product_id"];
    $qury="SELECT * FROM product where product_id= '".$product_id."' and Seller_id= '".$_SESSION['user_data']['uid'] ."' ";
    $result = read($qury);
    echo json_encode ($result);
}
if(isset($data["product_id_update"])){
    $product_id = $data["product_id_update"];
    $name = $data["name"];
    $description = $data["description"];
    $price = $data["price"];
    $stock = $data["stock"];
    $category = $data["category"];
    $qury="UPDATE product set name='$name', description='$description', unit_price='$price', available_unit='$stock', catagory='$category' where product_id= '".$product_id."' and Seller_id= '".$_SESSION['user_data']['uid'] ."' ";
    if(write($qury)){
        echo json_encode (["status" => "updated"]);
    }else{
        echo json_encode (["status" => "error"]);
    }
}

?>