<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  
<?php $page = 'registeredAdmin';?>
<?php
  session_start();
   if(isset($_SESSION['emailadmin'])){

   }else{
   header("Location: index.php");
 } 


?>  
<?php include './sidebarMain/sidebar.php';?>

    <meta charset="UTF-8">
    <title> JCOSK </title>
  
    <link rel="stylesheet" href="style.css">
   
    <link rel="icon" href="logos.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  
   </head>
<body>

  <!-- <div class="sidebar">
    <div class="logo-details">
     <div class="icon">
		<img src="logo.png" alt="">
		</div>
      <span class="logo_name">JCOSK</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class='bx bx-box' ></i>
            <span class="links_name">Renewed</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Registered</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-calendar"></i>
            <span class="links_name">Schedule</span>
          </a>
        </li>
        
        <li> <a href="#"> <i class="bx bx-cog"></i> <span class="links_name">Activity Log</span> </a> </li>
        <li>&nbsp;</li>
        <li>&nbsp;</li>    
<li class="log_out">
      <a href="logout.php">
        <i class='bx bx-log-out'></i>
        <span class="links_name">Log out</span>
      </a>
      </li>
      </ul>
  </div> -->



  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Main Dashboard</span>
      </div>
   <p class = "greet">
        <script>
          let date = new Date();
let hours = date.getHours();
let greetings;

if(hours >18)
greetings= "Good Evening";
else if(hours>=12)
greetings= "Good Afternoon";
else if(hours>=0)
greetings= "Good Morning";
else
greetings= "Hello!";
document.write(greetings);
          </script>
          </p>
      <p class="tings">    
        Head Pastor
    </p>
   
  
      <div class="profile-details">
      <!-- ?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $adminID = $_SESSION['pID'];
  $img = $mysqli->query("SELECT Img_ADMIN FROM tbl_logadmin WHERE admin_ID = $adminID") or die($mysqli->error);
?>
              ?php
              
                  while ($list = $img-> fetch_assoc()):
                    ?>
                 
                  <img class="" src="?php echo  "upload/".$list['Img_ADMIN']; ?>" width="25px" alt="Image">
           
            ?php endwhile?>  -->
            <img class="" src="upload/ptrmel2.jpg"  alt="">

   
        <span class="admin_name">
          <!-- ?php 
          echo $_SESSION['user_name'];
  
         
          ?>   -->
          Melquiades
          </span>
            
    </nav>




    <br>
    <br>
    <br>
    <br>
  
    <?php 
      if(isset($_SESSION['status']) && $_SESSION['status'] != '')
      {
        ?>
       
       <script>
  swal({
  title: "<?php echo $_SESSION['status']; ?>",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok",
});
  </script>
        <?php
        unset($_SESSION['status']);
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
      if(isset($_SESSION['status']) && $_SESSION['status'] != '')
      {
        ?>
       <script>
  swal({
  title: "?php echo $_SESSION['status']; ?>",
  icon: "?php echo $_SESSION['status_code']; ?>",
  button: "Ok",
});
  </script>
        <?php
        unset($_SESSION['status']);
      }
   ?> 

    <?php
  $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_logadmin where acct_Status="Admin" ') or die($mysqli->error);
?>
   <form action="process.php" method="Post">
  <table id="example" class="display" style="width:100%">
        <thead class="head">
            <tr>
                <th>Picture</th>
                <th>Username</th>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Date Register</th>
                <th><button type="submit" name="Decline" class="btn btn-danger">Decline</button></th>
            </tr>
        </thead>
        <tbody>
        <?php 
    while ($row = $result-> fetch_assoc()):?>
     <tr>
         
           <td>
                    <img class="pics" src="<?php echo "upload/".$row['Img_ADMIN']; ?>" width="100px" alt="Image">
            </td>
              <td><?php echo $row['ad_username']; ?></td>
              <td><?php echo $row['email_admin']; ?></td>
              <td><?php echo $row['ad_fname']; ?></td>
              <td><?php echo $row['ad_lname']; ?></td>
              <td><?php echo $row['ad_address']; ?></td>
              <td><?php echo $row['ad_contact']; ?></td>
              <td><?php echo $row['admin_date']; ?></td>
              <td style="width:10px; text-align: center">
               <input type="checkbox" name="cb_Approve[]" value="<?= $row['admin_ID']; ?>">
            </td> 
              <td style="width:10px; text-align: center">
               <input type="checkbox" name="delcheck[]" value="<?= $row['admin_ID']; ?>">
            </td> 
            
    </tr>
  <?php endwhile ?>
            
        </tbody>
        <tfoot class="footer">
            <tr>
            <th>Picture</th>
                <th>Username</th>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
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
    $('#example').DataTable();
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