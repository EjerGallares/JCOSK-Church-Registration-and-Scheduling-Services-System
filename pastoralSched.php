<!DOCTYPE html>
<html lang="en">
<head>
<?php $page = 'ptrSched';?>
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
    <title>Pastoral Appointment</title>
</head>
<body>
    
 
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Pastoral Appointments</span>
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
<br>
<br>
<br>
<br>
<br>
    <div class="card-container">
         <div class="upper-container">
            <div class="image-container">
               <img src="Upload/ptrmel.jpg" />
            </div>
         </div>
         <div class="lower-container">
            <div>
               <h3>Melquiades M. Salacup</h3>
               <h4>Senior pastor</h4>
            </div>
            <div>
               <p>sodales accumsan ligula. Aenean sed diam tristique,
                  fermentum mi nec, ornare arch.
               </p>
            </div>
            <div>
               <button id="btn" class="btn">View Appointments</button>
            </div>
         </div>
      </div>


      <div class="card-container2">
         <div class="upper-container2">
            <div class="image-container2">
               <img src="Upload/pastorEric.png" />
            </div>
         </div>
         <div class="lower-container2">
            <div>
               <h3>Ericson Taguinod</h3>
               <h4>Associate pastor</h4>
            </div>
            <div>
               <p>sodales accumsan ligula. Aenean sed diam tristique,
                  fermentum mi nec, ornare arch.
               </p>
            </div>
            <div>
               <button id="btn2" class="btn2">View Appointments</button>
            </div>
         </div>
      </div>

      <div class="card-container3">
         <div class="upper-container3">
            <div class="image-container3">
               <img src="Upload/pastoraJorelle.png" />
            </div>
         </div>
         <div class="lower-container3">
            <div>
               <h3>Jorelle Baria</h3>
               <h4>Associate pastor</h4>
            </div>
            <div>
               <p><i>Where God guides, He provides</i>
               </p>
            </div>
            <div>
               <button id="btn3" class="btn3">View Appointments</button>
            </div>
         </div>
      </div>

      <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

      <div class="card-container4">
         <div class="upper-container4">
            <div class="image-container4">
               <img src="Upload/pastoraPhenche.png" />
            </div>
         </div>
         <div class="lower-container4">
            <div>
               <h3>Phineche Villarete</h3>
               <h4>Associate pastor</h4>
            </div>
            <div>
               <p><i>My true life is the Anointed One, and dying means gaining more of him
                  </i></p>
            </div>
            <div>
               <button id="btn4" class="btn4">View Appointments</button>
            </div>
         </div>
      </div>
      
      <br>
      <br>




      <!-- pastor mel table -->
      <?php
  $conn = mysqli_connect('localhost', 'root', '', 'db_adminside');
$query = "SELECT * FROM tbl_schedptrmel";
$query_run = mysqli_query($conn, $query);
?> 

<table id="ptrmelTable" class="display" style="width:100%">
<thead class="head">
    <tr>
      <!-- <th>Pastor ID</th> -->
      <th>Service Category</th>
      <th>Applicant name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date/Time</th>
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
                  <!-- <td>?php echo $row['ptr_ID'];?></td> -->
                  
                  
                  <td><?php echo $row['schedPtrm_serviceCat'];?></td>
                  <td><?php echo $row['schedPtrm_fName'];?></td> 
                  <td><?php echo $row['schedPtrm_address'];?></td>
                  <td><?php echo $row['schedPtrm_contact'];?></td>
                  <td><?php echo $row['schedPtrm_email'];?></td>
                  <td><?php echo $row['schedPtrm_date'];?></td>
                  <td style=" ">
                   
                   <!-- <input type="hidden" name="edit_id" value="?php echo $row['ptr_ID']?>"> -->
                 
                  
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
        <!-- <tfoot class="footer">
            <tr>
             <th>Pastor ID</th> 
      <th>Service Category</th>
      <th>Applicant name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date/Time</th>
      <th>Action</th>
        
            </tr>
        </tfoot> -->


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



<!-- end of ptr mel table       -->

  <!-- pastor eric table -->
  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'db_adminside');
$query = "SELECT * FROM tbl_schedptreric";
$query_run = mysqli_query($conn, $query);
?> 

<table id="ptrericTable" class="display" style="width:100%">
<thead class="head">
    <tr>
      <!-- <th>Pastor ID</th> -->
      <th>Service Category</th>
      <th>Applicant name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date/Time</th>
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
                  <!-- <td>?php echo $row['ptr_ID'];?></td> -->
                  
                  
                  <td><?php echo $row['schedPtrE_serviceCat'];?></td>
                  <td><?php echo $row['schedPtrE_fName'];?></td> 
                  <td><?php echo $row['schedPtrE_address'];?></td>
                  <td><?php echo $row['schedPtrE_contact'];?></td>
                  <td><?php echo $row['schedPtrE_email'];?></td>
                  <td><?php echo $row['schedPtrE_date'];?></td>
                  <td style=" ">
                   
                   <!-- <input type="hidden" name="edit_id" value="?php echo $row['ptr_ID']?>"> -->
                 
                  
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
        <!-- <tfoot class="footer">
            <tr>
             <th>Pastor ID</th> 
      <th>Service Category</th>
      <th>Applicant name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date/Time</th>
      <th>Action</th>
        
            </tr>
        </tfoot> -->


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
<!-- end of ptr eric table       -->
 <!-- pastora jorelle -->
