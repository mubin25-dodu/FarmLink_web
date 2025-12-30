<?php
require_once('../../controllers/auth.php');
require('../../models/db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Product Details</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/home.css">
    <link rel="stylesheet" href="../../assets/css/buyer/product_details.css">


</head>
<body style="color: black;">
<nav >
    <a href="home.php"><img class="logo" src="../../assets/img/farmlink_logo.jpg" ></a>
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="home.php">Home</a></li>
        <li><a class="nav-link" href="basket.php">Basket</a></li>
        <li><a class="nav-link" href="#Orders">Orders</a></li>
        <li><a class="nav-link" href="../about.php">About Us</a></li>
    </ul>
    <input type="text" placeholder="Search..." id="searchbar" >
    <a class="orange_color" href="../../controllers/logout.php">Logout</a>
    
    </div>
</nav>
    <!-- product details -->
     <div id="details_container"> 
        <?php
        if(isset($_GET['id'])){
           $data =[];
           $data = read("Select * from product where product_id='{$_GET['id']}'");
        //    print_r($data[0]['unit_price']);
        ?>
     <img src="<?= $data[0]['image'] ?>" alt="Product img">
     <div class="details"> 
     <h2><?= $data[0]['name'] ?></h2>
     <b>Price: <?= $data[0]['unit_price']?> TK / <?= $data[0]['unit'] ?></b>
     <div  id="description"> <?= $data[0]['description'] ?></div>
     <div class="delivery_details"> Delivery details here  <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam earum ratione possimus veniam? Temporibus exercitationem ea nemo facilis, qui ut architecto animi magni vel quaerat sit quo eveniet, voluptas culpa.</div>
        <div id="counter_btn"> <button type="button" class="counter_btns" id="increment_btn">+</button> <span id="value"> 0 </span><button type="button"  class="counter_btns" id="decrement_btn">-</button></div>
        <div class="btndiv"> <button class="card_btn" id="buy_btn">Buy</button> 
        <button class="card_btn" id="basket"> Basket</button> </div> 
    </div>
    <?php
     }?>
</div>
    
<div class="sections"> <h3>Related products</h3>
     <div id="products_container">
       <div id="products" class ="products"> 
        <div class="p_details">
        <img src="../../assets/img/Grow. Link. Thrive..png" alt="Product img">
        <h3>Product 1</h3>
        <p> Price $10.00</p>
        <button class="card_btn" id="buy_btn">Buy</button> 
        <button class="card_btn" id="basket"> Basket</button> 
        </div>
        </div> 
       </div>

</div>
<img  id="basket_icon" src="../../assets/img/basket.png" alt="">
</body>
</html>
