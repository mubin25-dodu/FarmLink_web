<?php
require_once('../db/db.php');
session_start();
// print_r($_POST['submit']);

if($_SERVER['REQUEST_METHOD']==='POST')
    {
        $uname= $_REQUEST['name'];
        $num= $_REQUEST['num'];
        $email= $_REQUEST['email'];
        $pass= $_REQUEST['pass'];
        $cpass= $_REQUEST['cpass'];
        $role= $_REQUEST['role'];
        $address= $_REQUEST['address'];
        $city= $_REQUEST['city'];
        $count = getcount("SELECT COUNT(*) FROM user_data");

        // if(getcount("SELECT COUNT(*) FROM user_data where email='$email'")>0 || getcount("SELECT COUNT(*) FROM user_data where phone='$num'")>0 ){
        //     $_SESSION['msg']= "Exists";
        //     // print_r(' checking');
        //     // exit();
        // }
        // else{
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
        // }
    }    
    
    
?>