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
			
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-6">

							<?php
								$id = $_GET['id'];
								$sql = "SELECT * FROM tbl_admin WHERE id = $id";
								$res = mysqli_query($conn,$sql);

								if($res == true){
									$cnt = mysqli_num_rows($res);
									if($cnt == 1){
										$row = mysqli_fetch_assoc($res);
										$full_name = $row['full_name'];
										$username = $row['username'];
									}else{
										header('location:'.SITEURL.'admin/manage-admin.php');
									}
								}
							?>

							<form action="" method="POST" class="form-container">

							  <div class="form-group">
							    <label >Full Name</label>
									<input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
							  </div>

							  <div class="form-group">
							    <label >User Name</label>
							    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
							  </div>

							  <div class="form-group">
							    <label >Current Password</label>
							    <input type="password" class="form-control" name="current_password" placeholder="Enter Your Current Password..">
							  </div>

							  <div class="form-group">
							    <label >New Password</label>
							    <input type="password" class="form-control" name="new_password" placeholder="Enter New Password..">
							  </div>

							  <div class="form-group">
							    <label >Confirm Password</label>
							    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password..">
							  </div>

							  <br>
							  <input type="hidden" name="id" value="<?php echo $id; ?>">
							  <input type="submit" name="submit" value="Update" class="btn-primary btn-lg btn-block" style="width: 100%">

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
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$current_password = $_POST['current_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];

		$sql = "SELECT * FROM tbl_admin WHERE id = '$id' AND password = '$current_password'";
		$res = mysqli_query($conn,$sql);


		if($res == true){
			$cnt = mysqli_num_rows($res);

			if($cnt == 1){
				if($new_password == $confirm_password){
					$sql2 = "UPDATE tbl_admin SET full_name = '$full_name',username = '$username',password = '$new_password' WHERE id = '$id'";
					$res2 = mysqli_query($conn,$sql2);

					if($res2 == true){
						$_SESSION['cng_pwd'] = "<div class = 'success'>Password Changed</div> ";
							header('location:'.SITEURL.'admin/manage-admin.php');
					}
				}else{
					$_SESSION['pwd_not_match'] = "<div class = 'error'>Password Not Match</div> ";
					header('location:'.SITEURL.'admin/manage-admin.php');
				}
			}else{
				$_SESSION['user_not_found'] = "<div class = 'error'>User Not Found.</div> ";
				header('location:'.SITEURL.'admin/manage-admin.php');
			}
		}
	}

?>