import { fetch } from "../ajax";

let buyers = document.getElementById('buyers');
let sellers = document.getElementById('sellers');
let products = document.getElementById('products');

if(buyers || sellers || products){
    buyers.addEventListener('click', function(){
        window.location.href = ''+'?role=buyer';
    });
}