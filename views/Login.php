<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmLink - Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/comon.css">
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init({
        // publicKey: "LhdG6Wko_lHnMBJ6n",
      });
   })();
</script>
</head>
<body>
    <nav >
    <img class="logo" src="../assets/img/farmlink_logo.jpg" >
    <ul>
        <li><a class="nav-link" href="buyers/home.php">Home</a></li>
        <li><a class="nav-link" href="#Basket">Basket</a></li>
        <li><a class="nav-link" href="#Orders">Orders</a></li>
        <li><a class="nav-link" href="about.php">About Us</a></li>
    </ul>
</nav> 
<div id="notif"></div>


<div id="con"> <div id="reg_log"> 
    <div id="signup"> 
        <form action="../controllers/signup.php" method="post" id="reg_form">
            <!-- signup form-->
            <h3 class="inputreg">Enter your details</h3>
            <label class="inputreg" for="name">Full name:</label> <br><input type="text" name="name" class="inputreg" id="name"><br>
            <label class="inputreg" for="number">Phone number:</label> <br><input type="number" name="num" class="inputreg" id="number"><br>
            <label class="inputreg" for="email">Email:</label> <br><input type="email"class="inputreg" name="email"id="email"><br>
            <label class="inputreg" for="pass">Enter password:</label> <br><input type="password"class="inputreg" name="pass"id="pass"><br>
            <label class="inputreg" for="cpass">Confirm password:</label> <br><input type="password"class="inputreg"id="cpass" name="cpass"><br>
            <div id="otp"> 
             Enter OTP sent to you
             <br><input type="text" id="otp_input"><br>
            <button type="button"   id="otpbtn" class="btn1" > Done</button> 
            </div>
            <label class="inputreg" for="role">Role:</label> <select class="inputreg" name="role" id="role">
                <option class="inputreg" value="">Select a role</option>
                <option class="inputreg" value="Buyer">Buyer</option>
                <option class="inputreg" value="Seller">Seller</option>
                <option class="inputreg" value="Agent">Agent</option>
            </select>
            <br> 
            <label class="inputreg" for="address">Full address:</label> <br><input type="text"class="inputreg" name="address" id="address"><br>
            <label class="inputreg" for="city">City:</label></label> <select class="inputreg" name="city" id="city">
                <option class="inputreg" value="">Select a city</option>
                <option class="inputreg" value="Dhaka">Dhaka</option>
                <option class="inputreg" value="Chattogram">Chattogram</option>
                <option class="inputreg" value="Khulna">Khulna</option>
                <option class="inputreg" value="Rajshahi">Rajshahi</option>
                <option class="inputreg" value="Barishal">Barishal</option>
                <option class="inputreg" value="Sylhet">Sylhet</option>
                <option class="inputreg" value="Rangpur">Rangpur</option>
                <option class="inputreg" value="Mymensingh">Mymensingh</option>
            </select>
            <br><button type="" name="" id="sibtn" class="btn1" > Sign up</button> 
            
        </form>
    </div>
            <!-- login form-->
        <div id="login"> 
        <form action="../controllers/login.php" method="post">
            <h3>Enter credentials</h3>
            Email or Phone: <br><input type="text" name="email_or_phone"><br>
            Password: <br><input type="password" name="password"><br>
            <button class="btn1" type="submit" name="submit" id="loginbtn"> Login</button>
        </form>
    </div>
            <!-- slider-->

    <div id="slider"> 
    <img style="width: 300px;" src="../assets/img/Grow. Link. Thrive..png" alt="">
    <p id="reg_P">Don't Have an account!!</p>
    <button id="signupbtn">Signup</button>
</div>
    </div> </div>

<script src="../assets/js/login.js"></script>
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
