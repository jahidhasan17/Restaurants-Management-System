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
								$sql = "SELECT * FROM tbl_category WHERE id = $id";
								$res = mysqli_query($conn,$sql);

								if($res == true){
									$cnt = mysqli_num_rows($res);
									if($cnt == 1){
										$row = mysqli_fetch_assoc($res);
										$title = $row['title'];
										$current_image = $row['image_name'];
										$active = $row['active'];
									}else{
										header('location:'.SITEURL.'admin/manage-category.php');
									}
								}
							?>

							<form action="" method="POST" class="form-container" enctype="multipart/form-data">

							  <div class="form-group">
							    <label >Title</label>
									<input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
							  </div>

							  <div class="form-group">
							    <label >Current Image</label>
							    <?php

							    	if($current_image != ""){
							    		?>
							    			<img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" style = "width: 150px">
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
		$current_image = $_POST['current_image'];
		$active = $_POST['active'];


		if(isset($_FILES['image']['name'])){
			$image_name = $_FILES['image']['name'];

			if($image_name != ""){
				$source_path = $_FILES['image']['tmp_name'];
				$destination_path = "../images/category/".$image_name;

				$upload = move_uploaded_file($source_path,$destination_path);

				if($upload == false){
					$_SESSION['upload'] = "<div class = 'error'> Failed to Upload Image</div>";
					header('location:'.SITEURL.'admin/manage-category.php');
					die();
				}

			}else{
				$image_name = $current_image;
			}
		}else{
			$image_name = $current_image;
		}


		$sql2 = " UPDATE tbl_category SET
			title = '$title',
			image_name = '$image_name',
			active = '$active'
			WHERE id = '$id'
		 ";

		 $res2 = mysqli_query($conn,$sql2);

		 if($res2 == true){
		 	$_SESSION['update'] = "<div class = 'success'>Category Updated Successfully</div>";
		 	header('location:'.SITEURL.'admin/manage-category.php');
		 }else{
		 	$_SESSION['update'] = "<div class = 'error'>Failed to Update Category.</div>";
		 	header('location:'.SITEURL.'admin/manage-category.php');
		 }
		

	}

?>