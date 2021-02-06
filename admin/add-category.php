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
			
			<h1 class="heading_text">Add Category</h1>
				<br><br>
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-6">

							<form action="" method="POST" class="form-container" enctype="multipart/form-data">

							  <div class="form-group">
							    <label >Title</label>
							    <input type="text" class="form-control" name="title" placeholder="Category Title..">
							  </div>

							  <div class="form-group">
							    <label >Select Image</label>
							    <input type="file" class="form-control" name="image">
							  </div>

							  <div class="form-group">
							  	<br>
							    <label >Active </label>
							    <input type="radio" name="active" value="Yes">Yes
							    <input type="radio" name="active" value="No">No
							  </div>

							  <br>
							  <input type="submit" name="submit" value="Add Category" class="btn-primary btn-lg btn-block" style="width: 100%">

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
		$title = $_POST['title'];

		if(isset($_POST['active'])){
			$active = $_POST['active'];
		}else{
			$active = "No";
		}
		
		//print_r($_FILES['image']);
		//print_r($_FILES['image']);
		//die();

		if(isset($_FILES['image']['name'])){
			$image_name = $_FILES['image']['name'];

			if($image_name != ""){
				$source_path = $_FILES['image']['tmp_name'];
				$destination_path = "../images/category/".$image_name;

				$upload = move_uploaded_file($source_path,$destination_path);

				if($upload == false){
					$_SESSION['upload'] = "<div class = 'error'> Failed to Upload Image</div>";
					header('location:'.SITEURL.'admin/add-category.php');
					die();
				}
			}
		}else{
			$image_name = "";
		}

		$sql = " INSERT INTO tbl_category SET 
		title = '$title',
		image_name = '$image_name',
		active = '$active'
		 ";

		$res = mysqli_query($conn,$sql);
		if($res == true){
			$_SESSION['add'] = "<div calss = 'success'>Category Added Successfully</div>";
			header('location:'.SITEURL.'admin/manage-category.php');
		}else{
			$_SESSION['add'] = "<div calss = 'error'>Failed to add Category.</div>";
			header('location:'.SITEURL.'admin/add-category.php');
		}
	}

?>