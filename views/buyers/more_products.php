<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Home</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/home.css">
    <link rel="stylesheet" href="../../assets/css/buyer/more_products.css">

</head>
<body>

<div id="notif"></div>

<nav >
    <a href="home.php"><img class="logo" src="../../assets/img/farmlink_logo.jpg" ></a>
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="home.php">Home</a></li>
        <li><a class="nav-link" href="basket.php">Basket</a></li>
        <li><a class="nav-link" href="order.php">Orders</a></li>
        <li><a class="nav-link" href="../about.php">About Us</a></li>
    </ul>
 <?php session_start(); if(isset($_SESSION['user_data']) && $_SESSION['user_data']['role'] == 'Buyer'){ ?>
    <a class="orange_color" href="../../controllers/logout.php">Logout</a>
    <?php } else {  ?>
    <a class="orange_color" href="../Login.php">Login</a>
    <?php } ?>
    </div>
</nav>

    <!-- products for you section-->
    <div class="sections">
    <h2 class="sec_title"></h2>
    <input type="text" placeholder="Search by name..." id="search"> <br>
      Search By Category: <select name="category" id="category">
        <option value="">-- Select --</option>
                <option value="Vegetable">Vegetable</option>
                <option value="Fruit">Fruit</option>
                <option value="Fish">Fish</option>
                <option value="Meat">Meat</option>
                <option value="Dairy">Dairy</option>
                <option value="Egg">Egg</option>
                <option value="Other">Other</option>
     </select>
     <br><br><br>
    <div id="products_container2">
        <!-- Products will be loaded here dynamically -->
    </div>
       <div id="nest_prev">
        <button id="next"> Next </button>
        <button id="previous"> Previous </button>
       </div>
     </div>


<a href="basket.php"><img  id="basket_icon" src="../../assets/img/basket.png" alt=""></a>
<script src="../../assets/js/home.js"></script>
<script type="module" src="../../assets/js/more_products.js"></script>
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
