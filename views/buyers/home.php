<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Home</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/home.css">

</head>
<body style="color: black;">
<nav >
    <img class="logo" src="../../assets/img/farmlink_logo.jpg" >
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="#Home">Home</a></li>
        <li><a class="nav-link" href="basket.php">Basket</a></li>
        <li><a class="nav-link" href="#Orders">Orders</a></li>
        <li><a class="nav-link" href="../about.php">About Us</a></li>
    </ul>
    <input type="text" placeholder="Search..." id="searchbar" >
     <a class="orange_color" href="../Login.php">Get Started</a>
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
        <div id="counter_btn"> <button type="button" class="counter_btns" id="increment_btn">+</button> <span id="value"> 0 </span><button type="button"  class="counter_btns" id="decrement_btn">-</button></div>
        <button class="card_btn" id="buy_btn">Buy</button> 
        <button class="card_btn" id="basket"> Basket</button> 
        </div>
        </div> 
       </div>
    </div>

    <!-- products for you section-->
     
    <div class="sections">
    <h2 class="sec_title">Products For You</h2>
    <div id="products_container2">
       <div id="products2" class ="products"> 
        <div class="p_details2">
        <img src="../../assets/img/Grow. Link. Thrive..png" alt="Product img">
        <h3>Product 1</h3>
        <div class="product_details"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam veritatis aspernatur iusto dolores nostrum voluptatum aut. Illum dolorum natus quaerat dolores eos doloribus praesentium, placeat nemo voluptatum rerum, explicabo non?</div>
        <p> Price $10.00</p>
        <button class="card_btn" id="buy_btn2">Buy</button>
        <button class="card_btn" id="basket2"> Basket</button> 
        <a href="product_details.php">link</a>
        </div>
        </div> 
       </div>
    </div>
<script src="../../assets/js/home.js"></script>
<img  id="basket_icon" src="../../assets/img/basket.png" alt="">
</body>
</html>
