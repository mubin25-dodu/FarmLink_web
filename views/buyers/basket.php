<?php
require_once('../../controllers/auth.php');
require_once('../../models/db.php');
require_once('../../controllers/notifi.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Shopping Basket</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/basket.css">

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
<div id="notif"></div>
 <div class="sections"><h3>Your Basket</h3>
    <div class="datas">
    <h5>Selected product:0</h5> 
    <h5 id="total">Total Price: 0 TK</h5>
    </div>

 <!-- <form action="buy.php" method="post" id="basket_form"> -->
    <div id="container">
     <?php 
      $data=[];
      $d=[];
      $data= read("select * from basket where buyer_id='{$_SESSION['user_data']['uid']}'");
    //    print_r($data);
      foreach($data as $u){
        $d= read("select * from product where product_id='{$u['product_id']}'");
        foreach($d as $p){
           
    ?>
    <div class="products">
    <img src="<?= $p['image']?>" alt="">
    <div><h3><?= $p['name']?></h3> 
    <p>Price: <span class="unit_price"><?= $p['unit_price']?></span>TK/<?= $p['unit']?></p>
    <p>Available:<span class="available"><?= $p['available_unit']?></span></p></div>
    <div>
    <div id="counter_btn"> <button type="button" class="increment_btn" id="increment_btn">+</button> <span class="value">0</span><button type="button"  class="decrement_btn" id="decrement_btn">-</button></div>
    <div><span>Total Price: </span><span class="total_price"></span></div></div> 
    <div>
    <a href="../../models/remove.php?id=<?= $u['basket_id'] ?>" class="basketbtn" name="<?php echo $u['basket_id'] ?>">Remove</a>
    <input type="checkbox" name="checkbox" class="basket_ck" >
    </div>   
    </div> 
   <?php }}?>
</div>
<button type="button" class="checkoutbtn" id="checkoutbtn">Checkout</button>
<!-- </form> -->
</div>
<img  id="basket_icon" src="../../assets/img/basket.png" alt="">
<<<<<<< Updated upstream
</body>
<script src="../../assets/js/basket&payment.js"></script>
<script> 
</script>
=======
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
>>>>>>> Stashed changes
</html>
