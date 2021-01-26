<?php include('partials/menu.php'); ?>

	<!--main section start-->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Admin</h1>

			<br><br>

			<?php

			if(isset($_SESSION['add'])){
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}

			if(isset($_SESSION['delete'])){
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);
			}

			if(isset($_SESSION['update'])){
				echo $_SESSION['update'];
				unset($_SESSION['update']);
			}

			if(isset($_SESSION['user_not_found'])){
				echo $_SESSION['user_not_found'];
				unset($_SESSION['user_not_found']);
			}

			if(isset($_SESSION['pwd_not_match'])){
				echo $_SESSION['pwd_not_match'];
				unset($_SESSION['pwd_not_match']);
			}

			if(isset($_SESSION['cng_pwd'])){
				echo $_SESSION['cng_pwd'];
				unset($_SESSION['cng_pwd']);
			}

			if(isset($_SESSION['cng_pwd_not'])){
				echo $_SESSION['cng_pwd_not'];
				unset($_SESSION['cng_pwd_not']);
			}

			?>

			<br><br>

			<a href="add-admin.php" class="btn-primary">Add Admin</a>

			<br /><br /><br />

			<table class="tbl-full">
				<tr>
					<th>S.N</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Actions</th>
				</tr>

				<?php

				$sql = "select * from tbl_admin";
				$res = mysqli_query($conn,$sql);

				if($res == TRUE){
					$row_cnt = mysqli_num_rows($res);
					
					if($row_cnt > 0){
						$cnt = 1;
						while($rows = mysqli_fetch_assoc($res)){
							$id = $rows['id'];
							$full_name = $rows['full_name'];
							$username = $rows['username'];

							?>

							<tr>
							<td><?php echo $cnt++ ?></td>
							<td><?php echo $full_name ?></td>
							<td><?php echo $username ?></td>
							<td>
								<a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
								<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
								<a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
								<!-- <a href="delete-admin.php" class="btn-danger">Delete Admin</a> -->
							</td>
						</tr>

							<?php
						}

					}else{

					}
				}

				?>
			</table>

		</div>
	</div>
	<!--main section end-->


<?php include('partials/footer.php'); ?>