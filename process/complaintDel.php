<?php
require "DB_connect.php";

$id=$_GET['complaintID'];


$del_com = "DELETE FROM complaint WHERE complaintID = '$id'";
if($conn->query($del_com) === TRUE){
	 header("Location: ../complaints.php");
	exit();
		}

?>