<!DOCTYPE html>
<html>

<head>

<link rel="icon" href="logos.png">
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>




	<img class="wave" src="waves.png">
	<div class="container">	
		<div class="img">
			<img src="logos.png">
		</div>
		<div class="login-content">

		<?php 
		if(isset($_SESSION['status']))
		{
			?>
			<div class="alert alert success">
				<h5><?= $_SESSION;['status'] ?> </h5>
		</div>
		<?php
			unset($_SESSION['status']);
		}
		?>

        <form action="password-reset-code.php" method="post">
		<div class="card">
    <div class="card-header">
    Reset Password
     </div>
     <div class="card-body">
        <label> Email Address</label>
        <input type ="text" name="email" class="form-control" placeholder="Enter your Email Address">
    <br>
    <button type="submit" name="password-reset-link" class="btn btn-primary">Send Password Reset Link</a>
 
  </div>
</div>
        </div>
</form>
    </div>
	
    <script type="text/javascript" src="main.js"></script>
</body>
</html>