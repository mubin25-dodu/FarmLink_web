import { validate } from "../ajax";
import { notifyUser } from "../login";

loadproducts();
let search_inp;
let filter_role;
function loadproducts(){
if(search_inp==undefined || filter_role==undefined || search_inp==null || filter_role==null){
    search_inp="";
    filter_role="";
}
fetch({search: search_inp, role: filter_role}, '../../controllers/admin/fetchusers.php', function(response){
        if(response.length ==0){
            notifyUser('No users found', 'red');
        }
        else{
            let product_list = document.getElementById('tbody');
            product_list.innerHTML ="";
            for(let i=0; i<response.length; i++){
                let tr = document.createElement('tr');
                tr.innerHTML = `
                <td>${response[i].name}</td>
                <td>${response[i].user_id}</td>
                <td>${response[i].roles}</td>
                <td>${response[i].status}</td>
                <td><button eid="${response[i].user_id}">Assign Roles</button></td>
                `;
                product_list.appendChild(tr);
            }
        }
    });
}