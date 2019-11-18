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
					<h1 class="h4 text-gray-900 mb-4">Add New Result</h1>
				  </div>
				  
				  <form class="user" action="" method="POST">
					<div class="form-group">
						<select name="class_id" class="form-control" id="classes">
							<option>Select Class</option>
							<?php 
								require '../config.php';
								$sql = "SELECT * FROM s_class";
								$que = mysqli_query($con,$sql);
								while($class = mysqli_fetch_assoc($que)){
							?>
							<option value="<?php echo $class['class_id']; ?>"><?php echo $class['class_name']; ?></option>
							<?php } ?>
						</select>
					</div>
					
					<div class="form-group">
						<select name="student_id" id="students" class="form-control">
							<option>Select Student</option>
						</select>
					</div>
					
					<div class="form-group">
						<input type="text" name="sub1" placeholder="Subject1_name" class="form-control" />
					</div>
					
					<div class="form-group">
						<input type="text" name="sub1_marks" placeholder="Subject1 Marks" class="form-control" />
					</div>
					
					<div class="form-group">
						<input type="text" name="sub2" placeholder="Subject2" class="form-control" />
					</div>
					
					<div class="form-group">
						<input type="text" name="sub2_marks" placeholder="Subject2 Marks" class="form-control" />
					</div>
					
					<div class="form-group">
						<input type="text" name="sub3" placeholder="Subject3" class="form-control" />
					</div>
					
					<div class="form-group">
						<input type="text" name="sub3_marks" placeholder="Sub3 Subject Marks" class="form-control" />
					</div>
					
					<button name="addresult" class="btn btn-primary btn-user btn-block" type="submit">
						Save Result
					</button>	
					</form>
					<?php
						if(isset($_POST['addresult'])){
							$class_id = $_POST['class_id'];
							$student_id = $_POST['student_id'];
							
							
							//subjects name
							
							$sub1 = $_POST['sub1'];
							$sub2 = $_POST['sub2'];
							$sub3 = $_POST['sub3'];
							
							//subjects marks
							$mark1 = $_POST['sub1_marks'];
							$mark2 = $_POST['sub2_marks'];
							$mark3 = $_POST['sub3_marks'];
							
							//retrive student rollno using std id
							$sql = "SELECT std_roll FROM students WHERE student_id = '$student_id'";
							
							$run = mysqli_query($con,$sql);
							
							$result = mysqli_fetch_assoc($run);
							
							$rollno = $result['std_roll'];
							
							//function for calculate gpa
							function gpa_calculate($mark){
								if($mark >= 80){
									return 5.00;
								}
								else if($mark >= 70){
									return 4.00;
								}
								else if($mark >= 60){
									return 3.00;
								}
								else if($mark >= 40){
									return 2.00;
								}
								else if($mark >= 33){
									return 1.00;
								}
								else{
									return 0.00;
								}
							}
							
							//end function 
							
							//function for calculate gpa
							function grade_calculate($mark){
								if($mark >= 80){
									return "A+";
								}
								else if($mark >= 70){
									return "A";
								}
								else if($mark >= 60){
									return "B";
								}
								else if($mark >= 40){
									return "C";
								}
								else if($mark >= 33){
									return "D";
								}
								else{
									return "F";
								}
							}
							
							//end function 
							
							//function for calculate gpa
							function total_grade($mark){
								if($mark >= 4.99){
									return "A+";
								}
								else if($mark >= 3.99){
									return "A";
								}
								else if($mark >= 2.99){
									return "A-";
								}
								else if($mark >= 1.99){
									return "B";
								}
								else if($mark >= 0.99){
									return "C";
								}
								else{
									return "F";
								}
							}
							
							//end function 
							
							$sub1_gpa = number_format(gpa_calculate($mark1),2);
							$sub2_gpa = number_format(gpa_calculate($mark2),2);
							$sub3_gpa = number_format(gpa_calculate($mark3),2);
							
							$sub1_grade = grade_calculate($mark1);
							$sub2_grade = grade_calculate($mark2);
							$sub3_grade = grade_calculate($mark3);
							
							$total_gpa = number_format(($sub1_gpa+$sub2_gpa+$sub3_gpa) / 3, 2);
							
							$total_grade = total_grade($total_gpa);
							
							$pub_date = date('d/m/Y');
							$pub_year = date('Y');
							
							$sql = "INSERT INTO main_results (student_id,class_id,rollno,pub_date,pub_year,gpa,total_grade) VALUES ('$student_id','$class_id','$rollno','$pub_date','$pub_year','$total_gpa','$total_grade')";
							
							$run = mysqli_query($con,$sql);
							
							$res_id = mysqli_insert_id($con);
							
							$sql1 = "INSERT INTO subject_results (result_id,subject_name,subject_grade,subject_gpa,subject_marks) VALUES ('$res_id','$sub1','$sub1_grade','$sub1_gpa','$mark1')";
							
							$run1 = mysqli_query($con,$sql1);
							
							$sql2 = "INSERT INTO subject_results (result_id,subject_name,subject_grade,subject_gpa,subject_marks) VALUES ('$res_id','$sub2','$sub2_grade','$sub2_gpa','$mark2')";
							
							$run2 = mysqli_query($con,$sql2);
							
							$sql3 = "INSERT INTO subject_results (result_id,subject_name,subject_grade,subject_gpa,subject_marks) VALUES ('$res_id','$sub3','$sub3_grade','$sub3_gpa','$mark3')";
							
							$run3 = mysqli_query($con,$sql3);
							
							echo "<script>window.open('index.php','_self');</script>";
							
							
							
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
	 
