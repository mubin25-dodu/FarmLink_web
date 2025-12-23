<?php
session_start();
print_r($_POST);

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
  

    if($uname==null|| $num==null|| $email==null|| $pass==null || $cpass== null|| $role==null|| $address== null|| $city==null){
    }
    else{
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
      // Debug: View session data
echo '<pre>';
print_r($_SESSION['userdata']);
echo '</pre>';
    
    }
    }    
    
    
?>