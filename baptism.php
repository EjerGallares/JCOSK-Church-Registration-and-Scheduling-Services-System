<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<?php $page = 'baptism';?>
<?php
  session_start();
   if(isset($_SESSION['user_name'])){
   }
   else{
   header("Location: adminLog.php");
 }



?>
<?php include './sidebar/sidebar.php';?>

    <meta charset="UTF-8">
    <title> JCOSK </title>
  

    <link rel="icon" href="logos.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
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
        <span class="dashboard">List for baptism</span>
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
     <p class="tings">  <?php 
          echo $_SESSION['user_name'];  
        
          ?>
    </p>
   
  
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
            
    </nav>
<br>
<br>
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

    <?php
  $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query ('SELECT * FROM tbl_userreg where baptismResponse="Not yet" and proposedatetimeforBaptism!="null" ') or die($mysqli->error);
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
                <th>Baptism Response</th>
                <th>Propose Date and Time</th>
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
              <td><?php echo $row['baptismResponse']; ?></td>
              <td><?php echo $row['proposedatetimeforBaptism']; ?></td>
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
                <th>Baptism Response</th>
                <th>Propose Date and Time</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    </form>



    



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#exampleReg').DataTable();
} );
</script>



  
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