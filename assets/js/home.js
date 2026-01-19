import { validate } from "./ajax.js";
import { notifyUser} from "./login.js";
let buttons = document.querySelectorAll('[auth]');
console.log(buttons);
if(buttons.length > 0){
    buttons.forEach(button => {
        button.addEventListener('click', function(event){
            event.preventDefault();
            validate( {action: "check"} , "../../controllers/auth.php", function(data){
                // console.log(data);
                if(data.status === "Not loggedin"){
                    notifyUser("Please login to continue",'red');
                }
                else{
                    window.location.href = button.getAttribute('href');
                }  
            });
        });
    });
}

//add to basket from home page
let bskt = document.querySelectorAll(".basket");
if(bskt.length > 0){
   for(let i=0; i<bskt.length; i++){
    let btn = bskt[i];
        btn.addEventListener('click', function(){
            console.log(btn.getAttribute('pid'));
            validate({id: btn.getAttribute('pid')} , "../../controllers/addtobasket.php", function(data){
                console.log(data);
                if(data.status === "Product added to basket"){
                notifyUser(data.status, "green");
                }
                else{
                notifyUser(data.status, "red");
                }
        });
    });
}
}


setInterval(() => bannerChange("left"), 10000);
let lft_btn = document.getElementById('left_btn');
let rgt_btn = document.getElementById('right_btn');

var banners = [
    'url("../../assets/img/ad2.png")',
    'url("../../assets/img/ad1.png")',
    'url("../../assets/img/ad2.png")',
    'url("../../assets/img/ad1.png")',
];

for(let i = 0; i < banners.length; i++){
    let banner = document.getElementById('ad_banner');
    let currentBanner = document.createElement('div');
    currentBanner.style.backgroundImage = banners[i];
    currentBanner.style.width = '100%';
    currentBanner.style.height = '100%';
    currentBanner.style.backgroundSize = 'cover';
    currentBanner.style.backgroundRepeat = 'no-repeat';
    currentBanner.style.backgroundPosition = 'center';
    currentBanner.style.position = 'absolute';
    currentBanner.style.transition = 'transform 0.5s ease-in-out';
    currentBanner.style.transform = 'translateX(0)';
    currentBanner.id = 'ad' + i;
    banner.appendChild(currentBanner);
    console.log('Created:', currentBanner.id);
}

var currentIndex = 0;

if(lft_btn){
    lft_btn.addEventListener('click', () => bannerChange("left"));
}
if(rgt_btn){
    rgt_btn.addEventListener('click', () => bannerChange("right"));
}

function bannerChange(direction) {

    
    let currentAd = document.getElementById('ad' + currentIndex);
    
    if(direction === "left"){
        console.log("Current:", currentIndex);
        
        // Slide current out
        currentAd.style.transform = 'translateX(-100%)';
        currentAd.style.zIndex = '2';
        
        // Calculate next
        let nextIndex = (currentIndex + 1) % banners.length;
        let nextAd = document.getElementById('ad' + nextIndex);
        
        // Position next off-screen right
        nextAd.style.transition = 'none';
        nextAd.style.transform = 'translateX(100%)';
        nextAd.style.zIndex = '3';
        
        // Slide next in
        setTimeout(() => {
            nextAd.style.transition = 'transform 0.5s ease-in-out';
            nextAd.style.transform = 'translateX(0)';
        }, 50);
        
        currentIndex = nextIndex;
    }
    else if(direction === "right"){
        console.log("Current:", currentIndex);
        
        // Slide current out
        currentAd.style.transform = 'translateX(100%)';
        currentAd.style.zIndex = '2';
        
        // Calculate previous
        let prevIndex = (currentIndex - 1 + banners.length) % banners.length;
        let prevAd = document.getElementById('ad' + prevIndex);
        
        // Position previous off-screen left
        prevAd.style.transition = 'none';
        prevAd.style.transform = 'translateX(-100%)';
        prevAd.style.zIndex = '3';
        
        // Slide previous in
        setTimeout(() => {
            prevAd.style.transition = 'transform 0.5s ease-in-out';
            prevAd.style.transform = 'translateX(0)';
        }, 50);
        
        currentIndex = prevIndex;
    }
    
}

if(document.getElementById('ad0')){
    document.getElementById('ad0').style.zIndex = '3';
}
