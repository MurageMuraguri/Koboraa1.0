<?php
require "DB_connect.php";

$id=$_GET['tenantID'];


$del_user= "DELETE FROM tenant WHERE tenantID = '$id'";
if($conn->query($del_user) === TRUE){
	 header("Location: ../viewBuilding.php");
	exit();
		}

?>