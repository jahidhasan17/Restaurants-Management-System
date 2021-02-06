<?php

ob_start();

include('../config/constants.php');
include('partials/login-check.php');

?>

<?php 

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql2 = " SELECT * FROM tbl_food WHERE id=$id ";
		$res2 = mysqli_query($conn,$sql2);
		$cnt2 = mysqli_num_rows($res2);

		$row2 = mysqli_fetch_assoc($res2);
		$title = $row2['title'];
		$price = $row2['price'];
		$current_image = $row2['image_name'];
		$current_category = $row2['category_id'];
		$active = $row2['active'];

	}else{
		header('location:'.SITEURL.'admin/manage-food.php');
	}

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

							<form action="" method="POST" class="form-container" enctype="multipart/form-data">

							  <div class="form-group">
							    <label >Title</label>
									<input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
							  </div>

							  <div class="form-group">
							    <label >Price</label>
									<input type="number" class="form-control" name="price" value="<?php echo $price; ?>">
								</div>

							  <div class="form-group">
							    <label >Current Image</label>
							    <?php

							    	if($current_image != ""){
							    		?>
							    			<img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" style = "width: 150px">
							    		<?php
							    	}else{
							    		echo "Image Not Added";
							    	}

							    ?>
							  </div>

							  <div class="form-group">
							    <label >New Image</label>
							    <input type="file" class="form-control" name="image">
							  </div>

							  <div  class="form-group">
							  	<label >Category</label>
							  	<select name="category">

										<?php

											$sql = " SELECT * FROM tbl_category WHERE active='Yes' ";
											$res = mysqli_query($conn,$sql);
											$cnt = mysqli_num_rows($res);

											if($cnt > 0){
												while($row = mysqli_fetch_assoc($res)){
													$category_title = $row['title'];
													$category_id = $row['id'];
													?>

													<option <?php if($current_category == $category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

													<?php
												}
											}else{
												echo "<option value = '0'>Category Not Available</option>";
											}

										?>
									</select>
							  </div>

							  <div class="form-group">
							  	<br>
							    <label >Active </label>
							    <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
							    <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No">No
							  </div>

							  <br>
							  <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
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
		$title = $_POST['title'];
		$price = $_POST['price'];
		$current_image = $_POST['current_image'];
		$category = $_POST['category'];
		$active = $_POST['active'];


		if(isset($_FILES['image']['name'])){
			$image_name = $_FILES['image']['name'];

			if($image_name != ""){
				$source_path = $_FILES['image']['tmp_name'];
				$destination_path = "../images/food/".$image_name;

				$upload = move_uploaded_file($source_path,$destination_path);


			}else{
				$image_name = $current_image;
			}
		}else{
			$image_name = $current_image;
		}


		$sql3 = " UPDATE tbl_food SET
			title = '$title',
			price = $price,
			image_name = '$image_name',
			category_id = $category,
			active = '$active'
			WHERE id = '$id'
		 ";

		 $res3 = mysqli_query($conn,$sql3);


		 if($res3 == true){
		 	$_SESSION['update'] = "Food Updated Successfully";
		 	header('location:'.SITEURL.'admin/manage-food.php');
		 	ob_end_flush();
		 }
	}

?>