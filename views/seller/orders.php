<?php
// require_once('../../controllers/notifi.php');
require_once('../../controllers/authseller.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FarmLink - Seller Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/seller/style.css">
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/table.css">
</head>

<body>
<nav>
    <a href="home.php"><img class="logo" src="../../assets/img/farmlink_logo.jpg"></a>
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="home.php">Home</a></li>
        <li><a class="nav-link" href="Add_Products.php">Add products</a></li>
        <li><a class="nav-link" href="My_Products.php">My products</a></li>
        <li><a class="nav-link" href="orders.php">Orders</a></li>
    </ul>
    <!-- <input type="text" placeholder="Search..." id="searchbar" > -->
    <a class="orange_color" href="../../controllers/logout.php">Logout</a> 
    </div>
</nav>

<div id="notif"></div>

<div class="sections">
<h3>Track Orders</h3>
<button id="request">Requested Orders</button>
<button id="accepted">Accepted Orders</button>
<button id="process">On Process Orders</button>
<button id="delivered">Delivered Orders</button>
<button id="history">Order History</button>
<input type="text" name="" id="search_order" placeholder="Search Orders...">
<div id="order_table">
   <div class="product-list" id="product-list">
    <h4>Total Orders: <span id="count_order"></span></h4>
            <table>
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Price (per unit)</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Order id</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table_body">
                    <!-- //products will be loaded -->
                </tbody>
            </table>
        </div>
</div>
</div>

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
<script type="module" src="../../assets/js/seller/addproducts.js"></script>
<script type="module" src="../../assets/js/ajax.js"></script>
<script type="module" src="../../assets/js/seller/orders.js"></script>
</body>
</html>