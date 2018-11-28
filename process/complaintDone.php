<?php
require "DB_connect.php";
$id=$_GET['complaintID'];
$done="UPDATE complaint SET status = 1 WHERE complaintID = '$id'";

if($conn->query($done) === TRUE){
    header("Location: ../complaints.php");
   exit();
       }

?>