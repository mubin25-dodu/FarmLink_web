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
                  <div id="products_payment" class="products_payment">
                    <img src="../../assets/img/basket.png" alt="">
                    <div><h3>Product Name</h3> 
                    <p>Price</p></div>
                    <div>
                    <div>Total Price: $0.00</div></div> 
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
                    <input type="text" placeholder="Abdullah Al Mubin"><br>
                    Phone: <br>
                    <input type="text" placeholder="+8801XXXXXXXXX"><br>
                    Address: <br>
                    <input type="text" placeholder="House No, Street, City"><br>
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
                        <option value="dhaka">Dhaka</option>
                        <option value="chattogram">Chattogram</option>
                        <option value="sylhet">Sylhet</option>
                        <option value="khulna">Khulna</option>
                        <option value="barishal">Barishal</option>
                        <option value="rajshahi">Rajshahi</option>
                        <option value="rangpur">Rangpur</option>
                        <option value="mymensingh">Mymensingh</option>
                    </select>
                    <button class="paybtn">Pay</button>

                </div>
            </div>
    </div>
</div>
</body>
<script src="../../assets/js/basket&payment.js"></script>

</html>
