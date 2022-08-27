<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<?php $page = 'dashboard';?>
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
        <span class="dashboard">Dashboard</span>
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

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Members</div>
            <div class="number">
            <?php 
                  $conn = mysqli_connect("localhost","root","","jcoskchurch_db");
            $query = 'SELECT regUserID FROM tbl_userreg where acct_Status="Member" order BY regUserID';
            $query_run = mysqli_query($conn,$query);
          
              $row = mysqli_num_rows($query_run);
              echo "$row" ;
            ?>
            </div>
            <div class="indicator">
           
               
                
      
            </div>
          </div>
          <i class='bx bxs-user-rectangle'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total number</div>
      
            <div class="number">
              <?php 
                  $conn = mysqli_connect("localhost","root","","jcoskchurch_db");
            $query = 'SELECT regUserID FROM tbl_userreg where acct_Status="Member" order BY regUserID';
            $query_run = mysqli_query($conn,$query);
          
              $row = mysqli_num_rows($query_run);
              echo "$row" ;
            ?></div>
            <div class="indicator">
       
         
            </div>
          </div>
          <i class='bx bxs-user-plus' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Pending&nbsp;&nbsp;</div>
            <div class="number">
            <?php 
                  $conn = mysqli_connect("localhost","root","","jcoskchurch_db");
            $query = 'SELECT regUserID FROM tbl_userreg where acct_Status!="Member" order BY regUserID';
            $query_run = mysqli_query($conn,$query);
          
              $row = mysqli_num_rows($query_run);
              echo "$row" ;
            ?>   
            </div>
            <div class="indicator">
             
           
				
            </div>
          </div>
          <i class='bx bxs-user-plus' ></i>
        
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Schedule</div>
            <div class="number">0</div>
            <div class="indicator">
           
     
            </div>
          </div>
          <i class='bx bx-calendar' ></i>
        </div>
      </div>


      <!-- Registration Act -->
 
      <div class="boxes">
        <div class=" history-act box">
          <div class="title">Registered Members&nbsp;</div>
          <div class="his-details">

          <ul class="details">
            <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_userreg where acct_Status="Member"') or die($mysqli->error);
?>
              <li class="topic">Picture</li>
              <?php
                  while ($list = $result-> fetch_assoc()):?>
                  <li>
                  <img class="pics" src="<?php echo  "userSide/uploads/".$list['user_PIC']; ?>" width="25px" alt="Image">
                  </li> 
                  <?php endwhile?>
            </ul>
          

            <ul class="details">
            <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_userreg where acct_Status="Member"') or die($mysqli->error);
?>
              <li class="topic">Date Registered</li>
              <?php
                  while ($list = $result-> fetch_assoc()):?>
                  <li><?php echo $list['date_REG'];?></li> 
                  <?php endwhile?>
            </ul>



            <ul class="details">
            <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_userreg where acct_Status="Member"') or die($mysqli->error);
?>
            <li class="topic">Fullname</li>
            <?php
                  while ($list = $result-> fetch_assoc()):?>
                  <li><?php echo $list['Fullname_REG'];?></li> 
                  <?php endwhile?>
            </ul>
          </ul>
          <ul class="details">
          <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_userreg where acct_Status="Member"') or die($mysqli->error);
?>
            <li class="topic">Username</li>
            <?php
                  while ($list = $result-> fetch_assoc()):?>
                  <li><?php echo $list['username_REG'];?></li> 
                  <?php endwhile?>
          </ul>
        
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <!-- end of Registration act -->









                      <!-- Pending -->
        <div class=" membership-his box">
          <div class="title">Pending member</div>
          <div class="his-details">
          <ul class="details">
          <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_userreg where acct_Status!="Member"') or die($mysqli->error);
?>
              <li class="topic">Picture</li>   
              <?php
                  while ($list = $result-> fetch_assoc()):?>
                  <li>
                  <img class="pics" src="<?php echo  "userSide/uploads/".$list['user_PIC']; ?>" width="25px" alt="Image">
                  </li> 
                  <?php endwhile?>
            </ul>

            <ul class="details">
            <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_userreg where acct_Status!="Member"') or die($mysqli->error);
?>
              <li class="topic">Date Registered</li>
              <?php
                  while ($list = $result-> fetch_assoc()):?>
                  <li><?php echo $list['date_REG'];?></li> 
                  <?php endwhile?>
				 
            </ul>
            <ul class="details">
            <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_userreg where acct_Status!="Member"') or die($mysqli->error);
?>
            <li class="topic">Fullname</li>
            <?php
                  while ($list = $result-> fetch_assoc()):?>
                  <li><?php echo $list['Fullname_REG'];?></li> 
                  <?php endwhile?>
				 
            </ul>
          </ul>
          <ul class="details">
          <?php $mysqli = new mysqli('localhost', 'root', '', 'jcoskchurch_db')
  or die(mysql_error($mysqli));
  $result = $mysqli->query('SELECT * FROM tbl_userreg where acct_Status!="Member"') or die($mysqli->error);
?>
            <li class="topic">Username</li>
            <?php
                  while ($list = $result-> fetch_assoc()):?>
                  <li><?php echo $list['username_REG'];?></li> 
                  <?php endwhile?>
          </ul>
        
          </div>
          <!-- end of renewal act -->
  </section>







  
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