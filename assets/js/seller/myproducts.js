
import {validate} from '../ajax.js';
import { notifyUser } from '../login.js';
let submitBtn = document.getElementById('submit_btn');

if(submitBtn){
    submitBtn.addEventListener('click', function(){

        let product_name = document.getElementById('product_name');
        let category = document.getElementById('type_select');
        let quantity = document.getElementById('quantity');
        let unit = document.getElementById('unit');
        let description = document.getElementById('description');
        let price = document.getElementById('price');
        let image = document.getElementById('file');

        product_name.style.borderColor='';
        category.style.borderColor='';
        quantity.style.borderColor='';
        unit.style.borderColor='';
        description.style.borderColor='';
        price.style.borderColor='';
        image.style.borderColor='';
        if(product_name.value =='' ){ 
            notifyUser('Please fill all the fields','red');
            product_name.style.borderColor='red';
        }
        if(category.value ==''){
            notifyUser('Please fill all the fields','red');
            category.style.borderColor='red';
        }
        if(unit.value ==''){
            notifyUser('Please fill all the fields','red');
            unit.style.borderColor='red';
        }
        if(quantity.value ==''){
            notifyUser('Please fill all the fields','red');
            quantity.style.borderColor='red';
        }
        if(price.value ==''){
            notifyUser('Please fill all the fields','red');
            price.style.borderColor='red';
        }
        if(description.value ==''){
            notifyUser('Please fill all the fields','red');
            description.style.borderColor='red';
        }
        if(image.value ==''){
            notifyUser('Please fill all the fields','red');
            image.style.borderColor='red';
            document.getElementById('img-box').style.borderColor='red';
        }
        else if(quantity.value <=0 ){
            notifyUser('Quantity must be greater than zero','red');
            quantity.style.borderColor='red';
        }
        else if(price.value <=0 ){
                notifyUser('Price must be greater than zero','red');
                price.style.borderColor='red';
        }
        else if(description.value.length <10 || description.value.length >300 ){
            notifyUser('Description must be at least 10 characters long and no more than 300 characters','red');
            description.style.borderColor='red';
        }
        else if(product_name.value.length <3 || product_name.value.length >50 ){
            notifyUser('Product name must be at least 3 characters long and no more than 50 characters','red');
            product_name.style.borderColor='red';
        }
      else{
        document.getElementById('product_form').submit();
       } 

    });

}
