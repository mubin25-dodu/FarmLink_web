<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FarmLink - Seller Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>

<nav>
    <img class="logo" src="../../assets/img/farmlink_logo.jpg">
    <ul>
        <li><a class="nav-link" href="#home">Home</a></li>
        <li><a class="nav-link" href="#products">Product List</a></li>
        <li><a class="nav-link" href="#orders">Orders</a></li>
        <li><a class="nav-link" href="#payment">Payment</a></li>
        <li><a class="nav-link" href="#agent">Agent</a></li>
        <li><a class="orange_color" href="../Login.php">Logout</a></li>
    </ul>
</nav>

<div id="ad">
    <div id="ad_banner"></div>
    <button type="button" id="left_btn">&lt;</button>
    <button type="button" id="right_btn">&gt;</button>
</div>

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
            <input type="text">
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
            <input type="text" placeholder="Example: 200 Taka">
            <small class="govt-price-note">*Price must be within government rate</small>
            <div>Match with government rate</div>
            <div class="tick-wrap">
                <input type="checkbox" id="matchGovtPrice"> Okay
            </div>
            <label>If you want to give less than government price, enter here</label>
            <input type="text" placeholder="Enter lower price">
        </div>

        <div class="field">
            <label>Upload Image</label>
            <div class="image-box"></div>
        </div>

        <div class="submit-wrap">
            <button class="submit-btn">Submit</button>
        </div>

    </form>

    <div class="preview">
        <div class="top-left-box">View government price here</div>
        <input type="text" class="tag" placeholder ="Product Name">
    </div>

</div>

<script src="../../assets/js/home.js"></script>
</body>
</html>