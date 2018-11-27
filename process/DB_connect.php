<?php
  $hostname="localhost";
  $user="root";
  $password="";
  $database="koboraa";
   
    $conn = new mysqli($hostname,$user,$password,$database);
    
    //Verify connection
    if($conn->connect_error){
        die("Connection Failed: <br />" . $conn->connect_error);
    }else{
     
    }
?>