<?php
  $conn = mysqli_connect('localhost', 'root', '', 'db_adminside');
$query = "SELECT * FROM tbl_schedptrjorelle";
$query_run = mysqli_query($conn, $query);
?> 

<table id="ptrajorelleTable" class="display" style="width:100%">
<thead class="head">
    <tr>
      <!-- <th>Pastor ID</th> -->
      <th>Service Category</th>
      <th>Applicant name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date/Time</th>
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
                  <!-- <td>?php echo $row['ptr_ID'];?></td> -->
                  
                  
                  <td><?php echo $row['schedPtrJ_serviceCat'];?></td>
                  <td><?php echo $row['schedPtrJ_fName'];?></td> 
                  <td><?php echo $row['schedPtrJ_address'];?></td>
                  <td><?php echo $row['schedPtrJ_contact'];?></td>
                  <td><?php echo $row['schedPtrJ_email'];?></td>
                  <td><?php echo $row['schedPtrJ_date'];?></td>
                  <td style=" ">
                   
                   <!-- <input type="hidden" name="edit_id" value="?php echo $row['ptr_ID']?>"> -->
                 
                  
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
        <!-- <tfoot class="footer">
            <tr>
             <th>Pastor ID</th> 
      <th>Service Category</th>
      <th>Applicant name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date/Time</th>
      <th>Action</th>
        
            </tr>
        </tfoot> -->


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
<!-- end pastora jorelle -->
 <!-- pastora phench -->
 <?php
  $conn = mysqli_connect('localhost', 'root', '', 'db_adminside');
$query = "SELECT * FROM tbl_schedptrphench";
$query_run = mysqli_query($conn, $query);
?> 

<table id="ptraphenchTable" class="display" style="width:100%">
<thead class="head">
    <tr>
      <!-- <th>Pastor ID</th> -->
      <th>Service Category</th>
      <th>Applicant name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date/Time</th>
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
                  <!-- <td>?php echo $row['ptr_ID'];?></td> -->
                  
                  
                  <td><?php echo $row['schedPtrP_serviceCat'];?></td>
                  <td><?php echo $row['schedPtrP_fName'];?></td> 
                  <td><?php echo $row['schedPtrP_address'];?></td>
                  <td><?php echo $row['schedPtrP_contact'];?></td>
                  <td><?php echo $row['schedPtrP_email'];?></td>
                  <td><?php echo $row['schedPtrP_date'];?></td>
                  <td style=" ">
                   
                   <!-- <input type="hidden" name="edit_id" value="?php echo $row['ptr_ID']?>"> -->
                 
                  
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
        <!-- <tfoot class="footer">
            <tr>
             <th>Pastor ID</th> 
      <th>Service Category</th>
      <th>Applicant name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date/Time</th>
      <th>Action</th>
        
            </tr>
        </tfoot> -->


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

 <!-- end pastora phench -->


   
 
  

   
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


<script>
  document.getElementById("btn").addEventListener("click",function()
  {
   
      var tbl1=document.getElementById("ptrmelTable");

        
      if(tbl1.style.display=="none")
      {
        tbl1.style.display="inline-table";
    
       
     
      }
      else
      {
        tbl1.style.display="none";
      
 
      }

  })  
  document.getElementById("btn2").addEventListener("click",function()  
  {
 
      var tbl1=document.getElementById("ptrericTable");
      if(tbl1.style.display=="none") 
      {
        tbl1.style.display="inline-table";
   
      }
      else
      {
        tbl1.style.display="none";
      
      }

  })    





  document.getElementById("btn3").addEventListener("click",function()
  {
 
      var tbl1=document.getElementById("ptrajorelleTable");
      if(tbl1.style.display=="none")
      {
        tbl1.style.display="inline-table";
      
      }
      else
      {
        tbl1.style.display="none";
       
      }

  })   


  document.getElementById("btn4").addEventListener("click",function()
  {
    
      var tbl1=document.getElementById("ptraphenchTable");
      if(tbl1.style.display=="none")
      {
        tbl1.style.display="inline-table";
      
      }
      else
      {
        tbl1.style.display="none";
      
      }
  
  })   
</script>
<!-- <script>
    $(document).ready(function() {
      var datatbl=$('#ptrmelTable').DataTable(); 
    } );

    </script>  -->










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

