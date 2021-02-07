<?php include("partials/menu.php"); ?>

	<div class="container">

		<h1 class="heading_text">Update Reservation Status</h1>
		<br><br><br>

		<?php 
      
      if(isset($_GET['id']))
      {
        $id=$_GET['id'];

        $sql = "SELECT * FROM reservation WHERE id='$id'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $row=mysqli_fetch_assoc($res);
            $status = $row['status'];
        }
        else
        {
            //header('location:'.SITEURL.'admin/manage-order.php');
        }
      }
      else
      {
          //header('location:'.SITEURL.'admin/manage-order.php');
      }
      
    ?>

    <div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-lg-6">

				<form action="" method="POST" class="form-container">
		    	<div class="form-group">
				    <label >Status</label>
						<select name="status">
							<option <?php if($status == "Pending"){echo "selected";} ?> value="Pending">Pending</option>
							<option <?php if($status == "Accepted"){echo "selected";} ?> value="Accepted">Accepted</option>
              <option <?php if($status == "Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
							<option <?php if($status == "Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
						</select>

						<br><br>
						<input type="hidden" name="id" value="<?php echo $id; ?>">

						<input type="submit" name="submit" value="Update" class="btn-primary btn-lg btn-block" style="width: 100%">
				  </div>

		    </form>

			</div>
		</div>
	</div>

		
	</div>


<?php include("partials/footer.php"); ?>

<?php 

  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql2 = "UPDATE reservation SET 
        status = '$status'
        WHERE id='$id'
    ";

    echo $sql2;

    $res2 = mysqli_query($conn, $sql2);

    
    if($res2==true)
    {
        $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-reservation.php');
    }
    else
    {
    	echo "Failed to Success";
        //Failed to Update
        $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
        //header('location:'.SITEURL.'admin/manage-order.php');
    }
  }
?>