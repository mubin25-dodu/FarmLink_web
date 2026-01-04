export function validate(array ,path , callback){
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", path, true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(array));
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let data = JSON.parse(this.responseText);
             if (callback) callback(data);
            //  return data;
        }
    }
}
// user signup
export function signupUser(array , path, callback){
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", path, true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(array));
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let data = JSON.parse(this.responseText);
             if (callback) callback(data);
        }
    }
}