<!DOCTYPE html>
<html lang="en">
<head>
<?php $page = 'loghis';?>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loghistory</title>
</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Log History</span>
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
    <?php
  $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_logadmin where acct_Status="admin" ') or die($mysqli->error);
?>
<form action="muldel.php" method="Post">
<table id="exampleLog" class="display" style="width:100%">
  <thead class="head">
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>Username</th>
      <th>Email</th>
      <th>Logged In</th>
      <th>Logged Out</th>
      <th>Date Register</th>
      <th><button type="submit" name="delete" class="btn btn-danger">Delete</button></th>
    </tr>
  </thead>
  <tbody>


  <?php 
    while ($row = $result-> fetch_assoc()):?>
     <tr>
           <td><?php echo $row['admin_ID']; ?></td>
           <td>
                    <img class="pics" src="<?php echo "upload/".$row['Img_ADMIN']; ?>" width="100px" alt="Image">
            </td>
              <td><?php echo $row['ad_username']; ?></td>
              <td><?php echo $row['email_admin']; ?></td>
              <td><?php echo $row['loggedin_time']; ?></td>
              <td><?php echo $row['loggedout_time']; ?></td>
              <td><?php echo $row['admin_date']; ?></td>
             <td style="width:10px; text-align: center">
               <input type="checkbox" name="delcheck[]" value="<?= $row['admin_ID']; ?>">
            </td> 
            
    </tr>
  <?php endwhile ?>
  </tbody>
        <tfoot class="footer">
            <tr>
            <th>ID</th>
      <th>Image</th>
      <th>Username</th>
      <th>Email</th>
      <th>Logged In</th>
      <th>Logged Out</th>
      <th>Date Register</th>
                <th>Action</th>
            </tr>
        </tfoot>
</table>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#exampleLog').DataTable();
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