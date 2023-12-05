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
									<h4>List Materi</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Halaman Utama</a></li>
										<li class="breadcrumb-item active" aria-current="page">Materi</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="card-box mb-30">
						<div class="pd-20">
							<h2 class="text-blue h4">SEMUA MATERI</h2>
						</div>
						<div class="pb-20">
							<div class="row">
								<?php
								$query = mysqli_query($conn, "SELECT * FROM tbl_file ORDER BY date_uploaded DESC") or die(mysqli_error());
								$count = mysqli_num_rows($query);

								for ($i = 1; $i <= $count; $i++) {
									$row = mysqli_fetch_array($query);
									$fileID = $row['tbl_file_id'];
								?>
									<div class="col-lg-3 col-md-6 col-sm-12 mb-20 pd-30">
										<div class="card-box height-70-p pd-20 min-height-150px">
											<div class="d-flex justify-content-between pb-10">
												<div class="h5 mb-0">Materi <?php echo $i; ?></div>
												<div class="table-actions">
													<a title="VIEW" href="materi.php"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>
												</div>
											</div>
											<div class="materi-list">
												<ul>
													<li class="d-flex align-items-center justify-content-between">
														<div class="name-avatar d-flex align-items-center pr-2">
															<div class="avatar mr-2 flex-shrink-0">
																<img src="../src/images/Notes-bro.svg" class="border-radius-100 box-shadow" width="70" height="70" alt="">
															</div>
															<div class="txt">
																<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">Soal <?php echo $row['file_title'] ?></span>
																<div class="font-18 weight-600"><?php echo $row['title']; ?></div>
																<div class="font-14 weight-500" data-color="#b2b1b6"><?php echo $row['file']; ?></div>
															</div>
														</div>
													</li>
													<br>
													<button type="button" class="btn btn-success"><i class="fa-solid fa-download" onclick="downloadFile(<?php echo $fileID ?>)" title="Download"></i></button>
												</ul>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>

	<?php include('includes/scripts.php')?>    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <!-- Script JS -->
    <script src="assets/script.js"></script>
</body>
</html>