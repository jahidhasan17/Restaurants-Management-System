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
			          <a class="nav-link text-center" href="#">About Us</a>
			        </li>
			        <?php
			        	if(isset($_SESSION['username'])){
			        		?>
			        			<li class="nav-item">
						          <a class="nav-link text-center" href="profile.php"><?php echo $_SESSION['username']; ?></a>
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

		<section class="container">
			
			<div class="text-red text-center">
				<h1>Menu Card</h1>
			</div>

		</section>

		<section class="container">
			<div>

				<?php

					$sql = "SELECT * from tbl_category WHERE active = 'Yes'";
					$res = mysqli_query($conn,$sql);

					if($res == true){
						$row_cnt = mysqli_num_rows($res);

						if($row_cnt > 0){

							while($row = mysqli_fetch_assoc($res)){
								$category_title = $row['title'];
								$category_id = $row['id'];
								?>
									<div>
										<h3><?php echo $category_title; ?></h3>
									</div>
								<?php

								$sql2 = "SELECT * from tbl_food WHERE category_id = '$category_id' AND active = 'Yes' ";
								$res2 = mysqli_query($conn,$sql2);

								if($res2 == true){
									$row_cnt2 = mysqli_num_rows($res2);
									if($row_cnt2 > 0){
										?>
										<div class="row text-center mb-3">
										<?php
										while($row2 = mysqli_fetch_assoc($res2)){
											$food_title = $row2['title'];
											$food_price = $row2['price'];
											$image_name = $row2['image_name'];

											?>

													<div class="col-lg-3">
														<div class="card mb-5 m-lg-0">
															<?php

																if($image_name != ""){
																	?>
																	<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" style = "width: 100%">
																	<?php
																}else{
																	echo "Image Not Added";
																}

															?>
															<div class="card-body">
																<h5 class="card-title"><?php echo $food_title; ?></h4>
																<p class="food-price"><?php echo $food_price; ?></p>
															</div>	
														</div>
													</div>

											<?php
										}

									}else{
										?>
										<div>
											<h3>Food Not Found</h3>
										</div>
										<?php
									}
								}
								?> </div><br><br> <?php
							}

						}else{
							?>
								<div>
									<h3>No Category Found</h3>
								</div>
							<?php
						}
					}

				?>
				

		</section>

		<footer>
			
		</footer>

	</div>
	

	<!-- -----------------------------------------------------  -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>