<?php
require "DB_connect.php";

$Id=$_GET['ID'];
$rNumber=$_GET['rNumber'];
$conpay_query="SELECT * FROM prepay where ID ='$Id'";
                  $show=$conn->query($conpay_query);
                $show_row = $show->fetch_assoc();
               
                        $trans=  $show_row["transactionID"];
                        $rNumber=$show_row["rentalNumber"];
                        $amount=$show_row["amount"];
                        $buildID=$show_row["buildID"];
                        $buildingID= $show_row["buildingID"];
                        $ownerID=$show_row["ownerID"];
                        $buildingName=$show_row["buildingName"];
                       
                       
                        $del_pre = "DELETE FROM prepay WHERE ID = '$id'";
         if($conn->query($del_pre) === TRUE){
                            
             $confirm="INSERT INTO conpay (transactionID,buildID,buildingID,ownerID,buildingName,rentalNumber,amount) VALUES 
                 ('$trans','$buildID','$buildingID','$ownerID','$buildingName','$rNumber','$amount');";

if($conn->query($confirm) === TRUE){
    
   
        header("Location: ../confirmed.php");
           }else{
            print (mysqli_error($conn));
        
                 
           }
}else{
    header("Location: ../pay.php"); 


}
?>