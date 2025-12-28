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


function getcount($b){
    global $con;
   $result=mysqli_query($con,$b);
   $count= mysqli_num_rows($result);
    return $count;
}

function read($c){
   global $con;
   $result=mysqli_query($con,$c); 
   $data=[];
   while($row = mysqli_fetch_assoc($result)){
    array_push($data,$row);
   }
  //  print_r($data[0]['product_id']);
   return $data;
}
// read("select * from product ");
// $con->close();
?>