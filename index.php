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
		
		<header class="header-1">


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
			          <a class="nav-link text-center" href="table-reservation.php">Reservation</a>
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
			          <a class="nav-link text-center" href="about.php">About Us</a>
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

			<section id="banner">
				<div class="banner-container d-flex justify-content-center align-items-center">
					<div class="banner-contents text-center">
						<h1>“…the best Bangali food I’ve ever had”</h1>
					</div>
				</div>
			</section>

			
		</header>

		<main>

			<section class="categories">
				<div class="container">
					<div>
						<h1 class="text-center">Our Menu</h1>
					</div>

					<a href="">
						<div class="box">
							<img src="images/img-1.jpg">
							<div class="des">Burger</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="images/img-2.jpg">
							<div class="des">Burger</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="images/img-3.jpg">
							<div class="des">Burger</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="images/img-4.jpg">
							<div class="des">Burger</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="images/img-3.jpg">
							<div class="des">Burger</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="images/img-4.jpg">
							<div class="des">Burger</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="images/img-3.jpg">
							<div class="des">Burger</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="images/img-4.jpg">
							<div class="des">Burger</div>
						</div>
					</a>
					<div class="clearfix"></div>
				</div>
			</section>

			<section class="gallery">
				<div class="container">
					<div>
						<h1 class="text-center">Our Gallery</h1>
					</div>

					<div class="box-3">
						<img src="images/img-1.jpg">
					</div>

					<div class="box-3">
						<img src="images/img-2.jpg">
					</div>

					<div class="box-3">
						<img src="images/img-3.jpg">
					</div>

					<div class="box-3">
						<img src="images/img-4.jpg">
					</div>

					<div class="box-3">
						<img src="images/img-4.jpg">
					</div>

					<div class="box-3">
						<img src="images/img-4.jpg">
					</div>

					</div>
			</section>
			
		</main>

		<footer>
			
		</footer>

	</div>
	

	<!-- -----------------------------------------------------  -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  <script>
	window.onscroll = function() {myFunction()};

	var navbar = document.getElementById("navbar");
	var sticky = navbar.offsetTop;

	function myFunction() {
	  if (window.pageYOffset >= sticky) {
	    navbar.classList.add("sticky")
	  } else {
	    navbar.classList.remove("sticky");
	  }
	}
	</script>

</body>
</html>