<?php
session_start();

$message="dfsd";
if(isset($_POST['submit'])){

    if(($_SESSION['userdata']['email']==$_POST['email_or_phone'] || $_SESSION['userdata']['num']==$_POST['email_or_phone']) && $_SESSION['userdata']['pass']==$_POST['password']) {
        // header('location: ../views/buyers/home.php');
        // $message= "";
    }
    else if($_SESSION['userdata']['email']==$_POST['email_or_phone'] || $_SESSION['userdata']['num']==$_POST['email_or_phone']){
        $message= "Wrong Email Or Phone Number";
        
    }
    else if(($_SESSION['userdata']['email']==$_POST['email_or_phone'] || $_SESSION['userdata']['num']==$_POST['email_or_phone']) && $_SESSION['userdata']['pass']!=$_POST['password']){
        $message= "Wrong Password";
        
    }
}

if(isset($_POST['register'])) {

    $fields = [
        'name' => trim($_POST['name'] ?? ''),
        'number' => trim($_POST['number'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'pass' => trim($_POST['pass'] ?? ''),
        'cpass' => trim($_POST['cpass'] ?? ''),
        'role' => trim($_POST['role'] ?? ''),
        'city' => trim($_POST['city'] ?? ''),
        'address' => trim($_POST['address'] ?? '')
    ];

    $valid = true;

    foreach($fields as $key => $value) {
        if($value === '') {
            $valid = false;
            $message = "Please fill out all fields";
            break;
        }
    }

    if($valid) {
        $name = $fields['name'];
        $isValid = true;
        if(strlen($name) < 2 || strlen($name) > 50)
             $isValid = false;
        for($i=0;$i<strlen($name);$i++){
            $char = $name[$i];
            if(!(($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z') || $char === ' ')){
                $isValid = false;
                break;
            }
        }
        if(!$isValid) { $valid = false; $message = "Please enter a valid name (2-50 characters, letters only)"; }
    }

    if($valid) {
        $email = $fields['email'];
        $hasAt = false;
        $hasDot = false;
        $atIndex = -1;
        $dotIndex = -1;
        for($i=0;$i<strlen($email);$i++){
            if($email[$i] === '@') { $hasAt = true; $atIndex = $i; }
            if($email[$i] === '.' && $i > $atIndex) { $hasDot = true; $dotIndex = $i; }
        }
        if(!$hasAt || !$hasDot || $atIndex === 0 || $dotIndex === strlen($email)-1 || ($dotIndex - $atIndex < 2)){
            $valid = false;
            $message = "Please enter a valid email address";
        }
    }

    if($valid) {
        $pass = $fields['pass'];
        if(strlen($pass) < 8){ $valid = false; $message = "Password must be at least 8 characters long"; }
    }

    if($valid) {
        if($fields['pass'] !== $fields['cpass']) { $valid = false; $message = "Password and Confirm Password do not match"; }
    }

    if($valid) {
        $phone = $fields['number'];
        $startIndex = 0;
        if(strlen($phone) > 2 && substr($phone,0,3) === '+88') $startIndex = 3;
        else if(strlen($phone) > 1 && substr($phone,0,2) === '88') $startIndex = 2;

        if(strlen($phone) - $startIndex !== 11 || $phone[$startIndex] !== '0' || $phone[$startIndex+1] !== '1'){
            $valid = false;
            $message = "Please enter a valid phone number";
        } else {
            $thirdDigit = $phone[$startIndex+2];
            if($thirdDigit<'3' || $thirdDigit>'9') { $valid = false; $message = "Please enter a valid phone number"; }
            else {
                for($i=$startIndex;$i<strlen($phone);$i++){
                    if($phone[$i]<'0' || $phone[$i]>'9') { $valid = false; $message = "Please enter a valid phone number"; break; }
                }
            }
        }
    }

    if($valid) {
        $otp_num = rand(100000, 999999);
        $_SESSION['otp_num'] = $otp_num;
        $message = "OTP sent to your email/phone. Please verify.";
    }
}

if(isset($_POST['verify_otp'])) {
    $user_otp = trim($_POST['otp_input'] ?? '');
    $otp_num = $_SESSION['otp_num'] ?? null;

    if($user_otp === '') $message = "Please enter the OTP";
    else if($user_otp == $otp_num) $message = "Registration successful!";
    else $message = "Invalid OTP. Please try again";
}

?>
<script>window.DATA =<?php echo json_encode($message); ?></script>
<script src="../assets/js/login.js"></script>
