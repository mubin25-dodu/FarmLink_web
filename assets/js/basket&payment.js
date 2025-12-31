// import { notifyUser } from './login.js';

// basket

let inc = document.querySelectorAll(".increment_btn");
let dec = document.querySelectorAll(".decrement_btn");
let value = document.querySelectorAll(".value");
let total = document.querySelectorAll(".total_price");
let available = document.querySelectorAll(".available");
let unit_price = document.querySelectorAll(".unit_price");
let checkbox = document.querySelectorAll(".basket_ck");
let totalDisplay = document.getElementById("total");
let removebtn = document.querySelectorAll(".basketbtn");

let products = [];
let total_price = 0; 

// calculation
for(let i=0; i<inc.length; i++){
    let av = parseInt(available[i].innerText);
    let price = parseFloat(unit_price[i].innerText);
    let val = 0;
 
    value[i].innerText = val;
    total[i].innerText = "0 TK";

    inc[i].addEventListener("click", function(){
        if(val < av){
            val++;
            value[i].innerText = val;
            total[i].innerText = (val * price) + " TK";
             updateTotal()
        }
    });

    dec[i].addEventListener("click", function(){
        if(val > 0){
            val--;
            value[i].innerText = val;
            total[i].innerText = (val * price) + " TK";
             updateTotal();
        }
    });
    checkbox[i].addEventListener("change", function(){
    if(this.checked){
        if(val === 0){
        //    notifyUser("Please select quantity greater than 0 to add to checkout",'red');
          alert("Please select quantity greater than 0 to add to checkout");
          this.checked = false;
        }
         else{
             products.push({ product_id: removebtn[i].name, quantity: val, unit_price: price});
            updateTotal();}
        console.log(products);

     }else{
        products = products.filter(p => p.product_id !== removebtn[i].name);
        updateTotal();
        console.log(products);
     }
    });
}

function updateTotal() {
    let total_price = 0;
    for(let i=0; i<checkbox.length; i++){
        if(checkbox[i].checked){
            let qty = parseInt(value[i].innerText);
            let price = parseFloat(unit_price[i].innerText);
            total_price += qty * price;
        }
    }
    totalDisplay.innerText = "Total Price: " + total_price + " TK";
}

let checkoutBtn = document.getElementById("checkoutbtn");
if(checkoutBtn)checkoutBtn.addEventListener("click", function(){
    if(products.length === 0){
        alert("Please select at least one product to checkout");
    }else{
        window.location.href = "payment.php";        
    }
});

// payment
if(window.location.href.includes("payment.php")){
    loadpayments();
}
function loadpayments(){

for(let i=0; i<5; i++){
    console.log("Loading payment products");

let cards = document.getElementById("products_payment");
let container = document.getElementById("card1");
let products= cards.cloneNode(true);
container.appendChild(products);
}
}