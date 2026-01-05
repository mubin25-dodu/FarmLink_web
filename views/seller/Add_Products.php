<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FarmLink - Seller Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/seller/style.css">
    <link rel="stylesheet" href="../../assets/css/comon.css">
</head>

<body>
<nav>
    
    <a href="home.php"><img class="logo" src="../../assets/img/farmlink_logo.jpg"></a>
    <div id="navbtn"> 
    <ul>
        <li><a class="nav-link" href="home.php">Home</a></li>
        <li><a class="nav-link" href="Add_Products.php">Add products</a></li>
        <li><a class="nav-link" href="My_products.php">My Products</a></li>
        <li><a class="nav-link" href="#orders">Orders</a></li>
    </ul>
    <input type="text" placeholder="Search..." id="searchbar" >
    <a class="orange_color" href="../../controllers/logout.php">Logout</a>
    
    </div>
</nav>
<!-- Notification Div -->
<div id="notif"></div>
<div class="page-wrap">
 <form  id="product_form" action="../../models/addproducts.php" method="post" enctype="multipart/form-data">
    <div class="left-form">
        <div class="field">
            <label>Product Name</label>
            <input id="product_name" name="name" type="text" placeholder="Example: Mango, Potato, Fish">
        </div>

        <div id="product_type" class="field">
            <label>Product Type / Category</label>
            <select id ="type_select" name="category">
                <option value="">-- Select --</option>
                <option value="Vegetable">Vegetable</option>
                <option value="Fruit">Fruit</option>
                <option value="Fish">Fish</option>
                <option value="Meat">Meat</option>
                <option value="Dairy">Dairy</option>
                <option value="Egg">Egg</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div  class="field">
            <label>Quantity</label>
            <input id="quantity" name="quantity" type="number">
        </div>

        <div  class="field">
            <label>Unit</label>
            <input id="unit" name="unit" type="text" placeholder="Example: Kg, Liter, Dozen">
        </div>

        <div  class="field">
            <label>Description</label>
            <textarea id="description" name="description" placeholder="Enter product details"></textarea>
        </div>

        <div class="field">
            <label>Price</label>
            <input id="price" name="price" type="number" placeholder="Example: 200 Taka">
            <small class="govt-price-note">*Price must be within government rate</small>
            <div >
                <input type="checkbox" id="matchGovtPrice">  Sync with government rate
            </div>
            <!-- <label>If you want to give less than government price, enter here</label>
            <input type="text" placeholder="Enter lower price"> -->
        </div>

        <div class="field">
            <label>Upload Image</label>
            <div class="image-box" id="img-box"></div>
            <input  type="file" accept="image/*" name="file" id="file">
        </div>

        <div class="submit-wrap">
            
            <button type="button"  id="submit_btn" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

    <!-- <div class="preview">
        <div class="top-left-box">View government price here</div>
        <input type="text" class="tag" placeholder ="Product Name">
    </div> -->

</div>

<script type="module" src="../../assets/js/seller/addproducts.js"></script>
<script type="module" src="../../assets/js/ajax.js"></script>
<script> 
    var fileInput = document.getElementById('file');
    var imgBox = document.getElementById('img-box');
    
    fileInput.addEventListener('change', function(event) {
        if (event.target.files && event.target.files[0]) {
            var imageUrl = URL.createObjectURL(event.target.files[0]);
            imgBox.style.backgroundImage = "url('" + imageUrl + "')";
            imgBox.style.backgroundSize = "cover";
            imgBox.style.backgroundPosition = "center";
        }
    });
</script>
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