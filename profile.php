<?php
	
	include('config/constants.php');

	
	if(isset($_SESSION['login'])){
		echo $_SESSION['login'];
	}

	if(isset($_SESSION['username'])){
		echo "  ";
		echo $_SESSION['username'];
	}

	if(isset($_SESSION['user_id'])){
		echo "  ".$_SESSION['user_id'];
	}

?>