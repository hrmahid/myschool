<?php
	session_start();
	if(isset($_SESSION['adminName'])){
		
	}
	else{
		header('location:../login.php');
	}
?>
<?php require('libs/header.php'); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php require('libs/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
			
		<div class="card o-hidden border-0 shadow-lg my-5">
		  <div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
			  
			  <div class="col-lg-12">
				<div class="p-5">
				  <div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Add New Student</h1>
					<?php 
						if(isset($_SESSION['message'])){
							?>
							<h4 class="alert alert-info"><?php echo $_SESSION['message']; ?></h4>
							<?php
							
						}
						$_SESSION['message'] = null;
					?>
				  </div>
				  <form class="user" action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					  <input type="text" name="s_name" class="form-control form-control-user" placeholder="Student Name">
					</div>
					
					<div class="form-group">
					  <input type="text" name="f_name" class="form-control form-control-user" placeholder="Father's Name">
					</div>
					
					<div class="form-group">
					  <input type="text" name="m_name" class="form-control form-control-user" placeholder="Mother's Name">
					</div>
					
					<div class="form-group">
					  <input type="date" name="dob" class="form-control form-control-user" placeholder="Date of birth Name">
					</div>
					
					<div class="form-group">
					  <input type="text" name="address" class="form-control form-control-user" placeholder="Address">
					</div>
					
					<div class="form-group">
					  <input type="text" name="phone" class="form-control form-control-user" placeholder="Phone">
					</div>
					
					<div class="form-group">
					  <input type="file" name="std_photo" class="form-control" placeholder="Image" required>
					  <span>Photo Must Be Less Than 2 MB</span>
					</div>
					
					<div class="form-group">
					 <select name="class_id" class="form-control">
						<option selected disabled>Select Class</option>
						<?php
							require('../config.php');
							$sql = "SELECT * FROM s_class WHERE active_status = '1'";
							
							$run = mysqli_query($con,$sql);
							while($result = mysqli_fetch_assoc($run)){
						?>
							<option value="<?php echo $result['class_id']; ?>">
								<?php echo $result['class_name'];?>
							</option>
						<?php } ?>
					 </select>
					</div>
					<button name="addstudent" class="btn btn-primary btn-user btn-block" type="submit">
						Save Student
					</button>	
					</form>
					
					
					<?php 
						$getinfo = "SELECT student_id FROM students ORDER BY student_id DESC";
						$getque = mysqli_query($con,$getinfo);
						$getid = mysqli_fetch_assoc($getque);
						
						
						if(isset($_POST['addstudent'])){
							
							$std_name = $_POST['s_name'];
							$f_name = $_POST['f_name'];
							$m_name = $_POST['m_name'];
							$dob = $_POST['dob'];
							$address = $_POST['address'];
							$phone = $_POST['phone'];
							$class = $_POST['class_id'];
							$addmission_date = date('d/m/y');
							//for roll number
							$year = date('Y');
							$rollid = $getid['student_id'];
							if($rollid == null || $rollid = ''){
								$rollid = 0;
							}
							$stdroll = $year.$rollid+1;
							
							
							$photo = $_FILES['std_photo']['name'];
							$tmp_name = $_FILES['std_photo']['tmp_name'];
							
							$upload_path = 'img/students/';
							move_uploaded_file($tmp_name,$upload_path.$photo);
							
							$photo_full_name = $upload_path.$photo;
							
							$sql = "INSERT INTO `students`(`std_name`, `f_name`, `m_name`, `dob`, `address`, `phone`, `class_id`, `std_roll`, `admission_date`,`student_photo`) VALUES ('$std_name','$f_name','$m_name','$address','$dob','$phone','$class','$stdroll','$addmission_date','$photo_full_name')";
							
							$run = mysqli_query($con,$sql);
							if($run == true){
								$_SESSION['message'] = 'Student Added Successfully';
								
								header('location:add_student.php');
							}
							else{
								$_SESSION['message'] = 'Opps! Failed To Add New Student';
								header('location:add_student.php');
							}
							
						}
					
					
					?>
					
				</div>
				
			  </div>
			</div>
		  </div>
		</div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php require('libs/footer.php'); ?>
