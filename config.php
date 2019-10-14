<?php 
	const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PASS = '';
	const DB_NAME = 'myschool';
	
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	if(!$con){
		echo "Database Is Not Connected";
	}

?>