for(let i = 1; i < 50; i++){
    let temp = document.getElementById('products2');
    let container = document.getElementById('products_container2');

    let product_card = temp.cloneNode(true);
    product_card.id = 'product_' + i;

     // all buttons inside this card
    let btns = product_card.getElementsByClassName('card_btn');
    btns[0].id = 'buy_' + i;      // Buy
    btns[1].id = 'basket_' + i;   // Basket
    btns[2].id = 'details_' + i;  // Details

    product_card.style.display = 'inline-flex';
    container.appendChild(product_card);
    console.log(product_card.id);
    
}



function details(){
    
}

// products display 

for(let i = 1; i < 4; i++){
    let temp = document.getElementById('products');
    let container = document.getElementById('products_container');

    let product_card = temp.cloneNode(true);
    product_card.id = 'product' + i;
    let btns = product_card.getElementsByClassName('card_btn');
    btns[0].id = 'details' + i;      // details
    product_card.style.display = 'inline-flex';
    container.appendChild(product_card);
}

// detecting button pressed

let card_btns = document.getElementsByClassName('card_btn');

for(let i = 0; i < card_btns.length; i++){
    card_btns[i].addEventListener('click', function(){
        console.log('button id:', this.id);
        if(this.id.includes('buy')){
            buy();
        }
        if(this.id.includes('basket')){
        }
        if(this.id.includes('details')){
             let product_id = this.id.replace('details_', '');
             window.location.href = 'product_details.php?id=' + product_id;
        }
    });
}

function buy(){

}

// banners

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