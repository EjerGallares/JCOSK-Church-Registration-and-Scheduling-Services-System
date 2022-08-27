<!DOCTYPE html>
<html>

<head>
	<?php
	session_start();
	if (isset($_SESSION['user_name'])){
   header("Location: dashboard.php");
	}
  if(isset($_SESSION['email_admin'])){
  }else{
    header("Location: index.php");
  }
  ?>
<link rel="icon" href="logos.png">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<!-- Modal -->
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
<form action="reg.php" method="POST" enctype="multipart/form-data"> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

				<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Picture:</label>
    <div class="col-sm-10">
      <input type="file" name="img_admin" class="form-control" id="inputImage" >
    </div>
  </div>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Firstname:</label>
    <div class="col-sm-10">
	<input type="text" name="fname" class="form-control" id="inputText" >
    </div>
  </div>

  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Lastname:</label>
    <div class="col-sm-10">
	<input type="text" name="lname" class="form-control" id="inputText" >
    </div>
  </div>

  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Address:</label>
    <div class="col-sm-10">
	<input type="text" name="address" class="form-control" id="inputText" >
    </div>
  </div>

  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Contact:</label>
    <div class="col-sm-10">
	<input type="text" name="contact" class="form-control" id="inputText" >
    </div>
  </div>

	  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Username:</label>
    <div class="col-sm-10">
	<input type="text" name="userName" class="form-control" id="inputText" >
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
    <div class="col-sm-10">
      <input type="password" name="passWord" class="form-control" id="inputPassword" >
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" name="adminEmail" class="form-control" id="inputEmail" >
    </div>
  </div>
  
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Created date:</label>
    <div class="col-sm-10">
      <input type="date" name="adminDate" class="form-control" id="inputDate" >
    </div>
  </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btnCan" data-bs-dismiss="modal">CLOSE</button>
        <button type="submit" name="register" class="btnReg">REGISTER</button>	
	</div>
    </div>
  </div>
</div>
</form>
<!-- end of modal -->
 
	<img class="wave" src="waves.png">
	<div class="container">	
		<div class="img">
			<img src="logos.png">
		</div>
		<div class="login-content">
			<form action="login.php" method="post" >
                <?php if (isset ($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php  } ?>
				<img src="adminicon.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="uname"  class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password"  class="input">
            	   </div>
            	</div>
            	<a href="#exampleModal" data-bs-toggle="modal" data-backdrop="static" data-keyboard="false" data-bs-target="#exampleModal" class="regText">Register an Account?</a>
				<a href="password-reset.php" class="forgotText">Forgot Your Password?</a>
            	<button type="submit" class="bts">Login</button>
            
            </form> 
        </div>
    </div>
	
    <script type="text/javascript" src="main.js"></script>
</body>
</html>