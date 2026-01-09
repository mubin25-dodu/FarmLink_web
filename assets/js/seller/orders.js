import { notifyUser } from "../login.js";
import { fetchSellerProducts, validate } from "../ajax.js";

let search = document.getElementById('search_order');

//initially calling all
    loaddata("no");

function loaddata(a){
    let msg ={
            status: a
        };
    validate( msg , "../../models/loadorders.php", function(data){
        console.log(data);
        loadtable(data);
    });
}

let req = document.getElementById('request');
let del = document.getElementById('delivered');
let hist = document.getElementById('history');
let process = document.getElementById('process');

req.addEventListener('click', function(){
    loaddata("requested");
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
        if(data[i].status==="Pending" || data[i].status==="Accepted" || data[i].status==="Processing" ){
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
                <td class="status" >${data[i]['status']}</td>
                <td style="display: ${display_status}"> You can not edit now</td>
                <td><div style="display: ${display_buttons}" class ="buttons">
                <button class="Accept" pid="${data[i].product_id}">${btn_name}</button>
                <button class="Reject" pid="${data[i].product_id}">Reject order</button>
                </div></td>
            `;
            if(data[i].status == "Accepted"){
                tr.style.backgroundColor ='#eefae1ff';
            }else if(data[i].status == "Rejected"){
                tr.style.backgroundColor ='#f8d7da';
            }else if(data[i].status == "Processing"){
                tr.style.backgroundColor ='#fff4e5';
            }
           


            tablebody.appendChild(tr);

            document.querySelectorAll('.Accept')[i].addEventListener('click', function(){
                if(btn_name==="Accept Order"){
                   msg = {order_id: data[i]['odr_id'], action: 'Accepted'}
                }else if(btn_name==="Request Picked Up"){
                   msg = {order_id: data[i]['odr_id'], action: 'Processing'}
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
            document.querySelectorAll('.Reject')[i].addEventListener('click', function(){
                 validate({order_id: data[i]['odr_id'], action: 'Rejected'}, '../../models/manage_order.php', function(res){

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