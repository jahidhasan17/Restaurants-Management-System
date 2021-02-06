<?php include("partials/menu.php"); ?>


	<div class="container">

		<h1 class="heading_text">Manage Reservation</h1>
		<br><br>
		
		<table class="table table-secondary table-striped table-bordered table-hover">
		  <thead>
		    <tr>
		      <th width="5%">#</th>
		      <th width="20%">Email</th>
		      <th width="15%">Phone</th>
		      <th width="10%">Date</th>
		      <th width="10%">Time</th>
		      <th width="10%">Guest No</th>
		      <th width="20%">Suggesions</th>
		      <th width="10">Status</th>
		      <th width="10%">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

		  		$sql = "select * from reservation";
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
							    	<td><?php echo $row2['email']; ?></td>
							    	<td><?php echo $row2['contact']; ?></td>
							    	<td><?php echo $row['re_date']; ?></td>
							    	<td><?php echo $row['re_time']; ?></td>
							    	<td><?php echo $row['guest']; ?></td>
							    	<td><?php echo $row['suggestions']; ?></td>
							    	<td><?php echo $row['status']; ?></td>
							    	<td>
							    		<a href="#" class="btn-primary admin_btn">Update</a>
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