<?php

include('../config/constants.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>This is my web Site</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body>

	
	<div class="add-admin-bg">


		<div class="container">

				<h1 class="heading_text">Login</h1>
				<br><br>


				<?php

				if(isset($_SESSION['login'])){
					?>
					<h6 class="heading_text"><?php echo $_SESSION['login']; ?></h6>
					<?php
					unset($_SESSION['login']);
				}

				if(isset($_SESSION['no-login-message'])){
					?>
					<h6 class="heading_text"><?php echo $_SESSION['no-login-message']; ?></h6>
					<?php
					unset($_SESSION['no-login-message']);
				}

				?>

		
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-5">

							<form action="" method="POST" class="form-container">

							  <div class="form-group">
							    <label>User Name</label>
							    <input type="text" class="form-control" name="username" placeholder="Enter Your User Name..">
							  </div>

							  <br>
							  <div class="form-group">
							    <label >Password</label>
							    <input type="password" class="form-control" name="password" placeholder="Enter Your Password..">
							  </div>

							  <br>
							  <input type="submit" name="submit" value="Login" class="btn-primary btn-lg btn-block" style="width: 100%">

							</form>
						</div>
					</div>

		</div>

	</div>

		<footer>

		</footer>

	</div>
	

	<!-- -----------------------------------------------------  -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>


<?php

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];


		$sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' ";
		$res = mysqli_query($conn,$sql);

		$cnt = mysqli_num_rows($res);

		if($cnt == 1){
			$_SESSION['login'] = "<div class = 'success'> Login Successful.</div>";

			$_SESSION['user'] = $username;

			header('location:'.SITEURL.'admin/');
		}else{
			$_SESSION['login'] = "<div class = 'error text-center'> Username or Password did not match</div>";
			header('location:'.SITEURL.'admin/login.php');
		}

	}

?>