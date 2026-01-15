// import { notifyUser } from './login.js';
import { validate } from './ajax.js';

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
let del_charges = 0;

// calculation
for(let i=0; i<inc.length; i++){
    let av = parseInt(available[i].innerText);
    let price = parseFloat(unit_price[i].innerText);
    let val = parseInt(value[i].innerText);
    updateTotal();

    value[i].innerText = val;
    total[i].innerText =  (val * price) + " TK";

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
            // storing the products to an array (checkout)
            products.push({ 
            img: document.querySelectorAll(".product_img")[i].src,
            name: document.querySelectorAll(".name")[i].innerText,
            id: document.querySelectorAll(".basketbtn")[i].id,
            quantity: val, 
            sid : document.querySelectorAll(".name")[i].getAttribute("sid"),
            unit_price: price});
            updateTotal();  
        }
            console.log(products);

     }else{
        products = products.filter(p => p.id !== document.querySelectorAll(".basketbtn")[i].id);
        updateTotal();
     }

    });
}

function updateTotal() {
    total_price = 0; 
    for(let i=0; i<checkbox.length; i++){
        if(checkbox[i].checked){
           let tp = parseFloat(document.querySelectorAll(".total_price")[i].innerText);
            total_price += tp;
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
        localStorage.setItem("products", JSON.stringify(products));
    }
});

// payment

if(window.location.href.includes("payment.php")){
    loadpayments();
}
function loadpayments(){
products = JSON.parse(localStorage.getItem("products"));
// console.log(products[0]['id']);







//okkkay now lets display products in payment page
for(let i=0; i<products.length; i++){
let cards = document.getElementById("products_payment");
let container = document.getElementById("card1");
let product= cards.cloneNode(true);
if(products[i]['img']===undefined){
    products[i]['img']="../../assets/img/basket.png";
}
product.querySelector('.img').src = products[i]['img'];
product.style.display = "flex";
product.querySelector(".name").innerText = products[i]['name'];
product.querySelector(".price").innerText = "Price: " + products[i]['unit_price']+ " TK " + " x " + products[i]['quantity']  ;
product.querySelector(".total").innerText = "Total Price: " + (products[i]['unit_price'] * products[i]['quantity']) + " TK" ;
container.appendChild(product);

// now lets remove the items
let remove= document.querySelectorAll(".basketbtn");
if(remove){
    remove[i+1].addEventListener('click' , function(){
    // removed from the array
    // console.log(products[i]);
    if(products.length === 1){
        localStorage.removeItem("products");
        products = [];
        updateTotalPayment();
        product.remove();
    }
    else{
    products = products.filter(p=> p.id !== products[i]['id']);
    //and loaclstorage...or after reload it will reset again
    localStorage.setItem("products", JSON.stringify(products)); 
   //
   updateTotalPayment();
   product.remove();
}
});
   updateTotalPayment();
}

}
}



// delivery_info
let s=JSON.parse(localStorage.getItem("products"));
let si=[];
for(let i=0; i<s.length; i++){
    si.push(s[i]['sid']);
}
let seller_count = [...new Set(si)].length; // finding unique seller(set removes duplicate values) 
// console.log(sid);


let cityval = document.getElementById("city");
if(cityval){
cityval.addEventListener("change", function(){
calculateDeliveryCharges();
});
}

calculateDeliveryCharges();
function calculateDeliveryCharges(){
    del_charges = 0;
    let existingCharge = document.getElementById('del_charge_display');
    if(existingCharge) existingCharge.remove();
    
    for(let i =0; i<seller_count; i++){
        validate({sid:si[i]}, "../../models/orderController.php", function(res){
            // console.log(res);
                let city = res;
                //lets just asume the price for now
                if(city=== document.getElementById("city").value){
                    del_charges += 100;
                }
                else{
                    del_charges += 200;
                }
                console.log(del_charges);
                
                // Update or create delivery charge display
                let chargeDisplay = document.getElementById('del_charge_display');
                if(!chargeDisplay){
                    chargeDisplay = document.createElement("p");
                    chargeDisplay.id = 'del_charge_display';
                    let card = document.querySelector(".card2");
                    card.appendChild(chargeDisplay);
                }
                chargeDisplay.innerHTML = `Delivery Charges: <span id="del_charge">${del_charges}</span> TK`;
                
                updateTotalPayment();
    });
    }
}

function updateTotalPayment(){
     total_price = 0;
     let charge = 0;
    for(let i=0; i<products.length; i++){
            total_price += products[i]['unit_price'] * products[i]['quantity'];
    }
    if( document.getElementById('del_charge')){
        charge = parseFloat(document.getElementById('del_charge').innerText);
    }
     console.log(charge);
    
    document.getElementById('paybtn').innerText ='Pay => ' + (total_price + charge) + " TK";
}


//payment button functions
let paybtn = document.getElementById("paybtn");
if(paybtn){
paybtn.addEventListener("click", function(){
    
    if(products.length === 0){
        alert("No products to pay for!");
    }else{
        let name = document.getElementById("name").value;
        let phone = document.getElementById("phone").value;
        let address = document.getElementById("address").value;
        let payment_method = document.getElementById("payment").value;   
        let city = document.getElementById("city").value; 
        if(name === "" || phone === "" || address === "" || payment_method === ""|| city === ""){
            alert("Please fill in all the payment information!");
        }
        else if(name.length<2||phone.length<11|| address.length<5||isNaN(phone)){
            if(phone.length<11){
                alert("Phone number must be at least 11 digits!");
            }else if(phone.length>14){
                alert("Please provide valid Phone number!");
            }
            if(phone.length===11){
                if(!(phone.startsWith("01"))){
                    alert("Phone number must start with '01'!");
                }
            }
            else if(phone.length===14){
                if(!(phone.startsWith("+8801"))){
                    alert("Phone number must start with '+8801'!");
                }
            }
            else{
            alert("Please provide valid payment information!");
            }
        }
        else{

        // if all good
        document.querySelector(".order_confirm_container").style.display="flex";
       
        let userdata = {
            name: name,
            phone: phone,
            address: address,
            payment_method: payment_method,
            city: city,
            del_charges: del_charges
        };
        products.push({userdata:userdata});
        console.log(products);
        validate(products, "../../models/orderController.php", function(res){
            console.log(res);});
            // localStorage.removeItem("products");

        }
    }
});
}

document.getElementById("continue_shopping").addEventListener("click", function(){
    localStorage.removeItem("products");
    window.location.href = "home.php";
});
