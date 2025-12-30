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

 <div class="sections"><h3>Your Basket</h3>
    <div class="datas">
    <h5>Selected product:0</h5> 
    <h5>Total Price: $0.00</h5>
    </div>

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
    <p>Price: <?= $p['unit_price']?>TK/<?= $p['unit']?></p></div>
    <div>
    <div id="counter_btn"> <button type="button" class="counter_btns" id="increment_btn">+</button> <span id="value"> 0 </span><button type="button"  class="counter_btns" id="decrement_btn">-</button></div>
    <div>Total Price: $0.00</div></div> 
    <div>
    <button class="basketbtn">Remove</button>
    <input type="checkbox" name="checkbox" class="basket_ck" >
    </div>   
    </div> 
   <?php }}?>
</div>
</div>
<button class="checkoutbtn" id="checkoutbtn">Checkout</button>
</body>
<img  id="basket_icon" src="../../assets/img/basket.png" alt="">
</html>
