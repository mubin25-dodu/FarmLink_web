import { validate } from "./ajax.js";
import { notifyUser} from "./login.js";

var count = 0;
let inc = document.getElementById("increment_btn");
let dec = document.getElementById("decrement_btn");
let value = document.getElementById("value");
let price = document.getElementById("price").innerText;
let available = document.getElementById("available_unit");
let totalprice = document.getElementById("totalprice");
let basket = document.getElementById("basket");
let pid = document.getElementById("pid").innerText.trim();

function updateTotalPrice() {
    totalprice.innerText = "Total Price: " + (count * parseFloat(price)) + " TK";
}

if (inc && dec) {
    inc.addEventListener("click", function () {
        if (count < parseInt(available.innerText)) {
            count++;
            value.innerText = count;
            updateTotalPrice();
        } else {
            alert("No more available units");
        }
    });
    dec.addEventListener("click", function () {
        if (count > 0) {
            count--;
            value.innerText = count;
            updateTotalPrice();
        }
    });
}

basket.addEventListener("click", function() {
    if (count < 1) {
        notifyUser("Please select a quantity.", "red");
    }
    else{
        console.log("Adding to basket");
        validate( {id: pid, quantity: count} , "../../controllers/addtobasket.php", function(data){
            console.log(data);
            
            if(data.status === "Not loggedin"){
                notifyUser("Please login to add products to basket",'red');
                  }
                    else if(data.status === "Product already in basket"){
                        notifyUser("Product already in basket", "red");
                    }
                    else if(data.status === "Product added to basket"){
                        notifyUser("Product added to basket", "green");
                    }
                });
            }
        });

let buybtn = document.getElementById("buy_btn");
buybtn.addEventListener("click", function() {
    if (count < 1) {
        notifyUser("Please select a quantity.", "red");
    }
    else{
        validate( {action: 'check'} , "../../controllers/auth.php", function(data){
            console.log(data);
            if(data.status === "Not loggedin"){
                notifyUser("Please login to buy the product",'red');
            }
        else{
        let products=[];
        products.push({ 
            img: document.getElementById("image").src,
            name: document.getElementById("name").innerText,
            id: document.getElementById("pid").innerText,
            quantity: count, 
            unit_price: price});
           localStorage.setItem("products", JSON.stringify(products));
           window.location.href = "payment.php";
        }
    });

    }
    

});
updateTotalPrice();
