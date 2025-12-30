<?php
require_once('../models/db.php');
session_start();
print_r($_POST['submit']);

if(isset($_POST['submit']))
    {
        $uname= $_REQUEST['name'];
        $num= $_REQUEST['num'];
        $email= $_REQUEST['email'];
        $pass= $_REQUEST['pass'];
        $cpass= $_REQUEST['cpass'];
        $role= $_REQUEST['role'];
        $address= $_REQUEST['address'];
        $city= $_REQUEST['city'];
        $count = readone("SELECT COUNT(*) FROM user_data");

    if(readone("SELECT COUNT(*) FROM user_data where email='$email' or phone='$num'")>0 ){
            $_SESSION['msg']= "alert('user already exists')";
            // print_r(' checking');
            header('location: ../views/Login.php');
            exit();
        }
    else{
        if($role=="Buyer"){
            $id="bu-".$count;
        }
        else if($role=="Seller"){
            $id="se-".$count;
        }
        else if($role=="Agent"){
        $id="ag-".$count;
        } 
        
        write("INSERT INTO user_data VALUES('$uname' , '$email', '$num' , '$pass' , '$role' , '$address' ,'$city' ,'active' ,'$id')");
        header('location: ../views/Login.php');
        exit();
        }
    }    
?>