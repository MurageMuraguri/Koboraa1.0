<?php
session_start();


require "DB_connect.php";

if (isset($_POST["submit"])){

    $lEmail = mysqli_real_escape_string($conn, $_POST["email"]);
    $lPassword = mysqli_real_escape_string($conn, $_POST["password"]);
    

    $hashPass = md5($lPassword);

    $login_query="SELECT * FROM users where userMail ='$lEmail' ";
    $result=mysqli_query($conn,$login_query);
    $row=mysqli_fetch_assoc($result);
   
    if(($row['userPass'])===$hashPass){
       
        $_SESSION['userID']=$row['userID'];
        $_SESSION['firstName']= $row['firstName'];
        $_SESSION['lastName']= $row['lastName'];
        $_SESSION['userMail']= $row['userMail'];
        $_SESSION['login']=0;
        header("Location: ../home.php");
        
        
    }
    else{

        $_SESSION['login']=1;
        $_SESSION['loginMessage']="<div class=\"alert alert-danger\" role=\"alert\">
 Wrong username or password.Try again
</div>";
        header("Location: ../index.php");
       

         
    }

     
}




?>
