<?php
session_start();
require "process/DB_connect.php";

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
        <a class="navbar-brand" href="portal.php">
          <img src="resources/images/icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
         Koboraa
        </a>
      </nav>
      <p>
          
<div class="row">
<div class="col">

<div class="card" >
  <div class="card-body">
   
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <p class="card-text">Have any complaints to air to your landlord?</p>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#complainModal">
  Complain
</button>
  </div>
</div>
    </div>
    </div>
<p>





</p>

<div class="row">
<div class="col">
<div class="card">
  <div class="card-body">
    
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <p class="card-text">File Transaction ID</p>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payModal">
  Submit
</button>
  </div>
</div>
</div>
    </div>





      </p>



      <div id="content-wrapper">

<div class="container-fluid">   


    <!--COMPLAINT MODAL -->

  <div class="modal fade" id="complainModal" name="complainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Complaint</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method = "POST" autocomplete = "off" accept-charset="UTF-8">
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Tenant ID</label>
    <input type="text" class="form-control" name="buildID" required>
  </div>
  <p>This should have been given to you by your landlord</p>
  <div class="form-group">
    <label for="message-text" class="col-form-label">Complaint</label>
      
    <input type="text" class="form-control" name="complaint" required>
  </div>
 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="submit" id="submitCom" name="submitCom" class="btn btn-primary" value="Submit Complaint" />
</div>
</form>
</div>
</div>
</div>

    <!--END-->
    
    
    <!--Payment Modal-->

   <div id="content-wrapper">

<div class="container-fluid">   



  <div class="modal fade" id="payModal" name="payModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Transaction ID</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method = "POST" action = "#" autocomplete = "off" accept-charset="UTF-8">
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Tenant ID</label>
    <input type="text" class="form-control" name="buildID" required>
  </div>
  <p>This should have been given to you by your landlord</p>
  <div class="form-group">
    <label for="message-text" class="col-form-label">Transaction Number</label>
    <input type="text" class="form-control" name="transID" required>
  </div>
 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="submit" id="submitPay" name="submitPay" class="btn btn-primary" value="Submit Complaint" />
</div>
</form>
</div>
</div>
</div>

<!--END-->
                
        <?php

 if (isset($_POST["submitCom"])){
              
                
                

                     $buildID = mysqli_real_escape_string($conn, $_POST["buildID"]);
                     $complaint = mysqli_real_escape_string($conn, $_POST["complaint"]);
 
                    $res=$conn->query("SELECT ownerID,buildingName,buildingID FROM building WHERE buildID ='".$buildID."'");  

            if($res->num_rows === 0) {
     
          print '<script type="text/javascript">alert(" The Building ID you entered is incorrect,check it and try again.");</script>';
        
               
            }else{
                $row=mysqli_fetch_assoc($res);
             
                $ownerID=$row['ownerID'];
                $buildingName=$row['buildingName'];
                $buildingID=$row['buildingID'];
             
                $complain_insert="INSERT INTO complaint (complaint,complaintTime,buildingID,buildID,ownerID,buildingName) VALUES     ('$complaint',UNIX_TIMESTAMP(),'$buildingID','$buildID','$ownerID','$buildingName');";

                 
                      if($conn->query($complain_insert) === TRUE){
                          $_SESSION['comAlert']=" <div class=\"alert alert-success\" role=\"alert\">
                            You're complaint has been aired successfully.
                    </div>";
                    print '<script type="text/javascript">alert("  You\'re complaint has been aired successfully.");</script>';
                      }else{
                        print '<script type="text/javascript">alert("Complaint Filed Unsuccessfully");</script>';
                      }


                     }

            } else if (isset ($_POST["submitPay"])){

              $buildID = mysqli_real_escape_string($conn, $_POST["buildID"]);
              $transID = mysqli_real_escape_string($conn, $_POST["transID"]);
                
           $ress=$conn->query("SELECT ownerID,buildingName,buildinID FROM building WHERE buildID ='".$buildID."'");  

              if($ress->num_rows === 0) {
     
          print '<script type="text/javascript">alert(" The Building ID you entered is incorrect,check it and try again.");</script>';
                 
              }else{
                  $row=mysqli_fetch_assoc($ress);
                  $ownerID=$row['ownerID'];
                  $buildingName=$row['buildingName'];
                  $buildingID=$row['buildingID'];
                    
              $transaction_insert="INSERT INTO prepay (transactionID,buildingID,buildID,ownerID,buildingName) VALUES ('$transID','$buildinID','$buildID','$ownerID','$buildingName');";
 
              if($conn->query($transaction_insert) === TRUE){
                print '<script type="text/javascript">alert("Transaction Number Submitted Succesfully");</script>';
              }else{
                print '<script type="text/javascript">alert("Transaction Number Submitted Unsuccessfully");</script>';
              }
            }
          }
        
        ?>

    
    
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
</body>
</html>