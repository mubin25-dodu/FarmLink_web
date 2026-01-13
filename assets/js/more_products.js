import { notifyUser } from "./login.js";
import { fetchSellerProducts, validate } from "./ajax.js";
let next = document.getElementById('next');
let prev = document.getElementById('previous');
let search = document.getElementById('search');
let cat = document.getElementById('category');
let offset = 0;
let load = "all";

if(next){
    next.addEventListener('click', function(){
        offset += 20;
        loaddata({load: load, offset: offset});
        console.log(offset);

    });
}
if(prev){
    prev.addEventListener('click', function(){
       if(offset > 0){ offset -= 20;
        loaddata({load: load, offset: offset});
       }
    else{
        console.log("Ullulu lu lu luuuuuuu");
    }
    console.log(offset);

    });


}
if(search){
    search.addEventListener('input', function(){
        console.log(search.value);
        if(search.value.trim() ===""){
            load ="all";
        }
        else{
            load =search.value;
        }
        offset = 0;
        loaddata({load: load , offset: offset});
});
}
if(cat){
    cat.addEventListener('change', function(){
        if(cat.value.trim() ===""){
            load ="all";
        }
        else{
            load =cat.value;
        }
        offset = 0;
        loaddata({load: load , offset: offset});

    });
}

// Initial load
loaddata({load: load, offset: offset});
function loaddata(load){
    validate( load , "../../controllers/loadmoreproducts.php", function(data){
        console.log(data);
        if(data.length === 0 && search.value.trim()==""){
        notifyUser("No more products to show",'red');
        offset -= 20;
        }
        else if(data.length === 0 && search.value.trim()!==""){
            notifyUser("No products found for the search term",'red');
        }
    else{
        loadproducts(data);
    }
    });
}


function loadproducts(data){
    let container = document.getElementById("products_container2");
    console.log(data.length);
    
    container.innerHTML = "";
    for(let i=0; i<data.length; i++){
    let card = document.createElement("div");
         card.className = "product";
         card.innerHTML = `
         <div class="p_details2">
         <img class="image" src="${data[i].image}" alt="Product img">
         <h3>${data[i].name}</h3>
         <div class="product_details">${data[i].description}</div>
         <p>Price: ${data[i].unit_price}Tk/kg</p>
         <div>
         <button pid="${data[i].product_id}" class="card_btn">Basket</button> 
         <a href="product_details.php?id=${data[i].product_id}"><button class="card_btn">Details</button></a> 
         </div>
         </div>`;
    container.appendChild(card);
    let basketbtn = card.querySelector(".card_btn");
    basketbtn.addEventListener('click', function(){
        let pid = this.getAttribute("pid");
        validate( {id: pid} , "../../controllers/addtobasket.php", function(data){
            console.log(data);
            if(data.status === "Not loggedin"){
                notifyUser("Please login to add products to basket",'red');
            }
            else if(data.status === "Product already in basket"){
                notifyUser("Product already in basket",'red');
            }
            else if(data.status === "Product added to basket"){
                notifyUser("Product added to basket",'green');
            }
        });
    });
    }
}