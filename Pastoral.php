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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
              <!-- Add Modal -->
<form action="ptrReg.php" method="POST" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	<input type="file" name="ptrImg" class="form-control" id="inputText" required>
    </div>
  </div>
      <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name:</label>
    <div class="col-sm-10">
	<input type="text" name="ptrname" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Address:</label>
    <div class="col-sm-10">
      <input type="text" name="ptrAdd" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Contact:</label>
    <div class="col-sm-10">
      <input type="text" name="ptrContact" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Years of Service:</label>
    <div class="col-sm-10">
      <input type="text" name="ptryos" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Status:</label>
    <div class="col-sm-10">
      <input type="text" name="ptrStat" class="form-control" id="inputText" required>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btnback" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addPastor" class="btnSave">Add</button>
      </div>
    </div>
  </div>
</div>
</form>
          <!-- end of Add Modal -->
     
        <!-- Update Modal -->
        <form action="ptrReg.php" method="POST">
        <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit pastor data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <input type="text" name="update_id" id="update_id">
      <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name:</label>
    <div class="col-sm-10">
	<input type="text" name="ptrname" id="name" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Address:</label>
    <div class="col-sm-10">
      <input type="text" name="ptrAdd" id="address" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Contact:</label>
    <div class="col-sm-10">
      <input type="text" name="ptrContact" id="contact" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Years of Service:</label>
    <div class="col-sm-10">
      <input type="text" name="ptryos" id="yearofservice" class="form-control" id="inputText" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Status:</label>
    <div class="col-sm-10">
      <input type="text" name="ptrStat" class="form-control" id="ptrStat" required>
    </div>
  </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btnback" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btnSave">Save</button>
      </div>
    </div>
  </div>
</div>
    </form>
    
          <!-- end Update -->
    
 <!-- Button trigger modal -->

<a href="#exampleModal"  data-bs-toggle="modal"  data-keyboard="false" data-bs-target="#exampleModal" class="add">Add Pastor</a>
  
    <!-- end -->

    <?php
$conn = mysqli_connect('localhost', 'root', '', 'jcoskchurch_db');
$query = "SELECT * FROM tbl_pastoral";
$query_run = mysqli_query($conn, $query);
?> 

<table id="examples" class="display" style="width:100%">
<thead class="head">
    <tr>
    <th>ID</th>
      <th>Picture</th>
      <th>Name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Years of Service</th>
      <th>Status</th>
      <th>Action</th>
      
      <!-- <th style="text-align:right"><button type="submit" name="delete" class="btn btn-danger">Delete</button></th> -->
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
                  <td><?php echo $row['ptrStatus'];?></td>
                  <td style=" ">
                   
                   <!-- <input type="hidden" name="edit_id" value="?php echo $row['ptr_ID']?>"> -->
                    <button type="submit" class="btn btn-success editBtn">Update</button> </td> 
                  
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
        </tbody>
        <tfoot class="footer">
            <tr>
            <th>ID</th>
      <th>Picture</th>
      <th>Name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Years of Service</th>
      <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>


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
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
  $('.editBtn').on('click', function() {
    $('#editmodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
          return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#ptrImg').val(data[1]);
      $('#name').val(data[2]);
      $('#address').val(data[3]);
      $('#contact').val(data[4]);
      $('#yearofservice').val(data[5])
      $('#ptrStat').val(data[6]);

  }); 
});


</script>

<script>
$(document).ready(function() {
    $('#examples').DataTable();
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

