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
$path = '../assets/files/product_img/'.'PROD_'.$name.time().'.jpg';
if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
    $_SESSION['msg'] = "Image upload failed.";
    header("Location: ../views/seller/Add_Products.php");
    exit();
}

if (readone("SELECT COUNT(*) FROM product WHERE name='$name' AND seller_id='$seller_id'") > 0) {
    // $_SESSION['msg'] = "Product with this name already exists.";
} else {
    $query = "INSERT INTO product (name, description, unit_price, available_unit, image, seller_id, agent_id, unit, category)
              VALUES ('$name', '$description', '$price', '$quantity', '../".$path."', '$seller_id', NULL, '$unit', '$category')";
    if (write($query)) {
        // $_SESSION['msg'] = "Product added successfully.";
    } else {
        $_SESSION['msg'] = "Error adding product: " . mysqli_error($con);
    }
}
header("Location: ../views/seller/Add_Products.php");
?>