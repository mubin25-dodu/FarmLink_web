import { notifyUser } from "../login.js";
import { fetchSellerProducts, validate } from "../ajax.js";
let search = document.getElementById('product-search');

let pid;
//initially calling all products
setTimeout(function(){
    loadtable();},500);

function loadtable(){
let msg ={
            status: 'no_search'
            };

fetchSellerProducts( msg , function(data){
    console.log(data);
    loadproducts(data);
});
}

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
                <td>${data[i].available_unit}${data[i].unit}</td>
                <td>${data[i].category}</td>
                <td><div class ="buttons">
                <button class="dlt" pid="${data[i].product_id}">Delete</button>
                <button class="edit" pid="${data[i].product_id}">Edit</button>
                </div></td>
            `;
            if(data[i].available_unit == -1){
                tr.style.backgroundColor ='#f8d7da';
            }
            tablebody.appendChild(tr);
        }
    }

    let dlt = document.getElementsByClassName('dlt');
    for(let i=0; i<dlt.length; i++){
        dlt[i].addEventListener('click', function(){
             pid = this.getAttribute('pid');
            validate({product_id: pid}, '../../models/fetch_seller_products.php', function(data){
                if(data.status == 'deleted'){
                    notifyUser('Product deleted successfully', 'green');
                    // window.location.reload();
                       loadtable();
                }else{
                    // window.location.reload();
                    notifyUser('Error deleting product', 'red');
                }
            });

        });
    }
    let edit = document.getElementsByClassName('edit');
    for(let i=0; i<edit.length; i++){
           edit[i].addEventListener('click', function(){
            let pid = this.getAttribute('pid');
            document.querySelector('.edit_card').style.display = 'flex';

            fetchSellerProducts( {edit_product_id: pid} , function(data){
                // console.log(data);
                document.getElementById('name').value = data[0].name;
                document.getElementById('description').value = data[0].description;
                document.getElementById('price').value = data[0].unit_price;
                document.getElementById('stock').value = data[0].available_unit;
                document.getElementById('category').value = data[0].category;
            });

            loadedit(pid);
        });
        
    }
}
     function loadedit(pid){
      if(document.getElementById('cancel_edit')){
            document.getElementById('cancel_edit').addEventListener('click', function(){
            document.getElementsByClassName('edit_card')[0].style.display = 'none';
            console.log('dd');
            });
        }
       
        if(document.getElementById('update_product')){
                document.getElementById('update_product').addEventListener('click', function(){
                let name = document.getElementById('name').value;
                let description = document.getElementById('description').value;
                let price = document.getElementById('price').value;
                let stock = document.getElementById('stock').value;
                let category = document.getElementById('category').value;
                console.log(pid);
                let datas={product_id_update: pid, name: name, description: description, price: price, stock: stock, category: category};
                console.log(datas);
                validate(datas, '../../models/fetch_seller_products.php', function(data){
                    if(data.status == 'updated'){
                        notifyUser('Product updated successfully', 'green');
                        loadtable();
                        // window.location.reload();
                    }else{
                        // window.location.reload();
                        loadtable();
                        notifyUser('Error updating product', 'red');
                    }
                });
            });
        }
    }