<?php
session_start();
if(isset( $_SESSION['status']) && $_SESSION['status'] !== 'seller'){
    header("Location: ../Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FarmLink - Seller Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/seller/style.css">
</head>

<body>

<nav>
    <img class="logo" src="../../assets/img/farmlink_logo.jpg">
    <ul>
        <li><a class="nav-link" href="home.php">Home</a></li>
        <li><a class="nav-link" href="#products">My products</a></li>
        <li><a class="nav-link" href="#orders">Orders</a></li>
        <li><a class="nav-link" href="#payment">Payment</a></li>
        <li><a class="nav-link" href="#agent">Agent</a></li>
        <li><a class="orange_color" href="../../controllers/logout.php">Logout</a></li>
    </ul>
</nav>



<div class="page-wrap">

    <form class="left-form">

        <div class="field">
            <label>Product Name</label>
            <input type="text" placeholder="Example: Mango, Potato, Fish">
        </div>

        <div class="field">
            <label>Product Type / Category</label>
            <select>
                <option value="">-- Select --</option>
                <option value="Vegetable">Vegetable</option>
                <option value="Fruit">Fruit</option>
                <option value="Fish">Fish</option>
                <option value="Meat">Meat</option>
                <option value="Dairy">Dairy</option>
                <option value="Egg">Egg</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="field">
            <label>Quantity</label>
            <input type="number">
        </div>

        <div class="field">
            <label>Unit</label>
            <input type="text" placeholder="Example: Kg, Liter, Dozen">
        </div>

        <div class="field">
            <label>Description</label>
            <textarea placeholder="Enter product details"></textarea>
        </div>

        <div class="field">
            <label>Price</label>
            <input type="number" placeholder="Example: 200 Taka">
            <small class="govt-price-note">*Price must be within government rate</small>
            <div >
                <input type="checkbox" id="matchGovtPrice">  Sync with government rate
            </div>
            <!-- <label>If you want to give less than government price, enter here</label>
            <input type="text" placeholder="Enter lower price"> -->
        </div>

        <div class="field">
            <label>Upload Image</label>
            <div class="image-box" id="img-box"></div>
            <input type="file" accept="image/*" id="file">
        </div>

        <div class="submit-wrap">
            <button class="submit-btn">Submit</button>
        </div>
    </form>

    <!-- <div class="preview">
        <div class="top-left-box">View government price here</div>
        <input type="text" class="tag" placeholder ="Product Name">
    </div> -->

</div>

<script src="../../assets/js/home.js"></script>
<script> 
    var fileInput = document.getElementById('file');
    var imgBox = document.getElementById('img-box');
    
    fileInput.addEventListener('change', function(event) {
        if (event.target.files && event.target.files[0]) {
            var imageUrl = URL.createObjectURL(event.target.files[0]);
            imgBox.style.backgroundImage = "url('" + imageUrl + "')";
            imgBox.style.backgroundSize = "cover";
            imgBox.style.backgroundPosition = "center";
        }
    });
</script>
</body>
</html>