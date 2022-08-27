<!DOCTYPE html>
<html lang="en">
<head>
<?php $page = 'renewed';?>
    <?php
session_start();
   if(isset($_SESSION['user_name'])){
   }else{
   header("Location: index.php");
 }?>
 
 <?php include './sidebar/sidebar.php';?> 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renewed</title>
</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Renewed</span>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- <table class="table">
  <thead class="theader">
    <tr>
      <th scope="col">Renewed ID</th>
      <th scope="col">Lastname</th>
      <th scope="col">Firstname</th>
      <th scope="col">M.I</th>
      <th scope="col">Address</th>
      <th scope="col">Contact number</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td> 
    </tr>
    <tr>
   <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td> 
    </tr>
    <tr>
     <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody> -->
</table>
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