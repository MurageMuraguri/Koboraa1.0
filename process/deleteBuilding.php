<?php

require "DB_connect.php";

$id=$_GET['ID'];


$del_com = "DELETE FROM building WHERE buildingID = '$id'";
if($conn->query($del_com) === TRUE){
	 header("Location: ../home.php");
	exit();
		}

?>




