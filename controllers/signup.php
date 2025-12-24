<?php
session_start();

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
  
        $data= [ 
            'status'=> 'success',
            'name'=> $uname,
            'num'=> $num,
            'email'=> $email,
            'pass'=> $pass,
            'cpass'=> $cpass,
            'role'=> $role,
            'address'=> $address,
            'city'=> $city
        ];
      $_SESSION['userdata']= $data;
      header('location: ../views/Login.php');
      exit();
    }    
    
    
?>