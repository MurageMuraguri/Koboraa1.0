<?php
session_start();
require "DB_connect.php"; 
if (isset($_POST["submit"])){

   $name1=str_replace(' ',"",$_POST["name"]);
   $name1=strtolower($name1);
   $namearray=str_split($name1);
   $time=time();
   $timearray=str_split($time);

   $buildID="kb".$namearray[0].$namearray[1].$namearray[2].$timearray[1].$timearray[2].$timearray[8].$timearray[9];

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $estate = mysqli_real_escape_string($conn, $_POST["estate"]);
    $rooms = mysqli_real_escape_string($conn, $_POST["rooms"]);
    $cName = mysqli_real_escape_string($conn, $_POST["cName"]);
    $cNumber = mysqli_real_escape_string($conn, $_POST["cNumber"]);
    $userID=$_SESSION['userID'];

   $building_insert=" INSERT INTO building (buildingName,buildingCity,buildingEstate,roomCapacity,caretakerName,caretakerNo,ownerID,buildID ) VALUES ('$name','$city','$estate','$rooms','$cName','$cNumber','$userID','$buildID');";

   if($conn->query($building_insert)=== TRUE){
       
    print '<script type="text/javascript">alert("Building added Successfully");</script>';
       header("Location: ../home.php");

   }else{
    print '<script type="text/javascript">alert("Building not added");</script>';
    header("Location: ../home.php");

   }
}


?>