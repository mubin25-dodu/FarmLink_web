<?php
require_once('../models/db.php');
session_start();  
$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode($data);

if(isset($data)){
        $uname= $data['name'];
        $num= $data['number'];
        $email= $data['email'];
        $pass= $data['pass'];
        $role= $data['role'];
        $address= $data['address'];
        $city= $data['city'];
        $count = readone("SELECT COUNT(*) FROM user_data");

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
        echo json_encode(['status' => 'success']);     
        }

?>