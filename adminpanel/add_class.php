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
					<h1 class="h4 text-gray-900 mb-4">Add New Class</h1>
				  </div>
				  
				  <?php 
						require('../config.php');
						if(isset($_POST['addclass'])){
							$errclass='';
							//for validation
							function validate($data){
								$data = htmlspecialchars($data);
								$data = trim($data);
								$data = stripslashes($data);
								return $data;
							}
							
							if(empty($_POST['s_class'])){
								$errclass = "<p class='alert alert-danger mt-1'>Class Name Is Required</p>";
							}
							else{
								$class = validate($_POST['s_class']);
								//Add data to database
								$sql = "INSERT INTO s_class (class_name) VALUES ('$class')";
								$run = mysqli_query($con,$sql);
								if($run == true){
									echo "<script>swal('Success','Class Added Successfully','success')</script>";
								}
								else{
									echo "<script>swal('Opps!','Failed To Add Class','error')</script>";
								}
								
							}	
							
						}
					
					
					?>
				  
				  <form class="user" action="" method="POST">
					<div class="form-group">
					  <input type="text" name="s_class" class="form-control form-control-user" placeholder="Class">
					  <?php echo @$errclass; ?>
					</div>
					<button name="addclass" class="btn btn-primary btn-user btn-block" type="submit">
						Save Class
					</button>	
					</form>
					
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
