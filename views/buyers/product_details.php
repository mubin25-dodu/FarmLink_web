<?php
// require_once('../../controllers/auth.php');
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
        <li><a class="nav-link" href="order.php">Orders</a></li>
        <li><a class="nav-link" href="../about.php">About Us</a></li>
    </ul>
    <input type="text" placeholder="Search..." id="searchbar" >
    <a class="orange_color" href="../../controllers/logout.php">Logout</a>
    
    </div>
</nav>
    <!-- Notification Div -->
<div id="notif"></div>
    <!-- product details -->
     <div id="details_container"> 
        <?php
        if(isset($_GET['id'])){
           $data =[];
           $data = read("Select * from product where product_id='{$_GET['id']}'");
        //    print_r($data[0]['unit_price']);
        $id=$_GET['id'];
        ?>
     <img id="image" src="<?= $data[0]['image'] ?>" alt="Product img">
     <div class="details"> 
     <h2 id="name"><?= $data[0]['name'] ?></h2>
     <b>Price: <span id="price" > <?= $data[0]['unit_price']?></span> TK / <?= $data[0]['unit'] ?></b>
     <div  id="description"> <?= $data[0]['description'] ?></div>
     <div class="delivery_details"> Delivery details here  <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam earum ratione possimus veniam? Temporibus exercitationem ea nemo facilis, qui ut architecto animi magni vel quaerat sit quo eveniet, voluptas culpa.</div>
      <span style="font-weight: bold;" id="totalprice"></span>
        <div id="counter_btn"> <button type="button" class="increment_btn" id="increment_btn">+</button> <span id="value">0</span> <button type="button" class="decrement_btn" id="decrement_btn">-</button> </div><div > Available: <span id="available_unit"><?= $data[0]['available_unit'] ?></span></div>
        <div class="btndiv"> <a class="card_btn" id="buy_btn">Buy</a>
        <label id="pid" style="display: none;"><?= $id ?></label> 
        <button class="card_btn" id="basket"> Basket</button> </div> 
    </div>
    <?php
     }?>
</div>
    
<!-- <div class="sections"> <h3>Related products</h3>
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
       </div> -->

</div>
<a href="basket.php"><img  id="basket_icon" src="../../assets/img/basket.png" alt=""></a>
</body>
<footer>
    <div class="footer-container">
        <div class="footer-top">
            <div class="footer-brand">
                <h3>FarmLink</h3>
                <p>Connecting farmers & consumers — Fresh, Fair, Fast.</p>
                <div class="footer-socials">
                    <a href="https://facebook.com"><img src="../../assets/img/facebook.png" alt="Facebook"></a>
                    <a href="https://instagram.com"><img src="../../assets/img/instagram.png" alt="Instagram"></a>
                    <a href="https://youtube.com"><img src="../../assets/img/youtube.png" alt="YouTube"></a>
                    <a href="https://twitter.com"><img src="../../assets/img/twitter.png" alt="Twitter"></a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Marketplace</a></li>
                    <li><a href="#">Become a Seller</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-support">
                <h4>Customer Support</h4>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Shipping & Delivery</a></li>
                    <li><a href="#">Refund Policy</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-newsletter">
                <h4>Stay in the Loop</h4>
                <p>Get the latest farm-fresh updates & exclusive offers.</p>
                    <input type="email" placeholder="Enter your email">
                    <button type="submit">Subscribe</button>
                <div class="footer-badges">
                    <button>Fresh & Local</button>
                    <button>Secure Payments</button>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2025 FarmLink. All rights reserved.</span>
            <span class="footer-made">Made with <span style="color: red;">♥</span> in Bangladesh</span>
        </div>
    </div>
</footer>
<script type="module" src="../../assets/js/product_details.js"></script>
<script type="module" src="../../assets/js/search.js"></script>
</html>
