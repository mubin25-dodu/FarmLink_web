<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Shopping Basket</title>
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/buyer/basket.css">

</head>
<body style="color: black;">
<nav >
    <img class="logo" src="../../assets/img/farmlink_logo.jpg" >
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="home.php">Home</a></li>
        <li><a class="nav-link" href="basket.php">Basket</a></li>
        <li><a class="nav-link" href="orders.php">Orders</a></li>
        <li><a class="nav-link" href="../about.php">About Us</a></li>
    </ul>
    <input type="text" placeholder="Search..." id="searchbar" >
     <a class="orange_color" href="../Login.php">Get Started</a>
    </div>
</nav>

 <div class="sections"><h3>Your Basket</h3>
    <div class="datas">
    <h5>Selected product:0</h5> 
    <h5>Total Price: $0.00</h5>
    </div>

 <div id="container">
    <div class="products">
    <img src="../../assets/img/basket.png" alt="">
    <div><h3>Product Name</h3> 
    <p>Price</p></div>
    <div>
    <div id="counter_btn"> <button type="button" class="counter_btns" id="increment_btn">+</button> <span id="value"> 0 </span><button type="button"  class="counter_btns" id="decrement_btn">-</button></div>
    <div>Total Price: $0.00</div></div> 
    <div>
    <button class="basketbtn">Remove</button>
    <input type="checkbox" name="checkbox" class="basket_ck" >
    </div>
</div> 

    <div class="products">
    <img src="../../assets/img/basket.png" alt="">
    <div><h3>Product Name</h3> 
    <p>Price</p></div>
    <div>
    <div id="counter_btn"> <button type="button" class="counter_btns" id="increment_btn">+</button> <span id="value"> 0 </span><button type="button"  class="counter_btns" id="decrement_btn">-</button></div>
    <div>Total Price: $0.00</div></div> 
    <div>
    <button class="basketbtn">Remove</button>
    <input type="checkbox" name="checkbox" class="basket_ck" >
    </div>
</div>
</div>
<button class="checkoutbtn" id="checkoutbtn">Checkout</button>
</body>
<img  id="basket_icon" src="../../assets/img/basket.png" alt="">
</html>
