<?php
require('../../controllers/auth.php');
require('../../models/db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Checkout</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/pyment.css">
    <link rel="stylesheet" href="../../assets/css/buyer/basket.css">  
    <link rel="stylesheet" href="../../assets/css/buyer/order.css">   



</head>
<body>
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

<div id="notif"></div>

<div class="sections">
    <h3>My Orders</h3>
    <div class="container">

        <div class="pending">

    <h4 class="title">Pending & Processing Orders</h4>
    <?php  $products=[];
       $products = read("select * from orders where user_id='{$_SESSION['user_data']['uid']}' and (status = 'pending' or status = 'processing')");
    // print_r($products);
    if($products==null){
        echo "<p>No pending or processing orders found.</p>";
    }else{
        foreach($products as $a){
            $img = readone("select image from product where product_id='{$a['product_id']}'");
            $name = readone("select name from product where product_id='{$a['product_id']}'");
        // echo $a['product_id'];

            ?> 
            <div id="products_payment" class="products_payment" style="position:relative;">
                <img class="img" src="<?= $img ?>" alt="">
                <div><h3 class="name"><?= $name?></h3> 
                <p class="price">Price <span> <?= ($a['total_price']/$a['quantity']) ?> x <span><?= $a['quantity'] ?></span></span></p></div>
                <div>
                    <div class="total">Total Price: <span><?= $a['total_price'] ?></span></div>
                </div> 
                <div>
                <a class="basketbtn" href="product_details.php?id=<?= $a['product_id'] ?>">View Product</a>
                </div>
                <div class="order-status-label order-status-right"><?= ucfirst($a['status']) ?></div>
            </div>
        <?php }
    }
    ?>
    </div>

    <div class="empty"></div>
    <div class="successful">
        <h4 class="title">Successful Orders</h4>
        <?php
        $success_orders = read("select * from orders where user_id='{$_SESSION['user_data']['uid']}' and status = 'successful'");
        if($success_orders==null){
            echo "<p>No successful orders found.</p>";
        }else{
            foreach($success_orders as $a){
                $img = readone("select image from product where product_id='{$a['product_id']}'");
                $name = readone("select name from product where product_id='{$a['product_id']}'");
            // echo $a['product_id'];?>
            <div id="products_payment" class="products_payment">
                    <div class="order-status-label"><?= ucfirst($a['status']) ?></div>
                    <img class="img" src="<?= $img ?>" alt="">
                    <div><h3 class="name"><?= $name?></h3> 
                    <p class="price">Price <span> <?= ($a['total_price']/$a['quantity']) ?> x <span><?= $a['quantity'] ?></span></span></p></div>
                    <div>
                        <div class="total">Total Price: <span><?= $a['total_price'] ?></span></div>
                    </div> 
                    <div>
                    <a class="basketbtn" href="product_details.php?id=<?= $a['product_id'] ?>">View Product</a>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    </div>
    
</div>

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
