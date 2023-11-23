<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM users where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('user deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'users.php'; </script>";
		
	}
}

?>

<body>
	<!-- <div class="pre-loader">
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
	</div> -->

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="title pb-20">
				<h2 class="h3 mb-0">Administrative Breakdown</h2>
			</div>
			<div class="row pb-10">
				<div class="col-xl-4 col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT id from users";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$empcount=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($empcount);?></div>
								<div class="font-14 text-secondary weight-500">Total Pengguna</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ffff"><i class="fa-solid fa-users"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_student = mysqli_query($conn,"select * from users where role = 'Student' ")or die(mysqli_error());
						 $count_reg_student = mysqli_num_rows($query_reg_student);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count_reg_student); ?></div>
								<div class="font-14 text-secondary weight-500">Student</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ffff"><i class="fa-solid fa-user-graduate"></i></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_admin = mysqli_query($conn,"select * from users where role = 'Admin' ")or die(mysqli_error());
						 $count_reg_admin = mysqli_num_rows($query_reg_admin);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_reg_admin); ?></div>
								<div class="font-14 text-secondary weight-500">Administrators</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ffff"><i class="fa-solid fa-users-gear" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<a class="btn btn-baru float-right" href="tambah_user.php" ><i class="fa-solid fa-user-plus"></i> Tambah User</a>
						<h2 class="text-blue h4">All Users</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">NAME</th>
								<th>EMAIL</th>
								<th>POSITION</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
		                         $teacher_query = mysqli_query($conn,"select * from users") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                             ?>

								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['username']?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['role']; ?></td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_users.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
											<a class="dropdown-item" href="users.php?delete=<?php echo $row['id'] ?>"><i class="dw dw-delete-3"></i> Delete</a>
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