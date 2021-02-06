<?php

	include('../config/constants.php');

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = " DELETE FROM tbl_category WHERE id='$id' ";
		$res = mysqli_query($conn,$sql);

		if($res == true){
			header('location:'.SITEURL.'admin/manage-category.php');
		}

	}else{
		header('location:'.SITEURL.'admin/manage-category.php');
	}

?>