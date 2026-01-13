<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);
if(isset($data['action']) && $data['action'] === 'check' ){
    //  echo json_encode ($data['action']);
    if(!isset($_SESSION['user_data'])){
        echo json_encode (["status"=>"Not loggedin"] );
    }
    else if(isset($_SESSION['user_data']) && $_SESSION['user_data']['role'] == 'Buyer'){
        echo json_encode (["status"=>"Buyer"] );
    }
}

else if(!isset($_SESSION['user_data'])){
   echo "<script>alert('Login to continue')</script>";
   header("Location: home.php");
   exit();
}
elseif($_SESSION['user_data']['role'] != 'Buyer'){
   // $_SESSION['msg'] = "alert('Login to continue')";
   header("Location: home.php");
   exit();
}
?>