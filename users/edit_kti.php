<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['update']))
	{
	
	$JudulProposal=$_POST['JudulProposal'];
	$WaktuPenelitian=$_POST['WaktuPenelitian']; 
	$TempatPenelitian=$_POST['TempatPenelitian']; 
	$KepadaYth=$_POST['KepadaYth']; 
	$Keperluan=$_POST['Keperluan'];

	$result = mysqli_query($conn,"update tblpengajuan set JudulProposal='$JudulProposal', WaktuPenelitian='$WaktuPenelitian', TempatPenelitian='$TempatPenelitian', KepadaYth='$KepadaYth', Keperluan='$Keperluan' where kti_id='$get_id'         
		");
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'apply_history.php'; </script>";
	} else{
	  die(mysqli_error());
   }
		
}

?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/siparti-dark.png" alt=""></div>
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

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>SIPARTI Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">KTI Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">KTI Student</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from tblpengajuan where kti_id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b>Full Name</b></label>
											<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo $row['FirstName']." ".$row['LastName'];?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b>NIM</b></label>
											<input type="text" class="selectpicker form-control" data-style="btn-outline-success" readonly value="<?php echo $row['NIM'];?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b>Program Studi</b></label>
											<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo $row['ProgramStudi'];?>">
										</div>
									</div>
								</div>
								<div class="form-group row">
										<label style="font-size:16px;" class="col-sm-12 col-md-2 col-form-label"><b>Judul Proposal</b></label>
										<div class="col-sm-12 col-md-10">
											<textarea name="JudulProposal"class="form-control text_area" type="text"><?php echo $row['JudulProposal'];?></textarea>
										</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Waktu Penelitian :</label>
											<input name="WaktuPenelitian" type="text" class="date-picker form-control" data-style="btn-outline-success" value="<?php echo $row['WaktuPenelitian'];?>">
										</div>
										
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Tempat Penelitian :</label>
											<input name="TempatPenelitian" type="text" class="selectpicker form-control" data-style="btn-outline-success" value="<?php echo $row['TempatPenelitian'];?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Ditujukan Kepada :</label>
											<input name="KepadaYth" type="text" class="selectpicker form-control" data-style="btn-outline-success" value="<?php echo $row['TempatPenelitian'];?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="Keperluan">Keperluan :</label>
											<select name="Keperluan" class="custom-select form-control" required="true" autocomplete="off">
												<?php
													$query_student = mysqli_query($conn,"select * from tblpengajuan where kti_id = '$get_id'")or die(mysqli_error());
													$row_student = mysqli_fetch_array($query_student);
													
												 ?>
												<option value="<?php echo $row_student['Keperluan']; ?>"><?php echo $row_student['Keperluan']; ?></option>
												<?php
												$sql = "SELECT Keperluan FROM tblkeperluan";
												$query = $dbh->prepare($sql);
												$query->execute();
												$results = $query->fetchAll(PDO::FETCH_OBJ);

												if ($query->rowCount() > 0) {
													foreach ($results as $result) {
														$leaveType = htmlentities($result->Keperluan);
														echo "<option value='$leaveType'>$leaveType</option>";
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b>Applied Date</b></label>
											<input type="text" class="selectpicker form-control" data-style="btn-outline-success" readonly value="<?php echo $row['PostingDate'];?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="update" id="update" data-toggle="modal">Update</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>