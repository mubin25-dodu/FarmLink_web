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
            // storing the products to an array (checkout)
            products.push({ 
            img: document.querySelectorAll(".product_img")[i].src,
            name: document.querySelectorAll(".name")[i].innerText,
            id: document.querySelectorAll(".basketbtn")[i].id,
            quantity: val, 
            unit_price: price});
            updateTotal();}
            console.log(products);

     }else{
        products = products.filter(p => p.id !== document.querySelectorAll(".basketbtn")[i].getAttribute("product_id")[i]);
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
function updateTotalPayment(){
    let total_price = 0;
    for(let i=0; i<products.length; i++){
            total_price += products[i]['unit_price'] * products[i]['quantity'];
    }
    document.getElementById('paybtn').innerText ='Pay => ' + total_price + " TK";
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
        //    let div_to_push_to_db = document.createElement('div');
        //     div_to_push_to_db.style.display="none";
        //     div_to_push_to_db.innerHTML= '<form action="../../controllers/buyers/orderController.php" method="POST" id="order_form"> '+
        //                                    '<input type="text" name="name" value="'+name+'">'+;

        userdata = {
            name: name,
            phone: phone,
            address: address,
            payment_method: payment_method,
            city: city
        };
        products.push({userdata:userdata});
        console.log(products);
         fetch("../../models/orderController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body:JSON.stringify(products)
            });
            // localStorage.removeItem("products");

        }
    }
});
}

document.getElementById("continue_shopping").addEventListener("click", function(){
    localStorage.removeItem("products");
    window.location.href = "home.php";
});
