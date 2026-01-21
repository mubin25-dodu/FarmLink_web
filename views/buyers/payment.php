<?php
require('../../controllers/auth.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Checkout</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/pyment.css">
    <link rel="stylesheet" href="../../assets/css/buyer/basket.css">   


</head>
<body">
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

<!-- products -->
<div class="sections">
    <div class="container"> 
        <div class="bar"> <p class="p1">Order Information</p>
        <p class="p2">Payment</p>
        <P class="p3">Confirmation</P></div>
        <p class="uline"></p>
        <div class="cards">
            <div>
            <div id="card1" class="card1"> 
                <h4>Order Information</h4>
                  <div style="display:none" id="products_payment" class="products_payment">
                    <img class="img" src="../../assets/img/basket.png" alt=""  onerror="this.src='../../assets/img/default.png'">
                    <div><h3 class="name">Product Name</h3> 
                    <p class="price">Price</p></div>
                    <div>
                    <div class="total">Total Price: $0.00</div></div> 
                    <div>
                    <button class="basketbtn">Remove</button>
                    </div>

            </div>
         </div> 

         <!-- delivery -->
         <div class="card2">
            <h4>Delivery Information</h4>
            </div>
            </div>

            <!-- payment info -->

            <div class="card3">
                <h4>Payment Information</h4><br><br>
                <div class="info"> 
                    Name: <br>
                    <input id="name" type="text" placeholder="Abdullah Al Mubin"><br>
                    Phone: <br>
                    <input id="phone" type="text" placeholder="+8801XXXXXXXXX"><br>
                    Address: <br>
                    <input id="address" type="text" placeholder="House No, Street, City"><br>
                    Payment Method: <br>
                    <select name="payment" id="payment">
                        <option value="bkash">bKash</option>
                        <option value="nagad">Nagad</option>
                        <option value="rocket">Rocket</option>
                        <option value="cod">Cash on Delivery</option>
                    </select>
                    <br>
                    City: <br>
                    <select name="city" id="city">
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chattogram">Chattogram</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="mymensingh">Mymensingh</option>
                    </select>
                    <button id="paybtn" class="paybtn">Pay</button>

                </div>
            </div>
    </div>
</div>
</div>
<div class="order_confirm_container">
    <div class="order_confirm">
        <h2>Order Confirmed!</h2>
        <p>Thank you for your purchase. Your order has been successfully placed.</p>
        <button id="continue_shopping" class="continue_shopping">Continue Shopping</button>
    </div>
</div>
</body>
<script  type="module" src="../../assets/js/basket&payment.js"></script>
<script  type="module" src="../../assets/js/login.js"></script>
<script type="module" src="../../assets/js/search.js"></script>

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
