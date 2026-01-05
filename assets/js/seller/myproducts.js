import { notifyUser } from "../login.js";
import { fetchSellerProducts } from "../ajax.js";
let search = document.getElementById('product-search');

//initially calling all products
setTimeout(function(){
    let msg ={
            status: 'no_search'
             };

fetchSellerProducts( msg , function(data){
    console.log(data);
    loadproducts(data);
});
}
,500);

search.addEventListener('input', function() {
        console.log(search.value);
        let msg={
                  query: search.value,
                };
        fetchSellerProducts( msg , function(data){
            // window.location.href ='../../models/fetch_seller_products.php';
            console.log(data);
            loadproducts(data);
        });
        // console.log('dd');
});


function loadproducts(data){
    let tablerow =document.createElement('tr');
    let tbody = document.getElementById('table_body');
    if(data.length  < 1){
        let Ptag =document.createElement('p');
        Ptag.innerHTML = `No products found`;
        Ptag.style.zIndex ='10111';
        Ptag.style.color ='red';
        Ptag.style.marginLeft ='5px';
        tbody.innerHTML ='';
        tbody.appendChild(Ptag);
    }
    else if(data.length > 0){

        let tablebody = document.getElementById('table_body');
        tablebody.innerHTML ='';

       for(let i=0; i<data.length; i++){
            let tr= document.createElement('tr');
            tr.innerHTML = `
                <td>${data[i].name}</td>
                <td>${data[i].description}</td>
                <td>${data[i].unit_price}</td>
                <td>${data[i].unit}</td>
                <td>${data[i].catagory}</td>
                <td><div class ="buttons">
                <button class="dlt" pid="${data[i].product_id}">Delete</button>
                <button >Edit</button>
                </div></td>

            `;
            tablebody.appendChild(tr);
        }
    }

    let dlt = document.getElementsByClassName('dlt');
    for(let i=0; i<dlt.length; i++){
        dlt[i].addEventListener('click', function(){
           console.log('delete', this.getAttribute('pid'));
        });
    }
    
}

       