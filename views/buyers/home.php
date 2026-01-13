<?php
// require('../../controllers/auth.php');
require('../../models/db.php');
require('../../controllers/notifi.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Home</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/home.css">

</head>
<body>

<div id="notif"></div>

<nav >
    <!-- <?php print_r($_SESSION['user_data']) ?> -->

    <a href="home.php"><img class="logo" src="../../assets/img/farmlink_logo.jpg" ></a>
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="#Home">Home</a></li>
        <li><a auth="" class="nav-link" href="basket.php">Basket</a></li>
        <li><a auth="" class="nav-link" href="order.php">Orders</a></li>
        <li><a  class="nav-link" href="../about.php">About Us</a></li>
    </ul>
    <input type="text" placeholder="Search..." id="searchbar" >
    <?php if(isset($_SESSION['user_data']) && $_SESSION['user_data']['role'] == 'Buyer'){ ?>
    <a class="orange_color" href="../../controllers/logout.php">Logout</a>
    <?php } else {  ?>
    <a class="orange_color" href="../Login.php">Login</a>
    <?php } ?>
    </div>
</nav>

 <!-- <div id="notification"><input id="notification_input" type="text" value="<?php if(isset($_SESSION['notif']['msg'])) {echo $_SESSION['notif']['msg']; } ?>"></div> -->
 <!-- ad  section-->
<div  id="ad">
    <div id="ad_banner"> </div>
    <button type="button" id="left_btn"><</button>
    <button type="button" id="right_btn">></button>
</div>
<!-- products section-->
<div class="sections">
    <h2 class="sec_title">Most selled products</h2>
    <div id="products_container">
       <div id="products" class ="products"> 
        <div class="p_details">
        <img src="../../assets/img/Grow. Link. Thrive..png" alt="Product img">
        <h3>Product 1</h3>
        <p> Price $10.00</p>
        <button class="card_btn"> Details</button> 
        </div>
        </div> 
       </div>
    </div>

    <!-- products for you section-->
     
    <div class="sections">
    <h2 class="sec_title">Products For You</h2>
             <div id="products_container2">
   <?php  $products=[];
       $products=read('select * from product where available_unit > 0');
    //    print_r($products);
        foreach($products as $a){?> 

        <div id="" class ="products"> 
        <div class="p_details2">
        <img class="image" src="../<?= $a['image']?>" alt="Product img">
        <h3><?=   $a['name']?></h3>
        <div class="product_details"><?=$a['description']?></div>
        <p>Price: <?= $a['unit_price']?>Tk/<?= $a['unit']?></p>
        <div>
        <!-- <a href="payment.php?id=<?= $a['product_id']?>"><button class="card_btn" >Buy </button></a>  -->
        <a pid="<?= $a['product_id']?> " class="basket"><button class="card_btn" >Basket </button></a> 
        <a href="product_details.php?id=<?= $a['product_id']?>"><button class="card_btn" >Details </button></a> 
         </div>
        </div>      
        </div> 
   <?php }?>
       </div>
   <a href="more_products.php">See more..</a>

    </div>

<a href="basket.php"><img  id="basket_icon" src="../../assets/img/basket.png" alt=""></a>

<script type="module" src="../../assets/js/home.js"></script>
<script type="module" src="../../assets/js/notification.js"></script>
<script type="module" src="../../assets/js/search.js"></script>

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
</html>
