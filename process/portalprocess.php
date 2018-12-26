<?php
session_start();
require "DB_connect.php";


 if (isset($_POST["submitCom"])){
              
                
                

                     $buildID = mysqli_real_escape_string($conn, $_POST["buildID"]);
                     $complaint = mysqli_real_escape_string($conn, $_POST["complaint"]);
 
                    $res=$conn->query("SELECT ownerID,buildingName FROM building WHERE buildID ='".$buildID."'");  

            if($res->num_rows === 0) {
        $_SESSION['comAlert']=" <div class=\"alert alert-danger\" role=\"alert\">
                   The Building ID you entered is incorrect,check it and try again.
                    </div>";
        $_SESSION['com']=2;
                header("Location: ../portal.php");
            }else{
                $row=mysqli_fetch_assoc($res);
                print_r($row);
                $ownerID=$row['ownerID'];
             
                $complain_insert="INSERT INTO complaint (complaint,complaintTime,buildingID,ownerID) VALUES     ('$complaint',UNIX_TIMESTAMP(),'$buildID','$ownerID');";

                    print_r ($ownerID);
                      if($conn->query($complain_insert) === TRUE){
                          $_SESSION['comAlert']=" <div class=\"alert alert-success\" role=\"alert\">
                            You're complaint has been aired successfully.
                    </div>";
                          $_SESSION['com']=1;
                          header("Location: ../portal.php");
                      }else{
                        print '<script type="text/javascript">alert("Complaint Filed Unsuccessfully");</script>';
                      }


                     }

            } else if (isset ($_POST["submitPay"])){

              $buildID = mysqli_real_escape_string($conn, $_POST["buildID"]);
              $transID = mysqli_real_escape_string($conn, $_POST["transID"]);
                
            
              $transaction_insert="INSERT INTO prepay (transactionID,buildingID) VALUES ('$transID','$buildID');";
 
              if($conn->query($transaction_insert) === TRUE){
                print '<script type="text/javascript">alert("Transaction Number Submitted Succesfully");</script>';
              }else{
                print '<script type="text/javascript">alert("Transaction Number Submitted Unsuccessfully");</script>';
              }
            }
        
 ?>
