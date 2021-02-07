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

		<?php

			if(isset($_GET['id'])){
				$id=$_GET['id'];
			}

		?>

		
		<div class="container">

			<h1 class="heading_text">Active Order</h1>

			<table class="table table-secondary table-striped table-bordered table-hover">
				
					<?php

						$sql = "SELECT * FROM tbl_order WHERE customer_id='$id' AND (order_status='On Delevery' OR order_status = 'Ordered') ";

        		$res = mysqli_query($conn, $sql);

        		if($res == true){
        			$cnt = mysqli_num_rows($res);

        			if($cnt == 0){
        				?>
        				<h5 class="heading_text-1"><?php echo "You Have No Active Order"; ?></h5>
        				<?php
        				
        			}else{
        				?>
        				<thead>
									<tr>
										<th width="50%">Food description</th>
										<th width="15%">Date</th>
										<th width="15%">Price</th>
										<th width="20%">Status</th>
									</tr>
								</thead>
								<?php
        			}
        			
        			while($row=mysqli_fetch_assoc($res) AND $cnt > 0){
        				$order_id = $row['id'];
        				$order_date = $row['order_date'];
        				$order_status = $row['order_status'];
        				$total_amount = $row['total_amount'];

        				$sql2 = " SELECT * FROM tbl_orderdetails WHERE order_id = '$order_id' ";
        				$res2 = mysqli_query($conn,$sql2);
        				if($res2 == true){

        					?>

        					<tr>
        						<td>

        							<?php
        							while($row2=mysqli_fetch_assoc($res2)){
		        						$food_id = $row2['food_id'];
		        						$qty = $row2['qty'];
		        						
		        						$sql3 = " SELECT * FROM tbl_food WHERE id = '$food_id' ";
		        						$res3 = mysqli_query($conn,$sql3);

		        						
		  									while($row3=mysqli_fetch_assoc($res3)){
		  										echo $qty."*".$row3['title'].", ";
		  									}
		        						
		        					}
		        					?>

        							
        						</td>
        						<td><?php echo $order_date; ?></td>
        						<td><?php echo $total_amount; ?></td>
        						<td><?php echo $order_status; ?></td>
        					</tr>
        					<?php
        				}
        			}
        		}
        	?>

				<tbody>
					
				</tbody>
			</table>

			<br><br><br>
			<h1 class="heading_text">Active Reservation</h1>

			<table class="table table-secondary table-striped table-bordered table-hover">
					<?php

						$sql4 = "SELECT * FROM reservation WHERE customer_id=$id AND (status='Pending' OR status = 'Accepted') ";

        		$res4 = mysqli_query($conn, $sql4);


        		if($res4 == true){
        			$cnt4 = mysqli_num_rows($res4);
        			if($cnt4 == 0){
        				?>
        					<h5 class="heading_text-1"><?php echo "You Have Not Active Reservation Order"; ?></h5>
        				<?php
        				
        			}else{
        				?>
        				<thead>
									<tr>
										<th width="30%">Guest No</th>
										<th width="30%">Date</th>
										<th width="20%">Time</th>
										<th width="20%">Status</th>
									</tr>
								</thead>
								<tbody>
								<?php

        				while($row4 = mysqli_fetch_assoc($res4)){
        					?>
        					<tr>
										<td><?php echo $row4['guest']; ?></td>
										<td><?php echo $row4['re_date']; ?></td>
										<td><?php echo $row4['re_time']; ?></td>
										<td><?php echo $row4['status']; ?></td>
									</tr>
									<?php
        				}
        			}
        		}

					?>
					
				</tbody>
			</table>


			<br><br><br>
			<h1 class="heading_text">Past Order</h1>

			<table class="table table-secondary table-striped table-bordered table-hover">
					

					<?php

						$sql = "SELECT * FROM tbl_order WHERE customer_id='$id' AND order_status='Delivered'";

        		$res = mysqli_query($conn, $sql);

        		if($res == true){
        			$cnt = mysqli_num_rows($res);
        			
        			if($cnt == 0){
        				?>
        					<h5 class="heading_text-1"><?php echo "You Don't Order Yet"; ?></h5>
        				<?php
        				
        			}else{
        				?>
        				<thead>
									<tr>
										<th width="50%">Food description</th>
										<th width="15%">Date</th>
										<th width="15%">Price</th>
										<th width="20%">Status</th>
									</tr>
								</thead>
								<?php
        			}

        			while($row=mysqli_fetch_assoc($res) AND $cnt > 0){
        				$order_id = $row['id'];
        				$order_date = $row['order_date'];
        				$order_status = $row['order_status'];
        				$total_amount = $row['total_amount'];

        				$sql2 = " SELECT * FROM tbl_orderdetails WHERE order_id = '$order_id' ";
        				$res2 = mysqli_query($conn,$sql2);
        				if($res2 == true){

        					?>

        					<tr>
        						<td>

        							<?php
        							while($row2=mysqli_fetch_assoc($res2)){
		        						$food_id = $row2['food_id'];
		        						$qty = $row2['qty'];
		        						
		        						$sql3 = " SELECT * FROM tbl_food WHERE id = '$food_id' ";
		        						$res3 = mysqli_query($conn,$sql3);

		        						
		  									while($row3=mysqli_fetch_assoc($res3)){
		  										echo $qty."*".$row3['title'].", ";
		  									}
		        						
		        					}
		        					?>

        							
        						</td>
        						<td><?php echo $order_date; ?></td>
        						<td><?php echo $total_amount; ?></td>
        						<td><?php echo $order_status; ?></td>
        					</tr>
        					<?php
        				}
        			}
        		}
        	?>



				<tbody>
					
				</tbody>
			</table>
			</table>


			<br><br><br>
			<h1 class="heading_text">Past Reservation</h1>

			<table class="table table-secondary table-striped table-bordered table-hover">
				<?php

						$sql4 = "SELECT * FROM reservation WHERE customer_id='$id' AND status = 'Delivered' ";

        		$res4 = mysqli_query($conn, $sql4);

        		if($res4 == true){
        			$cnt4 = mysqli_num_rows($res4);
        			if($cnt4 == 0){
        				?>
        					<h5 class="heading_text-1"><?php echo "You Don't Order For Reservation Yet"; ?></h5>
        				<?php
        				
        			}else{
        				?>
        				<thead>
									<tr>
										<th width="30%">Guest No</th>
										<th width="30%">Date</th>
										<th width="20%">Time</th>
										<th width="20%">Status</th>
									</tr>
								</thead>
								<tbody>
								<?php

        				while($row4 = mysqli_fetch_assoc($res4)){
        					?>
        					<tr>
										<td><?php echo $row4['guest']; ?></td>
										<td><?php echo $row4['re_date']; ?></td>
										<td><?php echo $row4['re_time']; ?></td>
										<td><?php echo $row4['status']; ?></td>
									</tr>
									<?php
        				}
        			}
        		}

					?>
					
				</tbody>
			</table>
			
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
