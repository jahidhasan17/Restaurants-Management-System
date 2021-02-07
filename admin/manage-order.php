<?php include("partials/menu.php"); ?>


	<div class="">

		<h1 class="heading_text">Manage Order</h1>
		<br><br>
		
		<table class="table table-secondary table-striped table-bordered table-hover">
		  <thead>
		    <tr>
		      <th width="4%">#</th>
		      <th width="8%">Food Details</th>
		      <th width="15%">Order Date</th>
		      <th width="10%">Customer Name</th>
		      <th width="10%">Contact</th>
		      <th width="15%">Email</th>
		      <th width="20%">Address</th>
		      <th width="10%">Status</th>
		      <th width="20%">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

		  		$sql = "select * from tbl_order";
					$res = mysqli_query($conn,$sql);

					if($res == true){
						$row_cnt = mysqli_num_rows($res);

						if($row_cnt > 0){
							$sl = 1;
							while($row = mysqli_fetch_assoc($res)){
								$customer_id = $row['customer_id'];

								$sql2 = " SELECT * FROM tbl_customer WHERE id = '$customer_id' ";
								$res2 = mysqli_query($conn,$sql2);

								if($res2 == true){
									$row2 = mysqli_fetch_assoc($res2);
								}

								?>

									<tr>
							    	<td><?php echo $sl++; ?></td>
							    	<td>
							    		<a href="food-details.php?id=<?php echo $row['id']; ?>" class="btn-primary admin_btn">Food Details</a>
							    	</td>
							    	<td><?php echo $row['order_date']; ?></td>
							    	
							    	<td><?php echo $row2['full_name']; ?></td>
							    	<td><?php echo $row2['contact']; ?></td>
							    	<td><?php echo $row2['email']; ?></td>
							    	<td><?php echo $row2['location']; ?></td>
							    	<td><?php echo $row['order_status']; ?></td>
							    	<td>
							    		<a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $row['id'];?>" class="btn-primary admin_btn">Update Order</a>
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