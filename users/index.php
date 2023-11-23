<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<body style="background-color: #F7F7F8;">
	<div class="pre-loader">
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
	</div>

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
			<div class="pd-ltr-20">
				<div class="card-box pd-20 height-10-p mb-30">
					<div class="row align-items-center">
						<div class="col-md-4 user-icon">
							<img src="../vendors/images/undraw_welcome_cats_thqn.svg" alt="" style="height: 200px; width:500px">
						</div>
						<div class="col-md-8">

							<?php $query= mysqli_query($conn,"select * from users where id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
							?>

							<h4 class="font-20 weight-500 mb-10 text-capitalize">
								Hi, <?php echo $row['username'] ?> 👋
							</h4>
							<p class="font-18 max-width-600 text-gray">Ini adalah Sistem Terminologis Kehamilan Poltekkes Tasikmalaya.</p>
						</div>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<a class="btn btn-primary float-right" style="margin-left: 10px;" href="kuis.php?q=1" ><i class="fa-solid fa-pen-to-square" style="margin-right:5px;"></i> Yuk Kuis</a>
						<h2 class="text-blue h4">HISTORI UJIAN</h2>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus">No</th>
									<th class="datatable-nosort">Nama</th>
									<th class="datatable-nosort">Pertanyaan</th>
									<th class="datatable-nosort">Pertanyaan Terjawab</th>
									<th>Benar</th>
									<th>Salah</th>
									<th>Skor</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
										$tampil = mysqli_query($conn, "SELECT users_kuis.username ,quiz.title, history.level, history.sahi, history.wrong, history.score 
										FROM history 
										JOIN quiz ON history.eid = quiz.eid 
										JOIN users_kuis ON history.eid = users_kuis.eid
										ORDER BY history.date DESC 
										LIMIT 4") or die('Error');
		
										$x = 1;
										while ($row = mysqli_fetch_array($tampil)) {
										?>  

										<td class="table-plus">
											<?php echo $x; ?>
										</td>
										<td><?php echo $row['username']; ?></td>
										<td><?php echo $row['title']; ?></td>
										<td><?php echo $row['level']; ?></td>
										<td><?php echo $row['sahi'];?></td>
										<td><?php echo $row['wrong'];?></td>
										<td><?php echo $row['score'];?></td>
								</tr>
								<?php $x++;}?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
							<a class="btn btn-primary float-right" style="margin-left: 10px;" href="termin.php"><i class="fa-solid fa-eye" style="margin-right:5px;"></i> See All</a>
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
			<!-- <div class="col-3 pd-ltr-20">
				<div class="card-box height-200-p mb-30">
					<div class="image-container" style="position: relative; display: flex; flex-direction: column; align-items: center;">
						<img src="../src/images/2.jpg" class="img-fluid" style="border-radius: 0.7rem 0.7rem 0 0; width: 100%;">
						<div class="avatar-container" style="position: absolute; top: 50%; transform: translateY(-50%); width: 40%; height: 40%;">
							<img src="uploads/NO-IMAGE-AVAILABLE.jpg" alt="" class="avatar-photo" style="width: 100%; height: 100%; border-radius: 50%;">
							<div class="widget-data">
								<div class="weight-700 font-18 text-white ">Jhon Doe</div>
								<div class="font-14 text-white weight-500">JhonD24@gmail.edu</div>
							</div>
						</div>
					</div>
					<div class="row pd-20 align-items-center justify-content-center">
						<div class="widget-data">
							<div class="weight-700 font-20 text-secondary">Class Name</div>
							<div class="font-14 text-dark weight-500">RMIK 3B</div>
						</div>
					</div>
				</div>
			</div> -->
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>