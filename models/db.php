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
    return mysqli_query($con,$a);
}


function readone($b){
   global $con;
   $result = mysqli_query($con, $b);
   $row = mysqli_fetch_array($result);
   return $row[0];
}

function read($c){
   global $con;
   $result=mysqli_query($con,$c); 
   $data=[];
   while($row = mysqli_fetch_assoc($result)){
    array_push($data,$row);
   }
   // print_r($data);
   return $data;
}
// read("SELECT * from product where product_id = 'PROD001'");
// $con->close();
?>