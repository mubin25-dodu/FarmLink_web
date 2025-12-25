<?php
require_once('../db/db.php');
session_start();

if(isset($_POST['submit'])){
    $email_or_phone = $_POST['email_or_phone'];
    $password = $_POST['password'];
    
    if($password=="1" && $email_or_phone=="1"){
        $_SESSION['status'] = 'buyer';
        header('location: ../views/buyers/home.php');
        exit();
    }
    else{
        $_SESSION['msg'] = "Wrong credentials";
        header('location: ../views/Login.php');
        exit();
    }
    // if(mysqli_num_rows($result) > 0){
    //     $user = mysqli_fetch_assoc($result);
        
    //     // Verify password
    //     if($user['password'] == $password){
    //         // Set session data
    //         $_SESSION['userdata'] = [
    //             'name' => $user['name'],
    //             'email' => $user['email'],
    //             'phone' => $user['phone'],
    //             'role' => $user['role'],
    //             'address' => $user['address'],
    //             'city' => $user['city'],
    //             'status' => $user['status'],
    //             'id' => $user['id']
    //         ];
            
    //         // Redirect based on role
    //         if($user['role'] == 'Seller'){
    //             header('location: ../views/seller/home.php');
    //         } else if($user['role'] == 'Buyer'){
    //             header('location: ../views/buyers/home.php');
    //         } else {
    //             header('location: ../views/buyers/home.php');
    //         }
    //         exit();
    //     } else {
    //         $_SESSION['msg'] = "Wrong Password";
    //     }
    // } else {
    //     $_SESSION['msg'] = "Wrong Email Or Phone Number";
    // }
}

?>