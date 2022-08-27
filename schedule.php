<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <?php $page = 'schedule';?>
  <?php
  session_start();
   if(isset($_SESSION['user_name'])){
   }else{
   header("Location: index.php");
 }


?>
  <?php include './sidebar/sidebar.php';?> 
    <meta charset="UTF-8">
    <title> JcoskSchedule </title>
  
    <link rel="icon" href="logos.png">
    <!-- Boxicons CDN Link -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> 
    </head>
<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Guest Appoinments</span>
      </div>
   
      <div class="profile-details">
      <?php $mysqli = new mysqli('localhost', 'root', '', 'db_adminside')
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
</body>
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
</html>