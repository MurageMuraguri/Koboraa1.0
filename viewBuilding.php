<?php
session_start();
$_SESSION['tIN']=0;
require "process/DB_connect.php";

if(isset($_GET['ID'])){
$_SESSION['buildingID']=$_GET['ID'];
}
$buildingID=$_SESSION['buildingID'];
$showBuild_query="SELECT * FROM building where buildingID ='$buildingID' ";
$show=$conn->query($showBuild_query);
$show_row = $show->fetch_assoc();
$_SESSION['buildingName']=$show_row['buildingName'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

       <title>Koboraa</title>

    <!-- Bootstrap core CSS-->
    <link href="resources/style/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>


  <body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">


  <img src="resources/images/icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        
      <a class="navbar-brand mr-1" href="home.php">Koboraa</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>


      <!-- Navbar -->
        
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          
         <span>
          </a>
         
        </li>
      
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
            
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </span>
        </li>
      
      </ul>
            Hello <?php print($_SESSION['firstName']." ".$_SESSION['lastName']);?>
    </nav>

    <!--JUMBOTRON TING-->
    <div class="jumbotron jumbotron-fluid" >
  <div class="container">
    <h1 class="display-4"><?php print $show_row['buildingName']; ?></h1>
    <h4>Tenants</h4>
  </div>
</div>


    <!--END-->


    <div class="row">
                    <div class="col-md-3">
                            <div id="wrapper">

                                    <!-- Sidebar -->
                                    <ul class="sidebar navbar-nav">
                                        
                                        
                                        <li class="nav-item">
                                        <a class="nav-link" href="viewBuilding.php">
                                            <i class="fas fa-users"></i>
                                            <span>Tenants</span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="complaints.php">
                                            <i class="fas fa-asterisk"></i>
                                            <span>Complaints</span></a>
                                        </li>
                                    
                                        <li class="nav-item">
                                        <a class="nav-link" href="pay.php">
                                            <i class="fas fa-hand-holding-usd"></i>
                                            <span>Payment</span></a>
                                        </li>

                                        <li class="nav-item">
                                                            <a class="nav-link" href="reminder.php">
                                                                <i class="fas fa-mail-bulk"></i>
                                                                <span>Reminders</span></a>
                                                            </li>
                                    </ul>

                            <div id="content-wrapper">

                                <div class="container-fluid">   

                            



                            

                    </div>
                    </div>
                        </div>
                </div>

  
   <div class="col-md-9">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >+ ADD TENANTS</button>
       
       <?php
       if($_SESSION['tIN']!=0){
            print $_SESSION['tenantIN'];
            $_SESSION['tenantIN']="";
            $_SESSION['tIN']=0;
} ?>
       
        
       <table class="table table-striped" >
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tenant Name</th>
                      <th scope="col">House/Office Number</th>
                      <th scope="col">Phone Number</th>
                     <th scope="col">Email</th>
                     <th scope="col">     </th>
                   
                    </tr>
                  </thead>
    <?php
          $showTen_query="SELECT * FROM tenant where buildingID ='$buildingID' ";
          $show=$conn->query($showTen_query);

          if ($show->num_rows > 0){
            $count=1;
            while($show_row = $show->fetch_assoc()){        
                  
                
                
    ?>

<tbody>
                    <tr>
                      <td><?php print $count;?></td>
                        <td><?php print $show_row["tenantName"]?></td>
                        <td><?php print $show_row["rentalNumber"];?></td>
                        <td><?php print $show_row["tenantPhone"];?></td>
                        <td><?php print $show_row["tenantEmail"];?></td>
                        <td><a href="process/delUser.php?tenantID=<?php print $show_row['tenantID'];?>">Delete<?php print " ".$show_row['tenantName'];?></td>
                    </tr>
                  </tbody>
               

 
       <?php
       $count++;
            }
        }
       
       ?>
          </table>   
</div>
   </div>

















<!--Modal for building-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tenant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method = "POST" action = "process/tenantIn.php" autocomplete = "off" accept-charset="UTF-8">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> Tenant Name:</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Phone Number:</label>
            <input type="telephone" class="form-control" name="number" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">House/Office Number:</label>
            <input type="text" class="form-control" name="rentalnum" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label"></label>
            <input type="text" name="buildingID" value="<?php print $buildingID; ?>" readonly hidden>
          </div>
          
          
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Add Tenant"/>
      </div>
      </form>
    </div>
  </div>
</div>


<!--END-->

  <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="process/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </body>

</html>