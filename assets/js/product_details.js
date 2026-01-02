
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
        alert("Please select a quantity.");
    }
    else {
        this.href = "../../controllers/addtobasket.php?id=" + pid + "&quantity=" + count;
    }
});

let buybtn = document.getElementById("buy_btn");
buybtn.addEventListener("click", function() {
    if (count < 1) {
        alert("Please select a quantity.");
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
updateTotalPrice();