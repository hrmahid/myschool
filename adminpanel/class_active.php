<?php 
	$id = $_GET['c_id'];
	require('../config.php');
	
	$sql = "UPDATE s_class SET active_status = '1' WHERE class_id = '$id'";
	
	$run = mysqli_query($con,$sql);
	
	header("location:all_class.php");

?>