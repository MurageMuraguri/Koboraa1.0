<?php
session_start();
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
<div class=row>
<div class="col-md-3">
    <div id="wrapper">
  

      <!-- Sidebar -->
              <ul class="sidebar navbar-nav">

                <li class="nav-item">
                  <a class="nav-link" href="buildings.php">
                    <i class="fas fa-home"></i>
                    <span>Buildings</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tenants.php">
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





      

        </div>
          </div>
          <p>
          
          
          
          
          
          
          
          
          
          
          
          </p>

    <div class="col-md-9">
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Complaint Time</th>
                      <th scope="col">Building</th>
                      <th scope="col">Complaint</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  </table>
<?php
require "process/DB_connect.php";
$ownerID=$_SESSION['userID'];
$showcom_query="SELECT * FROM complaint where ownerID ='$ownerID' ";
$show=$conn->query($showcom_query);
$count=1;
if ($show->num_rows > 0){
  while($show_row = $show->fetch_assoc()){
?>
                  <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row"><?php print $count; ?></th>
                      <td><?php print date("jS F Y", $show_row['complaintTime']); ?></td>
                      <td><?php print $show_row['buildingName'];  ?></td>
                      <td><?php print $show_row['complaint'];?></td>
                      <td><a href="process/complaintDel.php?complaintID=<?php print $show_row['complaintID'];?>">Mark as done</a></td>
                    </tr>
                   
                    
                  </tbody>
                </table>
<?php
$count++;
  }
}

?>
    </div>

</div>
        <!-- /.container-fluid -->
  <br/>

  
            <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Koboraa 2018 </span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

   

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
            <a class="btn btn-primary" href="">Logout</a>
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
