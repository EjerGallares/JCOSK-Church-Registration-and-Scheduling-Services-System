<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  
<?php $page = 'events';?>
<?php
  session_start();
   if(isset($_SESSION['emailadmin'])){

   }else{
   header("Location: ./userSide/index.php");
 } 


?>  
<?php include './sidebarMain/sidebar.php';?>

    <meta charset="UTF-8">
    <title> JCOSK </title>
  
    <link rel="stylesheet" href="styleMain.css">
    <link rel="icon" href="logos.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
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
        <span class="dashboard">Create Events</span>
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





    <main>
    
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
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="eventReg.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="sign-in-form">
              <div class="logo">
              
                <h4>Create an Event</h4>
              </div>
            
              <!-- <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div> -->
          
              <div class="actual-form">
                <div class="input-wrap">
               
                  <input
                    type="file"
                    required
                    class="input-field"
                    name="image"
                    required
                  />
                </div>

                <div class="input-wrap">
                  <input
                    type="text"
                    required
                    class="input-field"
                    name="eventTitle"
                    required
                  />
                  <label>Event title</label>
                  
                </div>
                <div class="input-wrap">
                  <input
                    type="text"
                    required
                    class="input-field"
                    name="eventPlace"
                    required
                  />
                  <label>Event Place</label>
                  
                </div>
                <div class="input-wrap">
                  <input
                    type="date"
                    required
                    class="input-field"
                    name="eventDate"
                    required
                  />
                  
                </div>
                <div class="input-wrap">
                  <input
                    type="text"
                    required
                    class="input-field"
                    name="officiator"
                    required
                  />
                  <label>Officiator</label>
                  
                </div>

                <button type="submit" name="submitEvent" class="sign-btn">POST</button>

            
              </div>
            </form>
            

            <form action="" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="" alt="easyclass" />
                <h4>easyclass</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/logos.png" class="image img-1 show" alt="" />
              <img src="./img/pawlog.jpg" class="image img-2" alt="" />
              <img src="./img/medlogo.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>














   

  
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