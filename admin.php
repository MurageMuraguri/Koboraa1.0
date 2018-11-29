<?php
require "process/DB_connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Koboraa Admin</title>
    <link href="resources/style/bootstrap.css" rel="stylesheet"/>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
$show_query="SELECT * FROM users";
$show=$conn->query($show_query);
?>
 
 <!-- Image and text -->
 <!-- Navbar -->

 <!-- Navbar -->
        
 <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.html">
          <img src="resources/images/icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
         Koboraa
        </a>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
            
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
          Hello Super User
      </nav>

     <div class="row">
     <div class="col-md-2">
     </div>
     
     <div class="col-md-8">
      <table class="table " >
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">User name</th>
                      <th scope="col">User email</th>
                    <th scope="col">Delete</th>
                    </tr>
                  </thead>
    
      <?php
        $count=1;
   
    if ($show->num_rows > 0){
    while($show_row = $show->fetch_assoc()){
        ?>
    
    <tbody>
                    <tr>
                      <td><?php print $count;?></td>
                        <td><?php print $show_row["firstName"]." ".$show_row["lastName"];?></td>
                        <td><?php print $show_row["userMail"];?></td>
                        <td><a href="process/deleteUser.php?ID=<?php print $show_row['userID'];?>">Delete User?</td>
                    </tr>
                  </tbody>
               
    <?php
        $count++;
        }
    }
        
       
    ?>
     </table>
     </div>

     <div class="col-md-2">
     </div>
     </div>
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
</body>
</html>