<?php
session_start();
// $msg=["nothing"];
// $message="nothing";

if(isset($_POST['submit'])){

    if(isset($_SESSION['userdata'])){

        if(($_SESSION['userdata']['email']==$_POST['email_or_phone'] || $_SESSION['userdata']['num']==$_POST['email_or_phone']) && $_SESSION['userdata']['pass']==$_POST['password']) {
            // $_SESSION['msg']= $_POST['email_or_phone'];
            header('location: ../views/buyers/home.php');
            exit();
            
        }
        else if($_SESSION['userdata']['email']==$_POST['email_or_phone'] || $_SESSION['userdata']['num']==$_POST['email_or_phone']){
           $_SESSION['msg']= "Wrong Password";
        }
        else{
            $_SESSION['msg']= "Wrong Email Or Phone Number";
        }
    }
    else{
        $_SESSION['msg']= "No user registered. Please sign up first.";
    }
    
   
}

header('location: ../views/Login.php');
exit();
?>