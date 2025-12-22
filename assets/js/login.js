let slider_btn = document.getElementById('signupbtn');
let regbtn = document.getElementById('sibtn');
let otpbtn = document.getElementById('otpbtn');
let otp_num;

if(regbtn){ regbtn.addEventListener('click',regestration)}
if(slider_btn){slider_btn.addEventListener('click',slider)}
if(otpbtn){
    otpbtn.addEventListener('click',otp)}

function slider(){

    if(slider_btn.innerHTML=='Signup'){
    let sl = document.getElementById('slider');
    sl.style.transform='translateX(100%)';
    slider_btn.innerHTML='Login'
    document.getElementById('reg_P').innerHTML='Already have an account!!';
    sl.style.borderRadius='100px 10px 10px 10px';
    document.getElementById('reg_log').style.boxShadow=' -5px 5px 10px rgba(30, 43, 39, 0.397)';
    }
    else{
    let sl = document.getElementById('slider');
    sl.style.transform='translateX(0px)';
    slider_btn.innerHTML='Signup'
    document.getElementById('reg_P').innerHTML="Don't Have an account!!";
    sl.style.borderRadius='10px 100px 0px 10px';
    document.getElementById('reg_log').style.boxShadow=' 5px 5px 10px rgba(30, 43, 39, 0.397)';
    }
}
function regestration(){
    
    // let name = document.getElementById('name').value;
    // let number = document.getElementById('number').value;
    // let email = document.getElementById('email').value;
    // let pass = document.getElementById('pass').value;
    // let cpass = document.getElementById('cpass').value;
    // let role = document.getElementById('role').value;
    // let city = document.getElementById('city').value;
    // let address = document.getElementById('address').value; 
    let arr = ['name','number','email','pass','cpass','role','city','address'];
    let valid = true;
    for(let i=0;i<arr.length;i++){
        let id = document.getElementById(arr[i]);
        id.style.border='none';
        console.log(id.value);
        if(id.value.trim()===''){
            id.style.border='2px solid red';
            notifyUser('Please fill out all fields','red');
            valid=false;
        }
        else if(arr[i]=='name'){
            let name = id.value.trim();
            let isValid = true;
            
            if(name.length < 2 || name.length > 50){
            isValid = false;
            }
            
            for(let j = 0; j < name.length; j++){
            let char = name[j];
            if(!((char >= 'a' && char <= 'z') || (char >= 'A' && char <= 'Z') || char === ' ')){
                isValid = false;
                break;
            }
            }
            
            if(!isValid){
            id.style.border='2px solid red';
            notifyUser('Please enter a valid name (2-50 characters, letters only)','red');
            valid=false;
            }
        }
        else if(arr[i]=='email'){
            let email = id.value.trim();
            let hasAt = false;
            let hasDot = false;
            let atIndex = -1;
            let dotIndex = -1;
            
            for(let j = 0; j < email.length; j++){
            if(email[j] === '@'){
                hasAt = true;
                atIndex = j;
            }
            if(email[j] === '.' && j > atIndex){
                hasDot = true;
                dotIndex = j;
            }
            }
            
            if(!hasAt || !hasDot || atIndex === 0 || dotIndex === email.length - 1 || dotIndex - atIndex < 2){
            id.style.border='2px solid red';
            notifyUser('Please enter a valid email address','red');
            valid=false;
            }
        }
        else if(arr[i]=='pass'){
            if(id.value.length < 8){
            id.style.border='2px solid red';
            notifyUser('Password must be at least 8 characters long','red');
            valid=false;
            }
        }
        else if(arr[i]=='cpass'){
            let pass = document.getElementById('pass').value;
            if(id.value!==pass){
            id.style.border='2px solid red';
            notifyUser('Password and Confirm Password do not match','red');
            valid=false;
            }
        }
        else if(arr[i]=='number'){
            let phone = id.value.trim();
            let startIndex = 0;
            
            // Check for +88 prefix
            if(phone.length > 2 && phone[0] === '+' && phone[1] === '8' && phone[2] === '8'){
            startIndex = 3;
            }
            // Check for 88 prefix
            else if(phone.length > 1 && phone[0] === '8' && phone[1] === '8'){
            startIndex = 2;
            }
            
            // Check if starts with 01
            if(phone.length - startIndex !== 11 || phone[startIndex] !== '0' || phone[startIndex + 1] !== '1'){
            id.style.border='2px solid red';
            notifyUser('Please enter a valid phone number','red');
            valid=false;
            }
            else{
            // Check third digit (must be 3-9)
            let thirdDigit = phone[startIndex + 2];
            if(thirdDigit < '3' || thirdDigit > '9'){
                id.style.border='2px solid red';
                notifyUser('Please enter a valid phone number','red');
                valid=false;
            }
            else{
                // Check remaining 8 digits are numbers
                for(let j = startIndex; j < phone.length; j++){
                if(phone[j] < '0' || phone[j] > '9'){
                    id.style.border='2px solid red';
                    notifyUser('Please enter a valid phone number','red');
                    valid=false;
                    
                }
                }
            }
            }
        }
             
    }
      if(valid){
        let inputs = document.getElementsByClassName('inputreg');
        for(let i=0; i<inputs.length; i++){
            inputs[i].style.display = 'none';
        }
            document.getElementById('otp').style.display='block';
            document.getElementById('sibtn').style.display='none';
            // sending otp
              otp_num= Math.floor(100000 + Math.random() * 900000);
                let params = {
                        email: document.getElementById('email').value,
                        passcode: "Your OTP is " + otp_num
                    };
                    console.log(params);
                    console.log("Sending email...");
                    console.log(otp_num);
                    emailjs.send("service_1u2e3a9","template_r96wljl",params);
            notifyUser('OTP sent to your email/phone. Please verify.','green');

        }      
        
}

function otp(){
   
    let otp_input = document.getElementById('otp_input').value;
    if(otp_input.trim()===''){
        notifyUser('Please enter the OTP','red');
    }
    else if(otp_input == otp_num){
         notifyUser('Registration successful!','green');
            let sl = document.getElementById('slider');
            sl.style.transform='translateX(0px)';
            slider_btn.innerHTML='Signup'
            document.getElementById('reg_P').innerHTML="Don't Have an account!!";
            sl.style.borderRadius='10px 100px 0px 10px';
            document.getElementById('reg_log').style.boxShadow=' 5px 5px 10px rgba(30, 43, 39, 0.397)';
    }
    else{
        notifyUser('Invalid OTP. Please try again.','red');
    }
    
}

    function notifyUser(message,color){   
        if(color==='red'){
        document.getElementById('notif').innerHTML=message;
        document.getElementById('notif').style.transform='translateX(-155px)';
        document.getElementById('notif').style.backgroundColor='rgba(255, 0, 0, 0.25)';
        }
        else{
        document.getElementById('notif').innerHTML=message;
        document.getElementById('notif').style.backgroundColor='#fdfdfd23';
        document.getElementById('notif').style.transform='translateX(-155px)';
        }
        setTimeout(stopNotify,10000);
}
    function stopNotify(){
        document.getElementById('notif').style.transform='translateX(110%)';
        // document.getElementById('notif').style.transform='translateX(0px)';
        // document.getElementById('notif').innerHTML='';

    }