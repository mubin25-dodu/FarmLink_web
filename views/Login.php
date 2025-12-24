<?php
session_start();
$msg = null;
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

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
        <form action="../controllers/signup.php" method="post" >
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
            <br><button type="submit" name="submit" id="otpbtn" class="btn1" > Sign up</button> 
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
                <option class="inputreg" value="Buyer">Buyer</option>
                <option class="inputreg" value="Seller">Seller</option>
                <option class="inputreg" value="Agent">Agent</option>
            </select>
            <br><button type="button" id="sibtn" class="btn1" > Sign up</button> 
            
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

<script>window.DATA =<?php echo json_encode($msg); ?></script>
<script src="../assets/js/login.js"></script>
</body>
</html>
