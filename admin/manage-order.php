<?php include('partials/menu.php'); ?>

	<!--main section start-->
	<div class="main-content">
		<div class="wrapper">
			<h1>order</h1>

			<br><br>

			<?php

				if(isset($_SESSION['update'])){
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				}

			?>

			<table class="tbl-full">
				<tr>
					<th>S.N</th>
					<th>Food</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Order Date</th>
					<th>Status</th>
					<th>Customer Name</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Address</th>
					<th>Actions</th>
				</tr>

				<?php

					$sql = " SELECT * FROM tbl_order ORDER BY id DESC ";
					$res = mysqli_query($conn,$sql);

					$cnt = mysqli_num_rows($res);

					if($cnt > 0){
						$sl = 1;
						while($row = mysqli_fetch_assoc($res)){
							$id = $row['id'];
							$food = $row['food'];
							$price = $row['price'];
							$qty = $row['qty'];
							$total = $row['total'];
							$order_date = $row['order_date'];
							$status = $row['status'];
							$customer_name = $row['customer_name'];
							$customer_contact = $row['customer_contact'];
							$customer_email = $row['customer_email'];
							$customer_address = $row['customer_address'];
							?>

								<tr>

									<td><?php echo $sl++; ?></td>
									<td><?php echo $food; ?></td>
									<td><?php echo $price; ?></td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $total; ?></td>
									<td><?php echo $order_date; ?></td>
									<td><?php echo $status; ?></td>
									<td><?php echo $customer_name; ?></td>
									<td><?php echo $customer_contact; ?></td>
									<td><?php echo $customer_email; ?></td>
									<td><?php echo $customer_address; ?></td>
					
									<td>
										<a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Update Order</a>
									</td>
								</tr>

							<?php
						}

					}else{
						?>

							<tr>
								<td colspan="12">
									<?php echo "Order not Available." ?>
								</td>
							</tr>


						<?php
					}

				?>


			</table>

		</div>
	</div>
	<!--main section end-->


<?php include('partials/footer.php'); ?>