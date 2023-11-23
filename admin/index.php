<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../src/images/loader_logo/simila.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="../vendors/images/undraw_hello_re_3evm.svg" alt="" style="height: 200px; width:500px">
					</div>
					<div class="col-md-8">

						<?php $query= mysqli_query($conn,"select * from users where id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>

						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><?php echo $row['username']; ?>,</div>
						</h4>
						<p class="font-18 max-width-600">Ini adalah Sistem Terminologis Kehamilan Poltekkes Tasikmalaya.</p>
					</div>
				</div>
			</div>
			<div class="title pb-20">
				<h2 class="h3 mb-0">Data Information</h2>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Pengguna Terdaftar</div>
							<div class="table-actions">
								<a title="VIEW" href="users.php"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
							</div>
						</div>
						<div class="user-list">
							<ul>
								<?php
		                         $query = mysqli_query($conn,"select * from users where role = 'student' ORDER BY users.id desc limit 4") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($query)) {
		                         $id = $row['id'];
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7"><?php echo $row['role']; ?></span>
											<div class="font-14 weight-600"><?php echo $row['username']; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row['email']; ?></div>
										</div>
									</div>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Total Soal</div>
							<div class="table-actions">
								<a title="VIEW" href="list_kuis.php"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
							</div>
						</div>
						<div class="user-list">
							<ul>
								<?php
		                         $query = mysqli_query($conn,"SELECT * FROM quiz ORDER BY date DESC limit 4") or die(mysqli_error());
								 $x = 1;
		                         while ($row = mysqli_fetch_array($query)) {
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="../src/images/file-svgrepo-com.svg" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">Soal <?php echo $x; ?></span>
											<div class="font-14 weight-600"><?php echo $row['title']; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row['sahi']; ?></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8"><?php echo $row['total']; ?></div>
								</li>
								<?php $x++;}?>
							</ul>
						</div>
						<div id="application-chart"></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Rank</div>
							<div class="table-actions">
								<a title="VIEW" href="#"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
							</div>
						</div>

						<div class="user-list">
						<ul>
								<?php
		                         $query = mysqli_query($conn,"SELECT * FROM `rank` ORDER BY score DESC limit 4") or die(mysqli_error());
								 $x = 1;
		                         while ($row = mysqli_fetch_array($query)) {
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="../src/images/ranking-svgrepo-com.svg" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">Rank <?php echo $x; ?></span>
											<div class="font-14 weight-600"><?php echo $row['email']; ?></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8"><?php echo $row['score']; ?></div>
								</li>
								<?php $x++;}?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<a class="btn btn-primary float-right" style="margin-left: 10px;" href="termin.php"><i class="icon-copy ion-eye" style="margin-right:5px;"></i> See All</a>
						<h2 class="text-blue h4">Terminologis Kehamilan</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table-bordered table stripe hover ">
						<thead>
							<tr>
								<th class="table-plus">No</th>
								<th>Istilah medis</th>
								<th>Pembentukan Istilah Medis</th>
								<th class="datatable-nosort">Arti</th>
								<th class="datatable-nosort">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$tampil = mysqli_query($conn, "SELECT * FROM `daftar_istilah_medis` LIMIT 5") or die(mysqli_error());
								$x = 1;
								while ($row = mysqli_fetch_array($tampil)) {

								 ?>  

								<td class="table-plus">
									<?php echo $x; ?>
								</td>
								<td><?php echo $row['istilah_medis']; ?></td>
	                            <td><?php echo $row['pembentukan_istilah_medis']; ?></td>
								<td><?php echo $row['arti'];?></td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="ubahdata.php?id=<?php echo $row['id'] ?>" ><i class="dw dw-edit2"></i> Edit</a>
											<a class="dropdown-item" href="termin.php?delete=<?php echo $row['id'] ?>" data-color="red" ><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php $x++;}?>
						</tbody>
					</table>
			   </div>
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
</body>
</html>