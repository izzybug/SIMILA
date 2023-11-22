<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php

if (isset($_POST['apply'])) {

    // Periksa apakah pengguna sudah masuk atau belum
    if (!isset($_SESSION['alogin']) || empty($_SESSION['alogin'])) {
        header("Location: ../index.php");
        exit();
    }

    // Pastikan bahwa variabel $empid sudah didefinisikan sebelumnya
    $empid = $_SESSION['alogin'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $NIM = $_POST['NIM'];
    $ProgramStudi = $_POST['ProgramStudi'];
    $Keperluan = $_POST['Keperluan'];
    $JudulProposal = $_POST['JudulProposal'];
    $WaktuPenelitian = $_POST['WaktuPenelitian'];
    $TempatPenelitian = $_POST['TempatPenelitian'];
	$KepadaYth = $_POST['KepadaYth'];
    $PostingDate = date("d F Y");
    $Status = 0;
    $IsRead = 0;

    // Gunakan prepared statement untuk menghindari SQL injection
    try {
        $sql = "INSERT INTO tblpengajuan (FirstName, LastName, NIM, ProgramStudi, Keperluan, JudulProposal, WaktuPenelitian, TempatPenelitian, KepadaYth,PostingDate, Status,  IsRead, empid) 
                VALUES (:FirstName, :LastName, :NIM, :ProgramStudi, :Keperluan, :JudulProposal, :WaktuPenelitian, :TempatPenelitian, :KepadaYth ,:PostingDate, :Status, :IsRead, :empid)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':FirstName', $FirstName, PDO::PARAM_STR);
        $query->bindParam(':LastName', $LastName, PDO::PARAM_STR);
        $query->bindParam(':NIM', $NIM, PDO::PARAM_STR);
        $query->bindParam(':ProgramStudi', $ProgramStudi, PDO::PARAM_STR);
        $query->bindParam(':Keperluan', $Keperluan, PDO::PARAM_STR);
        $query->bindParam(':JudulProposal', $JudulProposal, PDO::PARAM_STR);
        $query->bindParam(':WaktuPenelitian', $WaktuPenelitian, PDO::PARAM_STR);
        $query->bindParam(':TempatPenelitian', $TempatPenelitian, PDO::PARAM_STR);
		$query->bindParam(':KepadaYth', $KepadaYth, PDO::PARAM_STR);
        $query->bindParam(':PostingDate', $PostingDate, PDO::PARAM_STR);
        $query->bindParam(':Status', $Status, PDO::PARAM_INT);
        $query->bindParam(':IsRead', $IsRead, PDO::PARAM_INT);
        $query->bindParam(':empid', $empid, PDO::PARAM_INT);
        $query->execute();

        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<script>alert('Apply Submission was successful.');</script>";
            echo "<script type='text/javascript'> document.location = 'apply_history.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<body>
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

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pb-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>SIPARTI</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Apply for KTI</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div style="margin-left: 50px; margin-right: 50px;" class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Pengajuan KTI</h4></h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from tblemployees where emp_id = '$get_id' ")or die(mysqli_error());
									$new_row = mysqli_fetch_array($query);
									?>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>First Name :</label>
											<input name="FirstName" type="text" class="form-control wizard-required" readonly required="true" autocomplete="off" value="<?php echo $row['FirstName']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Last Name :</label>
											<input name="LastName" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['LastName']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>NIM :</label>
											<input name="NIM" type="text" class="form-control"  readonly required="true" autocomplete="off" maxlength="20" value="<?php echo $row['NIM']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Program Studi :</label>
											<select name="ProgramStudi" class="custom-select form-control" readonly required="true" autocomplete="off">
												<?php
												$query = mysqli_query($conn,"select * from tblprogramstudi");
												$row = mysqli_fetch_array($query)
												?>
												<option value="<?php echo $row['Prodi']; ?>"><?php echo $row['ProgramStudi']; ?></option>
												
											</select>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="Keperluan">Keperluan :</label>
											<select name="Keperluan" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Pilih Keperluan...</option>
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
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="JudulProposal">Judul Penelitian :</label>
											<textarea id="JudulProposal" name="JudulProposal" class="form-control" required maxlength="150" rows="2" autocomplete="off"></textarea>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Waktu Penelitian :</label>
											<input name="WaktuPenelitian" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
										<div class="form-group">
											<label>Tempat Penelitian :</label>
											<input name="TempatPenelitian" type="text" class="form-control" required="true" autocomplete="off">
										</div>
										<div class="form-group">
											<label>Ditujukan Kepada :</label>
											<input name="KepadaYth" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 text-right">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="apply" id="apply" data-toggle="modal">Apply KTI</button>
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