<?php
 $server = "localhost";
 $username = "root";
 $password ="";
 $db ="farmlink";

$con = mysqli_connect($server , $username , $password,$db);
 if(!$con){
    die("could'nt connect".mysqli_connect_error());
 }
 else{
   //  echo "connected";
 }

 function write ($a){
    global $con;
    mysqli_query($con,$a);
 
}

// $a = "SELECT COUNT(*) FROM user_data";

function getcount($a){
    global $con;
   $result=mysqli_query($con,$a);
   $count= mysqli_num_rows($result);

    return $count;
}
// $con->close();
?>