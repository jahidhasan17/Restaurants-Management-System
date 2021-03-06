<?php
include('config/constants.php');

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>This is my web Site</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<div>
		
		<header>
			<nav class="navbar navbar-expand-md">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#">
			    	<img src="images/logo.jpg" class="logo-image">
			    </a>
			    
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav m-auto">
			        <li class="nav-item active">
			          <a class="nav-link text-center" href="index.php">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="menu.php">Menu</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="#">Reservation</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="online-order.php">Order Online</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="#">Gallery</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="#">Contact Us</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="#">About Us</a>
			        </li>
			        <?php
			        	if(isset($_SESSION['username'])){
			        		$user_id = $_SESSION['user_id'];
			        		?>
			        			<li class="nav-item">
						          <a class="nav-link text-center" href="<?php echo SITEURL;?>profile.php?id=<?php echo $user_id;?>"><?php echo $_SESSION['username']; ?></a>
						        </li>
			        		<?php
			        	}
			        ?>
			        <?php
			        	if(isset($_SESSION['username'])){
			        		?>
			        			<li class="nav-item">
						          <a class="nav-link text-center" href="logout.php">Logout</a>
						        </li>
			        		<?php
			        	}else{
			        		?>
			        			<li class="nav-item">
						          <a class="nav-link text-center" href="login.php">Signin</a>
						        </li>
			        		<?php
			        	}
			        ?>
			      </ul>
			    </div>
			  </div>
			</nav>
			
		</header>

		
		<div class="container">

			<h1 class="heading_text">BOOK A TABLE</h1>
			<br><br>
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-lg-8">

						<form action="" method="POST" class="form-container">

						  <div class="form-group">
						    <label >No of guest</label>
						    <input type="number" class="form-control" name="guest" placeholder="How many guest.." required>
						  </div>
						  <br>

						  <div class="form-group">
						    <label >Date</label>
						    <input type="date" class="form-control" name="date" required>
						  </div>
						  <br>

						  <div class="form-group">
						    <label >Time</label>
						    <input type="time" class="form-control" name="time" required>
						  </div>
						  <br><br>

						  <div class="form-group">
						    <label>Suggestions <small><b>(E.g No of Plates, How you want the setup to be)</b></small></label>
						    <textarea name="suggestions" placeholder="your suggestions" cols="62" rows="5"></textarea>
						  </div>

						  <br>
						  <input type="submit" name="submit" value="MAKE YOUR BOOKING" class="btn-primary btn-lg btn-block" style="width: 100%">

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
		$customer_id = $_SESSION['user_id'];
		$guest = $_POST['guest'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$suggestions = $_POST['suggestions'];
		$status = "pending";

		$sql = " INSERT INTO reservation SET
				customer_id = '$customer_id',
				re_date = '$date',
				re_time = '$time',
				guest = '$guest',
				suggestions = '$suggestions',
				status = '$status'
		 ";

		 $res = mysqli_query($conn,$sql) or die(mysqli_error());

		 if($res == true){
		 	//$_SESSION['add'] = "Admin Added Sucessfully";
			//header("location:".SITEURL.'admin/manage-admin.php');
		 }
	}

?>