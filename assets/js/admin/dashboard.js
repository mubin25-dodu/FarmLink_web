// import { fetch } from "../ajax";

let buyers = document.getElementById('buyers');
let sellers = document.getElementById('sellers');
let products = document.getElementById('products');
let staffs = document.getElementById('staffs');
if(buyers ){
    buyers.addEventListener('click', function(){
        console.log('buyer clicked');
        window.location.href = './user&staff.html'+'?role=buyer';
    });
    sellers.addEventListener('click', function(){
        console.log('seller clicked');
        window.location.href = './user&staff.html'+'?role=seller';
    });
    products.addEventListener('click', function(){
        console.log('product clicked');
        window.location.href = './product';
    });
    staffs.addEventListener('click', function(){
        console.log('staff clicked');
        window.location.href = './user&staff.html'+'?role=staff';
    });
    console.log('dashboard js loaded');
}

// loaddata();

// function loaddata(){
//     fetch('dashboard', '../../controllers/admin/fetchdashboarddata.php', function(response){

//     });
// }