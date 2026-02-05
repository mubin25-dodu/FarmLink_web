    import {fetch} from '../ajax.js';

    let action='all';
    let userdata=[];

loadproducts();
function loadproducts(){
  fetch( action , '../../controllers/admin/fetchusers.php', function(response){
    console.log(response); 
    userdata =response;
    loadtable();
  }
  );
}

function loadtable(){
let tablebody = document.getElementById('table-body');
tablebody.innerHTML='';
for(let i=0; i<userdata.length; i++){
tablebody.innerHTML+=`
            <tr>
                <td>${userdata[i].name}</td>
                <td>${userdata[i].UID}</td>
                <td class="status">${userdata[i].status}</td>
                <td><button  class="view-profile-btn">View Profile</button></td>
            </tr>
`;
}

let view = document.querySelectorAll('.view-profile-btn');

if(view){
    for(let i=0 ; i<view.length; i++){
    view[i].addEventListener('click', function(){
        console.log(i);
        loadprofile(i);
    });
}
}
}

function loadprofile(index){
    document.getElementById('profile-img').src='https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D';
    document.getElementById('name').textContent=userdata[index].name;
    document.getElementById('role').textContent=userdata[index].role;
    document.getElementById('email').textContent=userdata[index].email;
    document.getElementById('phone').textContent=userdata[index].phone;
    document.getElementById('address').textContent=userdata[index].address;
    document.getElementById('status').textContent=userdata[index].status;
    let profileCard = document.getElementById('profile');
    profileCard.style.display='block';


}