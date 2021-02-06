<?php
ob_start();
include('config/constants.php');

?>


<?php


  if(isset($_POST["submit"])){
  	if(isset($_SESSION["cart"])){

  		$item_array_id = array_column($_SESSION["cart"], "p_id");

  		if(!in_array($_GET["id"], $item_array_id)){
  			$cnt = count($_SESSION["cart"]);
  			$item_array = array(
  				'p_id' => $_GET["id"],
	  			'p_title' => $_POST["hidden_title"],
	  			'p_price' => $_POST["hidden_price"],
	  			'p_qty' => $_POST["qty"],
	  		);
	  		$_SESSION["cart"][$cnt] = $item_array;
	  		echo '<script>window.location="online-order.php"</script>';
  		}else{
  			echo '<script>alert("Product is already Added to Cart")</script>';
        echo '<script>window.location="online-order.php"</script>';
  		}

  	}else{
  		$item_array = array(
  			'p_id' => $_GET["id"],
  			'p_title' => $_POST["hidden_title"],
  			'p_price' => $_POST["hidden_price"],
  			'p_qty' => $_POST["qty"], 

  		);
  		$_SESSION["cart"][0] = $item_array;
  		header('location:'.SITEURL.'online-order.php');
  	}
  }

  if(isset($_GET["action"])){
  	if($_GET["action"] == "delete"){
  		foreach ($_SESSION["cart"] as $keys => $value) {
  			if($value["p_id"] == $_GET["id"]){
  				unset($_SESSION["cart"][$keys]);
  				echo '<script>alert("Product has been Removed...!")</script>';
          echo '<script>window.location="online-order.php"</script>';
  			}
  		}
  	}
  }

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

		<div class="container">
			<!-- Start for showing food -->

			<h2>Order Now</h2>

			<div class="food-category">




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
										<h3 style="text-align: left"><?php echo $category_title; ?></h3>
									</div>
								<?php

								$sql2 = "SELECT * from tbl_food WHERE category_id = '$category_id' AND active = 'Yes' ";
								$res2 = mysqli_query($conn,$sql2);

								if($res2 == true){
									$row_cnt2 = mysqli_num_rows($res2);
									if($row_cnt2 > 0){
										?>
										<div class="row text-right mb-3">
										<?php
										while($row2 = mysqli_fetch_assoc($res2)){
											$food_title = $row2['title'];
											$food_price = $row2['price'];
											$image_name = $row2['image_name'];

											?>
											<div class="col-lg-3">
												<form method="POST" action="online-order.php?action=submit&id=<?php echo $row2["id"]; ?>">
													<div class="product">
														<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" style = "width: 100%">
														<h4><?php echo $food_title; ?></h4>
														<h4><?php echo $food_price; ?></h4>
														<input type="text" name="qty" class="form-control" value="1">
														<input type="hidden" name="hidden_title" value="<?php echo $food_title; ?>">
							              <input type="hidden" name="hidden_price" value="<?php echo $food_price; ?>">
														<input type="submit" name="submit" class="btn btn-success" value="Add to Cart">
													</div>
												</form>
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

			</div>


			<!-- end for showing food -->

			<!-- Start for showing cart -->

			<br><br><br>
			<h2>Your Cart</h2>

			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
	          <th width="30%">Product Name</th>
	          <th width="10%">Quantity</th>
	          <th width="13%">Price Details</th>
	          <th width="10%">Total Price</th>
	          <th width="17%">Remove Item</th>
	        </tr>


	        <?php
	        	$total_value = 0;
	        	if(!empty($_SESSION["cart"])){
	        		foreach ($_SESSION["cart"] as $key => $value){
	        			$total_value += ($value["p_qty"]*$value["p_price"]);
	        			?>
	        			<tr>
				      		<td><?php echo $value["p_title"]; ?></td>
				      		<td><?php echo $value["p_qty"]; ?></td>
				      		<td><?php echo $value["p_price"]; ?></td>
				      		<td><?php echo $value["p_qty"]*$value["p_price"]; ?></td>
				      		<!-- <td> <span class="text-danger">Remove Item</span> </td> -->
				      		<td>
				      			<a href="online-order.php?action=delete&id=<?php echo $value["p_id"]; ?>">
				      				<span class="text-danger">Remove Item</span>
				      			</a>
				      		</td>

				        </tr>
				        <?php
	        		}
	        	}

	        ?>

	        <tr>
	        	<td colspan="3" align="right">Total</td>
	        	<th align="right"><?php echo $total_value; ?></th>
	        	<td></td>
	        </tr>

				</table>
			</div>

			<form method="POST" action="">
				<input type="submit" name="place-order" class="btn btn-success btn1" value="Place Order">
			</form>

			<!-- end for showing cart -->
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
	
	if(isset($_POST['place-order'])){
		$customer_id = $_SESSION['user_id'];
		if($_SESSION['user_id'] == 0){
			header('location:'.SITEURL.'login.php');
			die();
		}
		$order_date = date("Y-m-d h:i:sa");
		$total_amount = $total_value;
		$order_status = "Ordered";

		$sql3 = " INSERT INTO tbl_order SET 
			customer_id = '$customer_id',
			order_date = '$order_date',
			total_amount = '$total_amount',
			order_status = '$order_status'
		";
		$res3 = mysqli_query($conn,$sql3);

		if($res3 == true){

		 	$order_id = $conn->insert_id;

		 	foreach ($_SESSION["cart"] as $key => $value){
				$food_id = $value['p_id'];
				$qty = $value['p_qty'];
				$total = $value['p_price'] * $value['p_qty'];

				echo $order_id ." " . $food_id . " " ;

				$sql4 = " INSERT INTO tbl_orderdetails SET 
					order_id = '$order_id',
					food_id = '$food_id',
					qty = '$qty',
					total = '$total'
				";

				$res4 = mysqli_query($conn,$sql4);

			}
			
			$_SESSION['order'] = "Food Order Successfully";
			unset($_SESSION['cart']);
      header('location:'.SITEURL.'profile.php');
      ob_end_flush();
		}
	}

?>