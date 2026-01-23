import { notifyUser } from "../login.js";
import { fetchSellerProducts, validate } from "../ajax.js";

let search = document.getElementById('search_order');
let currentData = []; // Store current data for filtering

//initially calling all
    loaddata("no");

function loaddata(a){
    let msg ={
            status: a
        };
    validate( msg , "../../models/loadorders.php", function(data){
        console.log(data);
        currentData = data; // Store data for search
        loadtable(data);
    });
}

// Search functionality
search.addEventListener('input', function(e){
    let searchTerm = e.target.value.toLowerCase().trim();
    
    if(searchTerm === ''){
        loadtable(currentData);
    } else {
        let filteredData = currentData.filter(order => {
            return order.product_name.toLowerCase().includes(searchTerm) ||
                   order.customer_name.toLowerCase().includes(searchTerm) ||
                   order.odr_id.toString().includes(searchTerm) ||
                   order.status.toLowerCase().includes(searchTerm);
        });
        loadtable(filteredData);
    }
});

let req = document.getElementById('request');
let accepted = document.getElementById('accepted');
let del = document.getElementById('delivered');
let hist = document.getElementById('history');
let process = document.getElementById('process');

req.addEventListener('click', function(){
    loaddata("requested");
});

accepted.addEventListener('click', function(){
    loaddata("accepted");
});

del.addEventListener('click', function(){
    loaddata("delivered");
});

hist.addEventListener('click', function(){
    loaddata("history");
});

process.addEventListener('click', function(){
    loaddata("process");
});

function loadtable(data){

    let tbody = document.getElementById('table_body');
    let countDisplay = document.getElementById('count_order');
    
    countDisplay.textContent = data.length;
    
    if(data.length  < 1){
        let Ptag =document.createElement('p');
        Ptag.innerHTML = `No Orders found`;
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

        let display_buttons ="none";
        let display_status="flex";
        let btn_name="Accept Order";
        if(data[i].status==="Pending" || data[i].status==="Accepted" ){
            display_buttons ="flex";
            display_status="none";
        }
        if(data[i].status==="Accepted"){
            btn_name="Request Picked Up";
        }
        let tr= document.createElement('tr');

            tr.innerHTML = `
                <td>${data[i]['product_name']}</td>
                <td>${data[i]['unit_price']} Tk / ${data[i]['unit']}</td>
                <td>${data[i]['quantity']} ${data[i]['unit']}</td>
                <td>${data[i]['total_price']} TK</td>
                <td>${data[i]['odr_id']}</td>
                <td class="status">${data[i]['status']}</td>
                <td>
                    <span style="display: ${display_status}">You can not edit now</span>
                    <div style="display: ${display_buttons}" class="buttons">
                        <button class="Accept" data-order-id="${data[i]['product_id']}" pid="${data[i]['odr_id']}" data-action="${btn_name}">${btn_name}</button>
                        <button class="Reject" data-order-id="${data[i]['product_id']}">Reject order</button>
                    </div>
                </td>
            `;
            if(data[i].status == "Accepted"){
                tr.style.backgroundColor ='#eefae1ff';
            }else if(data[i].status == "Rejected"){
                tr.style.backgroundColor ='#f8d7da';
            }else if(data[i].status == "Processing"){
                tr.style.backgroundColor ='#fff4e5';
            }
           


            tablebody.appendChild(tr);

            let acceptBtn = tr.querySelector('.Accept');
            let rejectBtn = tr.querySelector('.Reject');

            if(acceptBtn){
                acceptBtn.addEventListener('click', function(){
                    let pid = this.getAttribute('data-order-id');
                    let odrId = this.getAttribute('pid');
                    let actionType = this.getAttribute('data-action');
                    let msg ={};
                    console.log(pid);
                    if(actionType === "Accept Order"){
                       msg = {product_id: pid, odr_id: odrId, action: 'Accepted'}
                    }else if(actionType === "Request Picked Up"){
                       msg = {product_id: pid, odr_id: odrId, action: 'Processing'}
                    }
                    validate(msg, '../../models/manage_order.php', function(res){

                        if(res == 'success'){
                            notifyUser('Order accepted successfully', 'green');
                            loaddata('no');
                        }else if(res == 'error'){
                            notifyUser('Error accepting order', 'red');
                        }
                        console.log(res);

                    });
                });
            }

            if(rejectBtn){
                rejectBtn.addEventListener('click', function(){
                    let orderId = this.getAttribute('data-order-id');
                    validate({order_id: orderId, action: 'Rejected'}, '../../models/manage_order.php', function(res){

                        if(res == 'success'){
                            notifyUser('Order Rejected successfully', 'green');
                            loaddata('no');
                        }else if(res == 'error'){
                            notifyUser('Error rejecting order', 'red');
                        }
                        console.log(res);
                    });
                });
            }
        }
    }

}