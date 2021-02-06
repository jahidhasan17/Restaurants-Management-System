<?php include("partials/menu.php"); ?>


	<div class="container" style="width: 90%">

		<h1 class="heading_text">Manage Category</h1>
		<br><br>

		<?php

			if(isset($_SESSION['update'])){
				echo $_SESSION['update'];
				unset($_SESSION['update']);
			}

		?>
		<br>
		<a href="add-food.php" class="btn btn-primary btn-lg">Add Food</a>

		<br><br><br>
		
		<table class="table table-secondary table-striped table-bordered table-hover">
		  <thead>
		    <tr>
		      <th width="10%">#</th>
		      <th width="15%">Title</th>
		      <th width="10%">Price</th>
		      <th width="25%">Image</th>
		      <th width="10%">Active</th>
		      <th width="30%">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

		  		$sql = "select * from tbl_food";
					$res = mysqli_query($conn,$sql);

					if($res == true){
						$row_cnt = mysqli_num_rows($res);

						if($row_cnt > 0){
							$sl = 1;
							while($row = mysqli_fetch_assoc($res)){
								?>

									<tr>
							    	<td><?php echo $sl++; ?></td>
							    	<td><?php echo $row['title']; ?></td>
							    	<td>$<?php echo $row['price']; ?></td>
							    	<td>
								
											<?php

												if($row['image_name'] != ""){
													?>

														<img src="<?php echo SITEURL; ?>images/food/<?php echo $row['image_name']; ?>" style = "width: 150px">

													<?php
												}else{
													echo "<div class = 'error'> Image Not Added </div>";
												}

											?>
										
										</td>

							    	<td><?php echo $row['active'] ?></td>
							    	<td>
							    		<a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $row['id'];?>" class="btn-primary admin_btn">Update Category</a>
											<a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $row['id'];?>" class="btn-danger admin_btn">Delete Category</a>
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