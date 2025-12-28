<?php
// require('../../controllers/auth.php');
require('../../db/db.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Home</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/home.css">

</head>


<body style="color: black;">
<nav >
    <a href="home.php"><img class="logo" src="../../assets/img/farmlink_logo.jpg" ></a>
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="#Home">Home</a></li>
        <li><a class="nav-link" href="basket.php">Basket</a></li>
        <li><a class="nav-link" href="#Orders">Orders</a></li>
        <li><a class="nav-link" href="../about.php">About Us</a></li>
    </ul>
    <input type="text" placeholder="Search..." id="searchbar" >

    <?php if(isset($_SESSION['user_data']) && $_SESSION['user_data']['role'] == 'Buyer'): ?>
    <a class="orange_color" href="../../controllers/logout.php">Logout</a>
    <?php else:  ?>
    <a class="orange_color" href="../Login.php">Login</a>
    <?php endif; ?>
    
    </div>
</nav>
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
       $products=read('select * from product');
    //    print_r($products);
        foreach($products as $a){?> 

        <div id="" class ="products"> 
        <div class="p_details2">
        <img src="<?= $a['image']?>" alt="Product img">
        <h3><?=   $a['name']?></h3>
        <div class="product_details"><?=$a['description']?></div>
        <p>Price:<?= $a['unit_price']?>Tk/<?= $a['unit']?></p>
        <div>
        <button type="submit" name="basket" class="card_btn" > Basket</button> 
        <button class="card_btn"> Details</button> 
         </div>
        </div>      
        </div> 
   <?php }?>
       </div>
    </div>
<script src="../../assets/js/home.js"></script>
<img  id="basket_icon" src="../../assets/img/basket.png" alt="">
</body>
</html>
