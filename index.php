<?php require 'libs/header.php';
	require 'config.php';
 ?>
		
		<div class="row mt-2">
			<div class="col-md-8 offset-2">
				<div class="card">
					<div class="card-body">
						<form action="" method="POST">
							<div class="input-group">
								<input type="text" placeholder="Search for student" class="form-control" />
								<button type="submit" class="btn btn-success">Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-8">
					<!-- Slider start -->
			<div class="carousel slide" id="demo" data-ride="carousel">
				<!-- indecators -->
				<ul class="carousel-indicators">
				<?php 
					$sql ="SELECT * FROM sliders";
					$run = mysqli_query($con,$sql);
					$i = 0;
					foreach($run  as $slide){
						$actives = '';
						if ($i == 0) {
							$actives ='active';
						}
				?>
				<li class="<?php echo $actives; ?>" data-target="#demo" data-slide-to="<?php echo $i; ?>">
				<?php
						$i++;
					} ?>
				</ul>
				<!-- the slideshow -->
				<div class="carousel-inner">
					<?php 
						$i =0;
						foreach ($run  as $slide) {
							$actives ='';
							if ($i == 0) {
								$actives ='active';
							}
					?>
					<div class="carousel-item <?php echo $actives; ?> shadow">
						<img src="adminpanel/<?php echo $slide['slider_path']; ?>" width="100%" height="400px"  alt="">
					</div>
				<?php $i++; } ?>
				</div>
			
				  <a class="carousel-control-prev" href="#demo" data-slide="prev">
   				 	<span class="carousel-control-prev-icon"></span>
 				 </a>
				  <a class="carousel-control-next" href="#demo" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				  </a>
				
		 	  <!-- Left and right controls -->

			</div>
				<!-- Slider end -->
				</div>
				<div class="col-md-4">
					<h4 class="text-center p-4 text-dark font-weight-bold">Notice Board</h4>
					  <button type="button" class="btn btn-primary btn-block mb-3 shadow" data-toggle="collapse" data-target="#sideshow">Notice</button>
						  <div id="sideshow" class="collapse bg-light p-2 shadow">
						    <table class="table table-bordered">
							<?php
								$sql = "SELECT * FROM single_notices ORDER BY notice_id DESC LIMIT 3";
								$run = mysqli_query($con,$sql);
								
								while($notices = mysqli_fetch_assoc($run)){
							?>
								<tr>
									<td><a href="#"><?php echo $notices['title'] ?></a></td>
								</tr>
								<?php } ?>
							</table>
						  </div>


						  <button type="button" class="btn btn-primary btn-block mb-3 shadow" data-toggle="collapse" data-target="#secondslide">Class Routine</button>
						  <div id="secondslide" class="collapse bg-light p-2 shadow">
						     <table class="table table-bordered">
								<?php
								$sql = "SELECT * FROM routines INNER JOIN s_class ON routines.class_id = s_class.class_id ORDER BY routine_id DESC LIMIT 3";
								$run = mysqli_query($con,$sql);
								
								while($routines = mysqli_fetch_assoc($run)){
							?>
								<tr>
									<td><a href="#"><?php echo $routines['class_name'] ?></a></td>
									<td><a href="adminpanel/<?php echo $routines['routine_path']; ?>"><?php echo $routines['routine_title'] ?></a></td>
								</tr>
								<?php } ?>
							</table>
						  </div>
				</div>
			</div>
					
		</div>
		
<?php require 'libs/footer.php'; ?>