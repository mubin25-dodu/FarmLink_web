<?php
require_once('../../controllers/authseller.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>FarmLink - Seller Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="../../assets/css/comon.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>
<body style="color: black;">
<nav >
    <a href="home.php"><img class="logo" src="../../assets/img/farmlink_logo.jpg" ></a>
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="#Home">Home</a></li>
        <li><a class="nav-link" href="My_Products.php">My products</a></li>
        <li><a class="nav-link" href="#Orders">Orders</a></li>
        <li><a class="nav-link" href="../about.php">About Us</a></li>
    </ul>
    <input type="text" placeholder="Search..." id="searchbar" >
    <a class="orange_color" href="../../controllers/logout.php">Logout</a>
    
    </div>
</nav>

<script src="../../assets/js/home.js"></script>
</body>
</html>
