export function validate(array ,path , callback){
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", path, true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(array));
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let data = JSON.parse(this.responseText);
             if (callback){ callback(data);}
        }
    }
}

export function fetchSellerProducts(query, callback ){
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", "../../models/fetch_seller_products.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(query));
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let data = JSON.parse(this.responseText);
             if (callback){ callback(data);}
        }
    }
}
