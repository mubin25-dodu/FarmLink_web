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
// Handle file upload
$path = '../../assets/files/product_img/'.'PROD_'.$name.time().'.jpg';
move_uploaded_file($_FILES['file']['tmp_name'], $path);
// Insert product into database
$sql = "INSERT INTO product (name, description, unit_price, available_unit, image, seller_id, agent_id, unit, catagory)
        VALUES ('$name', '$description', '$price', '$quantity', '$path', '$seller_id', NULL, '$unit', '$category')";

write($sql);
header("Location: ../views/seller/Add_Products.php");
?>