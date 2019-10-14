<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>My School | SMS</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
</head>
<body>
	 <div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-3">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Log In</h4>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							<label >E-mail</label>
							<input type="email" class="form-control" name="email" />
							<label >Password</label>
							<input type="password" class="form-control" name="password" />
							<button class="btn btn-primary mt-2" type="submit" name="login">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	 </div> 
		<?php 
			require('config.php');
			
			if(isset($_POST['login'])){
				$email = $_POST['email'];
				$pass = sha1($_POST['password']);
				
				$sql = "SELECT * FROM admins WHERE admin_email = '$email' AND admin_password = '$pass'";
				
				$run = mysqli_query($con,$sql);
				
				$length = mysqli_num_rows($run);
				
				if($length == 0){
					echo "<script>swal('Opps!', 'E-mail or Password Not Matched', 'error');</script>";
				}
				else{
					
					$result = mysqli_fetch_assoc($run);
					session_start();
					$_SESSION['adminName'] = $result['admin_name'];
					$_SESSION['adminEmail'] = $result['admin_email'];
					header('location:adminpanel/index.php');
				}
				
				
			}
		
		
		?>
	 
	 
	
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>