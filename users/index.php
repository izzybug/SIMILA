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
		<div class="row">
			<div class="col-9 pd-ltr-20">
				<div class="card-box pd-20 height-10-p mb-30">
					<div class="row align-items-center">
						<div class="col-md-4">

							<?php $query= mysqli_query($conn,"select * from users where id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
							?>

							<h4 class="font-20 weight-500 mb-10 text-capitalize">
								Hi, <?php echo $row['username'] ?> 👋
							</h4>
							<p class="font-18 max-width-600 text-gray">Nice to see you again!</p>
						</div>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">HISTORI UJIAN</h2>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus">MATA KULIAH</th>
									<th>TANGGAL</th>
									<th>STATUS</th>
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<!-- <tr>
									<?php 
										// $sql = "SELECT * from tblpengajuan where empid = '$session_id'";
										// $query = $dbh -> prepare($sql);
										// $query->execute();
										// $results=$query->fetchAll(PDO::FETCH_OBJ);
										// $cnt=1;
										// if($query->rowCount() > 0)
										// {
										// foreach($results as $result)
										// {               ?>  

									<td><?php echo htmlentities($result->Keperluan);?></td>
									<td><?php echo htmlentities($result->PostingDate);?></td>
									<td><?php $stats=$result->Status;
										if($stats==1){
											?>
											<span style="color: green">Approved</span>
												<?php } if($stats==2)  { ?>
											<span style="color: red">Not Approved</span>
												<?php } if($stats==0)  { ?>
											<span style="color: blue">Pending</span>
											<?php } ?>

										</td>
									<td>
										<div class="table-actions">
											<a title="VIEW" href="view_apply.php?edit=<?php //echo htmlentities($result->kti_id);?>" data-color="#265ed7"><i class="icon-copy dw dw-eye"></i></a>
										</div>
									</td>
								</tr>
								<?php // $cnt++;} }?>   -->
							</tbody>
						</table>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<a class="btn float-right" href="termin.php">See All</a>
						<h2 class="text-blue h4">Terminologis Kehamilan</h2>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus">No</th>
									<th>Istilah medis</th>
									<th>Pembentukan Istilah Medis</th>
									<th class="datatable-nosort">Arti</th>
								</tr>
							</thead>
							<tbody>
								<tr>

									<?php 
									$koneksi = mysqli_connect('localhost','root','','simpen');
									$tampil = mysqli_query($koneksi, "SELECT * FROM daftar_istilah_medis LIMIT 5") or die(mysqli_error());
									$x = 1;
									while ($row = mysqli_fetch_array($tampil)) {

									?>  

									<td class="table-plus">
										<?php echo $x; ?>
									</td>
									<td><?php echo $row['istilah_medis']; ?></td>
									<td><?php echo $row['pembentukan_istilah_medis']; ?></td>
									<td><?php echo $row['arti'];?></td>

								</tr>
								<?php $x++;}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-3 pd-ltr-20">
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
			</div>
		</div>

	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>