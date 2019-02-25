<?php
require "process/DB_connect.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Koboraa Admin</title>
    <link href="resources/style/bootstrap.css" rel="stylesheet"/>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php
$show_query="SELECT * FROM users WHERE designation = 0 ";
$show=$conn->query($show_query);
?>
 
 <!-- Image and text -->
 <!-- Navbar -->

 <!-- Navbar -->
        
 <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="resources/images/icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
         Koboraa Admin
      
        <div >

           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><h5>Logout</h5></a>
          </div>
          
         
      </nav>
     <div class="row">
     <div class="col-md-1">
     
     </div>
     
     <div class="col-md-9">
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
     <style>
.vl {
  border-left: 3px solid black;
  height: 500px;
}
</style>

<div class="vl">
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#usersModal"><i class="fas fa-plus"></i> Add Users</button>
</div>


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
    <!--END-->

    <!-- Add User Modal-->
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <form role="form" method = "POST" action = "process\userAdd.php" autocomplete = "off" accept-charset="UTF-8">
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
                     <div class="form-group">
                     <label for="designation">Dsesignation</label>
                     <label for="designation">(1 for Admin,0 for Users)</label>
                        <input type="number" min="0" max="1"class="form-control"  placeholder="Designation" name="designation" required>
                    </div>
                   
                    <input type="submit" id="submit" name="submit" class="btn btn-outline-primary" value="Register" />
                </form>
          </div>
          
        </div>
      </div>
    </div>
    <!--END-->
    

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>