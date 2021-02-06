<?php include("partials/menu.php"); ?>


	<div class="container" style="width: 90%">

		<h1 class="heading_text">Manage Admin</h1>
		<br><br>

		<?php

			if(isset($_SESSION['add'])){
				?>
					<p style="color: green"><?php echo $_SESSION['add']; ?></p>
				<?php
				unset($_SESSION['add']);
			}

			if(isset($_SESSION['delete'])){
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);
			}
			if(isset($_SESSION['user_not_found'])){
				echo $_SESSION['user_not_found'];
				unset($_SESSION['user_not_found']);
			}

			if(isset($_SESSION['pwd_not_match'])){
				echo $_SESSION['pwd_not_match'];
				unset($_SESSION['pwd_not_match']);
			}
			if(isset($_SESSION['pwd_not_match'])){
				echo $_SESSION['pwd_not_match'];
				unset($_SESSION['pwd_not_match']);
			}

		?>

		<a href="add-admin.php" class="btn btn-primary btn-lg">Add Admin</a>

		<br><br><br>
		
		<table class="table table-secondary table-striped table-bordered table-hover">
		  <thead>
		    <tr>
		      <th width="10%">#</th>
		      <th width="20%">Full Name</th>
		      <th width="20%">User Name</th>
		      <th width="50%">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

		  		$sql = "select * from tbl_admin";
					$res = mysqli_query($conn,$sql);

					if($res == true){
						$row_cnt = mysqli_num_rows($res);

						if($row_cnt > 0){
							$sl = 1;
							while($row = mysqli_fetch_assoc($res)){
								?>

									<tr>
							    	<td><?php echo $sl++; ?></td>
							    	<td><?php echo $row['full_name'] ?></td>
							    	<td><?php echo $row['username'] ?></td>
							    	<td>
							    		<a href="update-admin.php?id=<?php echo $row['id']; ?>" class="btn-primary admin_btn">Update Admin</a>
							    		<a href="delete-admin.php?id=<?php echo $row['id']; ?>" class="btn-danger admin_btn">Delete Admin</a>
							    	</td>
							    </tr>

								<?php
							}

						}else{
							
						}
					}else{

					}

		  	?>

		  </tbody>
		</table>		



	</div>

<?php include("partials/footer.php"); ?>