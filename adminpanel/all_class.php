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
			
			<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>CLASS NAME</th>
					  <th>ACTIVE STATUS</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>CLASS NAME</th>
                      <th>ACTIVE STATUS</th>
                      <th>ACTION</th>
                    </tr>
                  </tfoot>
                  <tbody>
					<?php
						require('../config.php');
						$sql = "SELECT * FROM s_class";
						$run = mysqli_query($con,$sql);
						$sl = 0;
						while($classes = mysqli_fetch_assoc($run)){
							$sl++;
					?>
						<tr> 
							<td><?php echo $sl; ?></td>
							<td><?php echo $classes['class_name']; ?></td>
							<td>
								<span class="badge text-light <?php if($classes['active_status'] == 0){ echo 'bg-danger';}else{ echo 'bg-success';} ?>"> 
								
									<?php if($classes['active_status'] == 0){ echo 'Deactive';}else{ echo 'Active';} ?> 
									
								</span>
							</td>
							<td>
								<a href="edit_class.php?c_id=<?php echo $classes['class_id']; ?>" class="btn btn-primary">
									Edit
								</a>
								<a href="delete_class.php?c_id=<?php echo $classes['class_id']; ?>" class="btn btn-danger">
									Delete
								</a>
								<?php 
									$id = $classes['class_id'];
									if($classes['active_status'] == 1){
										?>
										<a href="class_deactive.php?c_id=<?php echo $id; ?>" class="btn btn-warning">Deactive</a>
										<?php
									}
									else{
										?>
											<a href="class_active.php?c_id=<?php echo $id; ?>" class="btn btn-success">Active</a>
										<?php
									}
								?>
							</td>
						</tr>
					<?php }?>
				  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php require('libs/footer.php'); ?>
