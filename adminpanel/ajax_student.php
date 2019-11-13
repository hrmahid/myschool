<?php 
	$id = $_POST['cid'];
	require '../config.php';
	$sql = "SELECT * FROM students WHERE class_id = '$id'";
	$run = mysqli_query($con,$sql);
	
	while($student = mysqli_fetch_assoc($run)){
	
?>
	<option value="<?php echo $student['student_id'] ?>"><?php echo $student['std_name']; ?></option>
<?php
	}

?>