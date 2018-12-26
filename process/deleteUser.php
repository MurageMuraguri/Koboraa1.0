<?php
require "DB_connect.php";

$id=$_GET['ID'];


$del_com = "DELETE FROM users WHERE userID = '$id'";
if($conn->query($del_com) === TRUE){
	 header("Location: ../admin.php");
	exit();
		}

?>