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
    <!-- Image and text nav -->
<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.html">
          <img src="resources/images/icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
         Koboraa
        </a>
      </nav>
      <p>








      </p>
    <!--END-->    

      <!--Register card start-->
    <div class="container" >
        <div class="login-popup-wrap new_login_popup"> 
                <div class="login-popup-heading text-center">
                    <h4><i class="fa fa-lock" aria-hidden="true"></i> Sign Up </h4>                        
                </div>
            <?php
            if (isset($_SESSION['reg'])){
          
                if($_SESSION['reg']===1){
                      print $_SESSION['regMessage'];
                      $_SESSION['reg']=0;
                     
          }
          }
            
            ?>
                                      
                <form role="form" method = "POST" action = "process\register.php" autocomplete = "off" accept-charset="UTF-8">
                    <div class="form-group">
                            <input type="text" class="form-control"  placeholder="First Name" name="fname" required>
                        </div>
                        <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Last Name" name="lname" required>
                            </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="user_id" placeholder="E-Mail" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  placeholder="Confirm Password" name="confPassword" required>
                    </div>
                    <input type="submit" id="submit" name="submit" class="btn btn-outline-primary" value="Register" />
                </form>
                <div class="form-group text-center">
                </div>
                <div class="text-center">Already a Koboraa user?<a href="index.php">click here</a></div>
            </div>
        </div>
    
    <!--END-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>