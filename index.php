<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Koboraa</title>
    <link href="resources/style/bootstrap.css" rel="stylesheet"/>
</head>

<body>
 
 <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.html">
          <img src="resources/images/icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
         Koboraa
        </a>
      </nav>
      <p>








      </p>
    <!--Login card start-->          
      <div class="container" >
        
                    <div class="login-popup-heading text-center">
                        <h4><i class="fa fa-lock" aria-hidden="true"></i> Login </h4>                        
                    </div>
          <?php
          if (isset($_SESSION['login'])){
          
              if($_SESSION['login']===1){
                  print $_SESSION['loginMessage'];
                  $_SESSION['login']=0;
                  $_SESSION['loginMessage']="";
          }
          }  
          if (isset($_SESSION['reg'])){
          
                if($_SESSION['reg']===2){
                      print $_SESSION['regMessage'];
                      $_SESSION['reg']=0;
                    $_SESSION['regMessage']="";
          }
          }
          ?>
                                          
                    <form id="loginMember"role="form"method = "POST" action = "process/login.php" autocomplete = "off" accept-charset="UTF-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="E-mail " required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  placeholder="Password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary" name="submit" value="1">Login</button>
                    </form>
                    <div class="form-group text-center">
                    </div>
                    <div class="text-center">Not registered yet?<a href="register.php">click here</a></div>
                </div>
   
   


</div>
<!--END-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>

</html>