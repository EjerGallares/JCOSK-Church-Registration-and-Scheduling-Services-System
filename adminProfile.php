<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <?php $page = 'adminProfile';?>
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
    <title> JcoskAdminProfile </title>
  
    <link rel="icon" href="logos.png">
    <!-- Boxicons CDN Link -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">  
  </head>
<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Admin Profile</span>
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
                 
                  <img class="" src="<?php echo  "Upload/".$list['Img_ADMIN']; ?>" width="25px" alt="Image">
           
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php $mysqli = new mysqli('localhost', 'root', '', 'db_adminside')
  or die(mysql_error($mysqli));
  $adminID = $_SESSION['adminID'];
  $img = $mysqli->query("SELECT Img_ADMIN FROM tbl_logadmin WHERE admin_ID = $adminID") or die($mysqli->error);
?>
    <div class="card">
  <div>
  <?php
              
              while ($list = $img-> fetch_assoc()):
                ?>
             
              <img class="" src="<?php echo  "upload/".$list['Img_ADMIN']; ?>" width="25px" alt="Image">
       
        <?php endwhile?>

    <h1>  <?php 
          echo $_SESSION['user_name'];
          ?><br>
      <span>  <?php 
          echo $_SESSION['acct_Status'];
          ?></span>
    </h1>
    <p><i>" Gandbareba dekanai koto ga nai "</i></p>
    <div class="card-body">
              <form>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $_SESSION['user_name'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="<?php echo $_SESSION['email'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Firstname</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $_SESSION['fname'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Lastname</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $_SESSION['lname'] ?>">
                      </div>
                    <!-- <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                      </div>
                    </div> -->
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $_SESSION['address'] ?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Contact</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="Contact number" value="<?php echo $_SESSION['contact'] ?>">
                      </div>
                    </div>
                    <!-- <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                      </div>
                    </div> -->
                    <!-- <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                      </div>
                    </div> -->
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <!-- <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


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