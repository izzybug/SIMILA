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
							<button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#addFileModal" style="width: 120px">
								<i class="fa-solid fa-plus"></i> Add File
							</button>
							<h2 class="text-blue h4">SEMUA MATERI</h2>
						</div>
						<div class="pb-20">
							<div class="modal fade" id="addFileModal" tabindex="-1" aria-labelledby="addFile" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="addFile">Add file</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="./endpoint/add-file.php" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<label for="fileTitle">File Title</label>
													<input type="text" class="form-control" id="fileTitle" name="fileTitle" required>
												</div>
												<div class="form-group">
													<label for="file">File</label>
													<input type="file" class="form-control-file" id="file" name="file" required>
												</div>
												<div class="form-group">
													<label for="fileUploader">Uploaded By (Optional)</label>
													<input type="text" class="form-control" id="fileUploader" name="fileUploader">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-dark">Add File</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

							<!-- Update File Modal -->
							<div class="modal fade" id="updateFileModal" tabindex="-1" aria-labelledby="updateFile" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="updateFile"></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="./endpoint/update-file.php" method="POST" enctype="multipart/form-data">
												<input type="text" class="form-control" id="updateFileID" name="fileID" hidden>
												<div class="form-group">
													<label for="fileTitle">File Title</label>
													<input type="text" class="form-control" id="updateFileTitle" name="fileTitle" required>
												</div>
												<div class="form-group">
													<label for="file">File</label>
													<input type="file" class="form-control-file" id="updateFile" name="file" required>
												</div>
												<div class="form-group">
													<label for="updateFileUploader">Uploaded By (Optional)</label>
													<input type="text" class="form-control" id="updateFileUploader" name="fileUploader">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Save Changes</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
								<div class="file-container">
									<table class="table table-hover data-table stripe text-center" id="fileTable">
										<thead>
											<tr>
												<th class="table-plus" scope="col">No</th>
												<th scope="col">File Title</th>
												<th scope="col">File</th>
												<th scope="col">Uploaded By</th>
												<th scope="col">Date</th>
												<th scope="col" class="datatable-nosort">Action</th>
											</tr>
										</thead>
										<tbody>

											<?php 
												$stmt = $dbh->prepare("SELECT * FROM `tbl_file`");
												$stmt->execute();
												$result = $stmt->fetchAll();

												foreach ($result as $row) {
													$fileID = $row['tbl_file_id'];
													$fileTitle = $row['file_title'];
													$file = $row['file'];
													$fileUploader = $row['file_uploader'];
													$dateUploaded = $row['date_uploaded'];
												?>
												<tr class="fileList">
													<th id="fileID-<?= $fileID ?>"><?php echo $fileID ?></th>
													<td id="fileTitle-<?= $fileID ?>"><?php echo $fileTitle ?></td>
													<td id="file-<?= $fileID ?>"><?php echo $file ?></td>
													<td id="fileUploader-<?= $fileID ?>"><?php echo $fileUploader ?></td>
													<td id="dateUploaded-<?= $fileID ?>"><?php echo $dateUploaded ?></td>
													<td>
														<div class="btn-group">
															<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
																Action
															</button>
															<div class="dropdown-menu dropdown-sm text-center">
																<button type="button" class="btn btn-success"><i class="fa-solid fa-download" onclick="downloadFile(<?php echo $fileID ?>)" title="Download"></i></button>
																<button type="button" class="btn btn-secondary"><i class="fa-solid fa-pencil" onclick="updateFile(<?php echo $fileID ?>)" title="Update"></i></button>
																<button type="button" class="btn btn-danger"><i class="fa-solid fa-trash" onclick="deleteFile(<?php echo $fileID ?>, )" title="Delete"></i></button>
															</div>
														</div>
														</select>
													</td>
												</tr>
												<?php 
												}
											?>
              						  </tbody>
									</table>
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