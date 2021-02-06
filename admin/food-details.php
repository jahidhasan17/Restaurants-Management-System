<?php include("partials/menu.php"); ?>


	<div class="container">

		<h1 class="heading_text">Order Food Details</h1>
		<br><br>
		
		<table class="table table-secondary table-striped table-bordered table-hover">
		  <thead>
		    <tr>
		      <th width="10%">#</th>
		      <th width="25%">Food Title</th>
		      <th width="20%">Food Price</th>
		      <th width="20%">Quantity</th>
		      <th width="25%">Subtotal</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php
		  		$id = $_GET['id'];
		  		$sql = "select * from tbl_orderdetails where order_id = '$id'";
					$res = mysqli_query($conn,$sql);

					if($res == true){
						$row_cnt = mysqli_num_rows($res);

						if($row_cnt > 0){
							$sl = 1;
							$total = 0;
							while($row = mysqli_fetch_assoc($res)){

								$food_id = $row['food_id'];

								$sql2 = " SELECT * FROM tbl_food WHERE id = '$food_id' ";
								$res2 = mysqli_query($conn,$sql2);

								if($res2 == true){
									$row2 = mysqli_fetch_assoc($res2);
								}

								$total += ($row2['price']*$row['qty']);

								?>

									<tr>
							    	<td><?php echo $sl++; ?></td>
							    	<td><?php echo $row2['title']; ?></td>
							    	<td><?php echo $row2['price']; ?></td>
							    	<td><?php echo $row['qty']; ?></td>
							    	<td><?php echo $row2['price']*$row['qty']; ?></td>
							    </tr>

								<?php
							}

						}else{
							
						}
					}else{

					}

		  	?>
		  	<tr>
		  		<td colspan="4" class="text-right">Total</td>
		  		<td><?php echo $total; ?></td>
		  	</tr>

		  </tbody>
		</table>		



	</div>

<?php include("partials/footer.php"); ?>