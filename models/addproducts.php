<?php
session_start();
require_once '../models/db.php';

$name = $_POST['name'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$unit = $_POST['unit'];
$description = $_POST['description'];
$price = $_POST['price'];
$seller_id = $_SESSION['user_data']['uid'];


if(readone("SELECT * FROM product WHERE name='$name' AND seller_id='$seller_id'")>0){
    // Product already exists
$_SESSION['msg']="Product with this name already exists.";
}
else{
   
    $path = '../assets/files/product_img/'.'PROD_'.$name.time().'.jpg';
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
    $query = "INSERT INTO product (name, category, available_unit, unit, description, unit_price, seller_id, image) 
              VALUES ('$name', '$category', '$quantity', '$unit', '$description', '$price', '$seller_id', '"."../".$path."')";
    write($query);
    $_SESSION['msg']="Product added successfully.";
}
// echo $result;
header("Location: ../views/seller/Add_Products.php");
?>