<?php require_once "./userSide/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
	if (isset($_SESSION['email'])){
  // header("Location: main.php");
	}
  elseif(isset($_SESSION['email_admin'])){
    header("Location: adminLog.php");
  }
  if (isset($_SESSION['emailadmin'])){
    header("Location: mainDashboard.php");
    }
  ?>   
  
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
  <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    
    <link rel="stylesheet" href="./userSide/styless.css" />
    
    <link rel="icon" href="logos.png">
    
    <title>JCOSK member Identification</title>
</head>
<body>



<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  
      <div class="modal-body">
      <button type="button" onclick="main()" class="btn_main"><img src="main.png" class="pic_admin"/></button>
      <button type="button" onclick="dashboard()" class="btn_dashboard"><img src="Admin-icon.png" class="pic_admin"/></button>     
      <button type="button"   onclick="home()"class="btn_home"><img src="logos.png" class="pic_admins"/></button>
     <div class="subtitle">
      <a href="#" class="main"> Main </a>
      <a href="#" class="dash"> Admin </a>
      <a href="#" class="home"> Home</a>
      </div>
      </div>
    </div>
  </div>
</div> -->



<div class="container">

      <div class="forms-container">
       
        <div class="signin-signup">
        <!-- <button onclick="trylangto()">Print</button>
        <div id="arraylangtoDIV" style="display:none;"></div> -->
<!-- Button trigger modal -->
 <!-- <button hidden type="button" class="btn btn-primary" id="homeID" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>    -->
  
          <form action="index.php" class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
 
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
 
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
            </div>

   
           
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input  type="password" name="password" placeholder="Password" required>
            </div>
            <div class="link forget-pass text-left"><a href="./userSide/forgot-password.php" class="forgot">Forgot password?</a></div>

            <input type="submit" name="login" value="Login" id="btnSolid" class="btn solid" />
            <p class="social-text">Or Sign in as Guest</p>
            <div class="social-media">
        
              <a href="./userSide/reg-Guest.php" class="social-icon">
                <i class="fas fa-arrow-right"></i>
              </a>   
            </div>
            
            <!-- <a href="#" class="social-icon"> 
              <i class="fas fa-user"></i>
                  </a> -->
          </form>
<!-- <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <h2 class="title">Sign in</h2>
                <form action="login-user.php" method="POST" autocomplete="">
                    ?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            ?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        ?php
                    }
                    ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input class="form-control" type="email" name="email" placeholder="Email Address" required value="?php echo $email ?>">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input class="form-control" type="password" name="password" placeholder="Password" required>
            </div>

            <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
            <input type="submit" name="login" value="Login" class="btn solid" />
    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div> 
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div> -->
            
                </form>
             <form action="index.php" class="sign-up-form" method="post" enctype="multipart/form-data">
            <h2 class="title">Sign up</h2>

            <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                 
            <div class="input-field">
              <i class="fas fa-image"></i>
              <input type="file" name="pic" placeholder="Image" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username"  name="username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input  type="email" name="email" placeholder="Email Address"  value="<?php echo $email ?>" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required >
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input  type="password" name="cpassword" placeholder="Confirm password" required >
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Full Name" value="<?php echo $name ?>" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-home"></i>
              <input type="text" name="address" placeholder="Address" required />
            </div>
            <div class="input-field">
              <i class="fas fa-mobile"></i>
              <input type="text" name="contact" placeholder="Contact" required  />
            </div>
        
       
              <p>Date of Registration</p>
            <div class="input-field">
              <i class="fas fa-calendar"></i>
              <input type="date" name="date" placeholder="Date of register" required />
            </div>
            <input  type="submit" name="signup" class="btn" value="Signup">
            
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Just click Sign up if you want to be registered, Thank you!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
         <img src="./userSide/images (1).png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              If you are already one of us, just click Sign in, Thank you!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
        <img src="./userSide/images (1).png" class="image"   alt="" />
        </div>
      </div>
    </div>
  
    <script src="./userSide/app.js"></script>

  
<!-- ?php
if(isset($_SESSION['forPastor']))
{
  if ($_SESSION['forPastor'] == 'true')
  {

    ?>
    <script>
      document.querySelector('#homeID').click();
      </script>
 ?php
  }
}
?> -->
    <!-- <script>
    // $(document).ready(function () { }); 
  $('.btn solid').on('click', function() 
  {
    
    $('#exampleModal').modal('show');

});   </script> -->
<!-- <script type="text/javascript">
  function main(){
    window.location.href=""
  }
  function dashboard(){
    window.location.href="../adminLog.php"
  }
  function home(){
    window.location.href="./main.php" 
 
  }
  </script> -->
   <!-- <script type="text/javascript">
     function trylangto(){
      $('#arraylangtoDIV').load('arrayto.php',{}
      ,function (response,status,xhr){
        console.log(response);
        // $('#calendar').evoCalendar({
        // theme: "Royal Navy",
        // calendarEvents: $.parseJSON(response)
        // })
      })
     }
   </script> -->
</body>
</html>