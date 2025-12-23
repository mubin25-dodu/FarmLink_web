<?php
session_start();
// print_r($_POST);
 header('location: ../views/buyers/home.php');

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

    // if($uname==null|| $num==null|| $email==null|| $pass==null || $cpass== null|| $role==null|| $address== null|| $city==null){
    // }
    // else{
    //     header('location: buyers/home.php');
    // }
    }
   
?>