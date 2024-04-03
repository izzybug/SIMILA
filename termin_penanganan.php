<?php include('includess/header.php')?>
<?php include('includess/session.php')?>
<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM daftar_istilah_medis where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'termin.php'; </script>";
	}
}

?>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="src/images/loader_logo/simila.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includess/navbar.php')?>

	<?php include('includess/right_sidebar.php')?>

	<?php include('includess/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="page-header">
				<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>SIMILA Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Halaman Utama</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tindakan Medis</li>
								</ol>
							</nav>
						</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<a class="btn btn-primary float-right" style="margin-left: 10px;" href="print.php?id=2"><i class="fa fa-print"></i> Print</a>
						<h2 class="text-blue h4">Tindakan Medis</h2>
					</div>
				<div class="pb-20">
				<table class="data-table table-bordered table stripe hover ">
						<thead>
							<tr>
								<th class="table-plus">No</th>
								<th>Istilah medis</th>
								<th>Pembentukan Istilah Medis</th>
								<th class="datatable-nosort">Arti</th>
								<th >Kode ICD</th>
								<!-- <th class="datatable-nosort">Opsi</th> -->
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$tampil = mysqli_query($conn, "SELECT * FROM daftar_istilah_penanganan") or die(mysqli_error());
								$x = 1;
								while ($row = mysqli_fetch_array($tampil)) {

								 ?>  

								<td class="table-plus">
									<?php echo $x; ?>
								</td>
								<td><?php echo $row['istilah_medis']; ?></td>
	                            <td><?php echo $row['pembentukan_istilah_medis']; ?></td>
								<td><?php echo $row['arti'];?></td>
								<td><?php echo $row['kode_ICD'];?></td>
								<!-- <td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="ubahdata.php?id=<?php echo $row['id'] ?>&uid=2" ><i class="dw dw-edit2"></i> Edit</a>
											<a class="dropdown-item" href="termin_penanganan.php?delete=<?php echo $row['id'] ?>" data-color="red" ><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td> -->
							</tr>
							<?php $x++;}?>
						</tbody>
					</table>
			   </div>
			</div>
			<?php include('includess/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includess/scripts.php')?>
</body>
</html>