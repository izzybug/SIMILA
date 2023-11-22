<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $sql = "DELETE FROM tblpengajuan where kti_id = ".$delete;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Apply deleted Successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'apply_history.php'; </script>";
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

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="title pb-20">
				<h2 class="h3 mb-0">Apply Breakdown</h2>
			</div>
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT kti_id from tblpengajuan";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$empcount=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($empcount);?></div>
								<div class="font-14 text-secondary weight-500">All Applied KTI</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $status=1;
						 $query = mysqli_query($conn,"select * from tblpengajuan where empid = '$session_id' AND Status = '$status'")or die(mysqli_error());
						 $count_reg_staff = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count_reg_staff); ?></div>
								<div class="font-14 text-secondary weight-500">Approved</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $status=0;
						 $query_pend = mysqli_query($conn,"select * from tblpengajuan where empid = '$session_id' AND Status = '$status'")or die(mysqli_error());
						 $count_pending = mysqli_num_rows($query_pend);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_pending); ?></div>
								<div class="font-14 text-secondary weight-500">Pending</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $status=2;
						 $query_reject = mysqli_query($conn,"select * from tblpengajuan where empid = '$session_id' AND Status = '$status'")or die(mysqli_error());
						 $count_reject = mysqli_num_rows($query_reject);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_reject); ?></div>
								<div class="font-14 text-secondary weight-500">Rejected</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL MY APPLY</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">KEPERLUAN</th>
								<th>TANGGAL PENGAJUAN</th>
								<th>HOD STATUS</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

							<?php
		                         $apply_query = mysqli_query($conn,"select * from tblpengajuan where empid = '$session_id'") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($apply_query)) {
		                         $id = $row['kti_id'];
		                             ?>

								<td><?php echo $row['Keperluan']; ?></td>
	                            <td><?php echo $row['PostingDate']; ?></td>
								<td><?php $stats=$row['Status'];;
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
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a title="VIEW" class="dropdown-item" href="view_apply.php?view=<?php echo $row['kti_id'];?>" data-color="#265ed7"><i class="icon-copy dw dw-eye"></i>View</a>
											<?php if ($stats != 1 && $stats != 2) { ?>
                   									<a class="dropdown-item" href="edit_kti.php?edit=<?php echo $row['kti_id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
                							<?php } ?>
											<a class="dropdown-item" href="apply_history.php?delete=<?php echo $row['kti_id'] ?>" data-color="red" ><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>
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