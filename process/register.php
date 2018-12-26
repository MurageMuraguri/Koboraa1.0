<?php
require "DB_connect.php";
session_start();


if (isset($_POST["submit"])){


    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confPassword = mysqli_real_escape_string($conn, $_POST["confPassword"]);

   
    
    if($password===$confPassword){
        $hashPass = md5($confPassword);
   
        $credential_insert="INSERT INTO users (firstName,lastName,userMail,userPass) VALUES ('$fname','$lname','$email','$hashPass');";


         if($conn->query($credential_insert) === TRUE){

             $_SESSION['reg']=2;
             $_SESSION['regMessage']="<div class=\"alert alert-success\" role=\"alert\">
        You were registered successfully!
        </div>";
                header("Location: ../index.php");


            } else{
              $_SESSION['reg']=1;
             $_SESSION['regMessage']="<div class=\"alert alert-danger\" role=\"alert\">
        You were not successfully registered,try again.
        </div>";

                header("Location: ../register.php");
            }
    }
   
else{
      $_SESSION['reg']=1;
     $_SESSION['regMessage']="<div class=\"alert alert-danger\" role=\"alert\">
Passwords did not match,try again.
</div>";
    
        header("Location: ../register.php");
    }
    }


else{
   
    header("Location: ../register.php");
}
?>