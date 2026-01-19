
import {validate} from '../ajax.js';
import { notifyUser } from '../login.js';
let submitBtn = document.getElementById('submit_btn');
let description = document.getElementById('description');
if(description){
    description.addEventListener('input', function(){
        let charCount = description.value.length;
        let charCountDisplay = document.getElementById('char_count');
        charCountDisplay.style.color = 'gray';
        
        charCountDisplay.textContent = charCount + '/300';
        let bar = document.getElementById('bar');
        
        // lets do some math now
        // ok if 300 =80% then 1 =80/300 =0.27%

        bar.style.width =(charCount * 0.27) + '%';
       if(charCount < 10){
           charCountDisplay.style.color = '#FF5555';
            bar.style.backgroundColor = '#FF5555';
        }
        if(charCount > 10){
            bar.style.backgroundColor = 'green';
        }
        if(charCount >= 75 && charCount < 200){
            bar.style.backgroundColor = 'orange';
        }
        if(charCount > 200){
            bar.style.backgroundColor = '#FF937E';
        }
        if(charCount > 250){
           charCountDisplay.style.color = '#FF5555';
            bar.style.backgroundColor = '#FF5555';
        }

    });
}
if(submitBtn){
    submitBtn.addEventListener('click', function(){

        let product_name = document.getElementById('product_name');
        let category = document.getElementById('type_select');
        let quantity = document.getElementById('quantity');
        let unit = document.getElementById('unit');
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
        if(category.value =='no'){
            notifyUser('Please fill all the fields','red');
            category.style.borderColor='red';
        }
        if(unit.value =='no'){
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
        else if(isNaN(price.value)){
            notifyUser('Price must be a number','red');
            price.style.borderColor='red';
        }
        else if(isNaN(quantity.value)){
            notifyUser('Quantity must be a number','red');
            quantity.style.borderColor='red';
        }
        else if(category.value=='no'){
            notifyUser('Please select a category','red');
            category.style.borderColor='red';
        }
        else if(unit.value=='no'){
            notifyUser('Please select a unit','red');
            unit.style.borderColor='red';
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