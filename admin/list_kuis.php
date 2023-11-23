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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>List Kuis</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">List Kuis</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="card-box mb-30">
						<div class="pd-20">
							<a class="btn btn-baru float-right" href="tambah_kuis.php?q=4" ><i class="fa-solid fa-file-circle-plus"></i> Kuis baru</a>
							<h2 class="text-blue h4">SEMUA KUIS</h2>
						</div>
						<div class="pb-20">
							<table class="data-table table stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus">No</th>
										<th>Soal</th>
										<th>Total Pertanyaan</th>
										<th>Total Nilai</th>
										<th class="datatable-nosort">ACTION</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
										$tampil = mysqli_query($conn,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
										$x = 1;
										while ($row = mysqli_fetch_array($tampil)) {
										?>  

										<td class="table-plus">
											<?php echo $x; ?>
										</td>
										<td><?php echo $row['title']; ?></td>
										<td><?php echo $row['total']; ?></td>
										<td><?php echo $row['sahi'];?></td>
										<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="edit_kuis.php?eid=<?php echo $row['eid'] ?>" ><i class="dw dw-edit2"></i> Edit</a>
													<a class="dropdown-item" href="update.php?q=rmquiz&eid=<?php echo $row['eid'] ?>" data-color="red" ><i class="dw dw-delete-3"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<?php $x++;}?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>

	<?php include('includes/scripts.php')?>
</body>
</html>