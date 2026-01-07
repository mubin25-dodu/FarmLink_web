<?php
// require_once('../models/db.php');
// session_start();

// if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
//     $email_or_phone = $_POST['email_or_phone'];
//     $password = $_POST['password'];
    
//      $result = read("SELECT role , UID FROM user_data where email='$email_or_phone' and password='$password'");
//     //  print_r($result[0]['UID']);
//      if(count($result)==1){ 
//         // $user[]=[
//         //     'uid'=> $result[0]['UID'],
//         //     'role'=> $result[0]['role']
//         // ];
//         $_SESSION['user_data']['uid']=$result[0]['UID'];
//         $_SESSION['user_data']['role']=$result[0]['role'];

//         // print_r($_SESSION['user_data']);
//         if($result[0]['role']=='Buyer'){
//         header('location: ../views/buyers/home.php');
//         exit();
//         }
//         if($result[0]['role']=='Seller'){
//         header('location: ../views/seller/home.php');
//         exit();
//         }
//     }
//     else{
//         $_SESSION['msg'] = "alert('Wrong credentials');";
//         header('location: ../views/Login.php');
//         exit();
//     }
//     }

?>