<?php

include('../config/constants.php');
include('partials/login-check.php');

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
		
		<header>
			<nav class="navbar navbar-expand-md">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#">
			    	<img src="../images/logo.jpg" class="logo-image">
			    </a>
			    
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav m-auto">
			        <li class="nav-item active">
			          <a class="nav-link text-center" href="index.php">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="manage-admin.php">Admin</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="manage-category.php">Category</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="manage-food.php">Food</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="manage-order.php">Order</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="#">Reservation</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="logout.php">Logout</a>
			        </li>
			      </ul>
			    </div>
			  </div>
			</nav> 
			
		</header>


		<div class="container">
			
			<h1 class="heading_text">Add Admin</h1>
				<br><br>
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-6">

							<form action="" method="POST" class="form-container">

							  <div class="form-group">
							    <label >Full Name</label>
							    <input type="text" class="form-control" name="full_name" placeholder="Enter Your Name..">
							  </div>

							  <div class="form-group">
							    <label >User Name</label>
							    <input type="text" class="form-control" name="username" placeholder="Enter Your User Name..">
							  </div>

							  <div class="form-group">
							    <label >Password</label>
							    <input type="password" class="form-control" name="password" placeholder="Enter Your Password..">
							  </div>

							  <br>
							  <input type="submit" name="submit" value="Add Admin" class="btn-primary btn-lg btn-block" style="width: 100%">

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
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];


		$sql = " INSERT INTO tbl_admin SET

			full_name = '$full_name',
			username = '$username',
			password = '$password'
		 ";

		 $res = mysqli_query($conn,$sql) or die(mysqli_error());

		 if($res == true){
		 	$_SESSION['add'] = "Admin Added Sucessfully";
			header("location:".SITEURL.'admin/manage-admin.php');
		 }
	}

?>