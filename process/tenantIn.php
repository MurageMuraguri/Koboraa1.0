<?php
session_start();
require "DB_connect.php"; 

if (isset($_POST["submit"])){

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $number = mysqli_real_escape_string($conn, $_POST["number"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $rentalnum = mysqli_real_escape_string($conn, $_POST["rentalnum"]);
    $buildingID = mysqli_real_escape_string($conn, $_POST["buildingID"]);
    $ownerID=$_SESSION['userID'];

    $tenant_insert=" INSERT INTO tenant (tenantName,tenantEmail,tenantPhone,rentalNumber,buildingID,ownerID) VALUES
     ('$name','$email','$number','$rentalnum','$buildingID','$ownerID');";

    if($conn->query($tenant_insert)=== TRUE){

        $_SESSION['tIN']=2;
       $_SESSION['tenantIN']= "<div class=\"alert alert-success\" role=\"alert\">
        Tenant added successfully!
        </div>";
        header("Location: ../viewBuilding.php?ID=$buildingID");
 
    }else{
        
        $_SESSION['tIN']=1;
       $_SESSION['tenantIN']= "<div class=\"alert alert-danger\" role=\"alert\">
        Tenant hasn\'t been added.Try again
        </div>";
     
     header("Location: ../viewBuilding.php?ID=$buildingID");
 
    }






}




?>