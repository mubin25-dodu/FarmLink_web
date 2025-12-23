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

?>
<script>window.DATA =<?php echo json_encode($message); ?></script>
<script src="../assets/js/login.js"></script>