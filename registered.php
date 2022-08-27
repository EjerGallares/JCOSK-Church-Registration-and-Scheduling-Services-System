<!DOCTYPE html>
<html lang="en">
<head>
<?php $page = 'registered';?>
<?php
  session_start();
   if(isset($_SESSION['user_name'])){
   }else{
   header("Location: index.php");
 }
?>
<?php include 'process.php'; ?>
<?php include './sidebar/sidebar.php';?> 

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered</title>
</head>
<body>
 
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Registered</span>
      </div>
    
  

      <div class="profile-details">
      <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $adminID = $_SESSION['adminID'];
  $img = $mysqli->query("SELECT Img_ADMIN FROM tbl_logadmin WHERE admin_ID = $adminID") or die($mysqli->error);
?>
              <?php
              
                  while ($list = $img-> fetch_assoc()):
                    ?>
                 
                  <img class="" src="<?php echo  "upload/".$list['Img_ADMIN']; ?>" width="25px" alt="Image">
           
            <?php endwhile?>
        <span class="admin_name">
        
        <?php 
          echo $_SESSION['user_name'];
          ?>
        </span>

      </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
  
    <?php 
      if(isset($_SESSION['statuss']) && $_SESSION['statuss'] != '')
      {
        ?>
       
       <script>
  swal({
  title: "<?php echo $_SESSION['statuss']; ?>",
  icon: "<?php echo $_SESSION['statuss_code']; ?>",
  button: "Ok",
});
  </script>
        <?php

        unset($_SESSION['statuss']);
      }
   ?>
            <!-- update modal -->
  <form action="process.php" method="POST">
    <div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="hidden" name="editid" id="editid">
      <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Picture:</label>
    <div class="col-sm-10">
      <input type="file" name="img_user" class="form-control" id="imguser" required>
    </div>
  </div>
      <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Username:</label>
    <div class="col-sm-10">
	<input type="text" name="uname" id="username" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="text" name="uemail" id="email" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Fullname:</label>
    <div class="col-sm-10">
      <input type="text" name="ufname" id="fname" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Contact:</label>
    <div class="col-sm-10">
      <input type="text" name="contact" id="ucontact" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Date Register:</label>
    <div class="col-sm-10">
      <input type="text" name="udatereg" id="datereg" class="form-control" id="inputText" required>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btnback" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updateUser" class="btnSave">Update</button>
      </div>
    </div>
  </div>
</div>
</form>
    <!-- end of update modal-->
<br>
<br>
<?php 
      if(isset($_SESSION['statuss']) && $_SESSION['statuss'] != '')
      {
        ?>
       
       <script>
  swal({
  title: "<?php echo $_SESSION['statuss']; ?>",
  icon: "<?php echo $_SESSION['statuss_code']; ?>",
  button: "Ok",
});
  </script>
        <?php
        unset($_SESSION['statuss']);
      }
   ?>

    <?php
  $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query ('SELECT * FROM tbl_userreg where acct_Status="Member" ') or die($mysqli->error);
?>
   <form action="process.php" method="Post">
  <table id="exampleReg" class="display" style="width:100%">
        <thead class="head">
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Username</th>
                <th>Email</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Date Register</th>
                <th><button type="submit" name="delete" class="btn btn-danger">Delete</button></th>
            </tr>
        </thead>
        <tbody>
        <?php 
    while ($row = $result-> fetch_assoc()):?>
     <tr>
           <td><?php echo $row['regUserID']; ?></td>
           <td>
                    <img class="pics" src="<?php echo "./userSide/uploads/".$row['user_PIC']; ?>" width="100px" alt="Image">
            </td>
              <td><?php echo $row['username_REG']; ?></td>
              <td><?php echo $row['emailAdd_REG']; ?></td>
              <td><?php echo $row['Fullname_REG']; ?></td>
              <td><?php echo $row['address_REG']; ?></td>
              <td><?php echo $row['contact_REG']; ?></td>
              <td><?php echo $row['date_REG']; ?></td>
              <td style="width:10px; text-align: center">
               <input type="checkbox" name="delcheck[]" value="<?= $row['regUserID']; ?>">
            </td> 
            
    </tr>
  <?php endwhile ?>
            
        </tbody>
        <tfoot class="footer">
            <tr>
            <th>ID</th>
                <th>Picture</th>
                <th>Username</th>
                <th>Email</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Date Register</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    </form>
  <!-- <form action="process.php" method="Post">
    <table class="table" id="example">
  <thead class="head">
    <tr class="rows">
      <th scope="col">ID</th>
      <th scope="col">Picture</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Fullname</th>
      <th scope="col">Contact</th>
      <th scope="col">Date Register</th>
      <th colspan="2"><button type="submit" name="delete" class="btn btn-danger">Delete</button></th>
    </tr>
  </thead>
  <tbody>
?php 
    while ($row = $result-> fetch_assoc()):?>
     <tr>
           <td>?php echo $row['regUserID']; ?></td>
           <td>
                    <img class="pics" src="?php echo "./userSide/uploads/".$row['user_PIC']; ?>" width="100px" alt="Image">
            </td>
              <td>?php echo $row['username_REG']; ?></td>
              <td>?php echo $row['emailAdd_REG']; ?></td>
              <td>?php echo $row['Fullname_REG']; ?></td>
              <td>?php echo $row['contact_REG']; ?></td>
              <td>?php echo $row['date_REG']; ?></td>
              <td style="width:10px; text-align: center">
               <input type="checkbox" name="delcheck[]" value="?= $row['regUserID']; ?>">
            </td> 
            
    </tr>
  ?php endwhile ?>
</table> -->
  
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#exampleReg').DataTable();
} );
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>







<script>
$(document).ready(function () {
  $('.btnedit').on('click', function() {
    $('#updatemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
          return $(this).text();
      }).get();

      console.log(data);
      $('#editid').val(data[0]);
      // $('#imguser').val(data[1]);
      $('#username').val(data[2]);
      $('#email').val(data[3]);
      $('#fname').val(data[4]);
      $('#ucontact').val(data[5]);
      $('#datereg').val(data[6]);
  }); 
});

</script> -->








    <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
</body>
</html>