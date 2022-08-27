
<!DOCTYPE html>
<html lang="en">
<head>
<?php $page = 'pastoral';?>

<?php
  session_start();
   if(isset($_SESSION['user_name'])){
   }else{
   header("Location: index.php");
 }
?>
<?php include 'DeletePas.php'; ?>
<?php include './sidebar/sidebar.php';?> 

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastoral</title>
</head>
<body>
    
 
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Pastoral</span>
      </div>
      
</form>
      <div class="profile-details">
        <img src="logo.png" alt="">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<!-- Modal -->
   <!-- ?php if (isset ($_GET['error'])) {
       if($_GET['error']=="Successfully Added"){
           echo"<script> 
           Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Successfully Added',
             showConfirmButton: false,
             timer: 1500
           })</script>";
       }
   } ?> -->
          

 <?php
   $conn = mysqli_connect("localhost", "root", "", "db_adminside");
 if(isset($_POST['edit_data_btn']))
 {
    $id = $_POST['edit_id'];   
    $query = "SELECT * FROM tbl_pastoral WHERE ptr_ID='$id' ";
    $query_run = mysqli_query($conn, $query);
    
    foreach($query_run as $row)
    {
        ?>
         <form action="" method="POST" enctype="multipart/form-data">
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Pastor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Picture:</label>
    <div class="col-sm-10">
	<input type="file" name="ptrImg"  value="<?php echo $row['ptr_IMG']; ?>" class="form-control" id="ptrImg" >
    </div>
  </div>
      <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name:</label>
    <div class="col-sm-10">
	<input type="text" name="ptrnameOld" value="<?php echo $row['ptr_Name']; ?>" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Address:</label>
    <div class="col-sm-10">
      <input type="text" name="ptrAddOld" value="<?php echo $row['ptr_Add']; ?>" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Contact:</label>
    <div class="col-sm-10">
      <input type="text" name="ptrContactOld" value="<?php echo $row['ptr_contact']; ?>" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Years of Service:</label>
    <div class="col-sm-10">
      <input type="text" name="ptryosOld" value="<?php echo $row['ptr_years']; ?>" class="form-control" id="inputText" required>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btnback" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="UpatePastor" class="btnSave">Update</button>
      </div>
    </div>
  </div>
</div>
</form>
        <?php
    }
 }
       
   ?>



<!-- Button trigger modal -->
<a href="#exampleModal"  data-bs-toggle="modal" data-backdrop="static" data-keyboard="false" data-bs-target="#exampleModal" class="add">Add Pastor</a>
    <!-- end -->
    <?php
  $conn = mysqli_connect('localhost', 'root', '', 'db_adminside');
$query = "SELECT * FROM tbl_pastoral";
$query_run = mysqli_query($conn, $query);
?> 
    <table class="table">
  <thead class="head">
    <tr class="rows">
      <th scope="col">Pastor ID</th>
      <th scope="col">Picture</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">Years of Service</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
        <?php 

          if(mysqli_num_rows($query_run)> 0)
          {
              foreach($query_run as $row)
              {
                ?>
                <tr>
                  <td><?php echo $row['ptr_ID'];?></td>
                  <td>
                    <img class="pics" src="<?php echo "upload/".$row['ptr_IMG']; ?>" width="100px" alt="Image">
                  </td>
                  <td><?php echo $row['ptr_Name'];?></td>
                  <td><?php echo $row['ptr_Add'];?></td>
                  <td><?php echo $row['ptr_contact'];?></td>
                  <td><?php echo $row['ptr_years'];?></td>
                  <td>
                   <form action="edit.php" method="POST">
                   <input type="hidden" name="edit_id" value="<?php echo $row['ptr_ID']?>">
                    <button type="submit" name="edit_data_btn" class="btn btn-success"> Edit</a></button> &nbsp <a href="DeletePas.php?delete=<?php echo $row['ptr_ID'];?>" name="delete" class="btn2">Delete</a></td> 
                   </form>
               </tr>
               <!-- edit.php?id=?php echo $row['ptr_ID']; ?> -->
                 <?php
              }
          }
          else
          {
              ?>
                <tr>
                  <td>No Record</td>
               </tr>
               <?php
          }

        ?>


      <!-- ?php
      while ($row = $result-> fetch_assoc()):?>
     <tr>
           <td>?php echo $row['ptr_ID']; ?></td>
              <td>?php echo $row['ptr_IMG'];?></td>
              <td>?php echo $row['ptr_Name']; ?></td>
              <td>?php echo $row['ptr_Add']; ?></td>
              <td>?php echo $row['ptr_contact']; ?></td>
              <td>?php echo $row['ptr_years']; ?></td>
             <td><a href="" class="btn1">Edit</a> &nbsp <a href="process.php?delete=?php echo $row['ptr_ID'];?>" name="delete" class="btn2">Delete</a></td> 
            
    </tr>
    ?php endwhile ?> -->
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

