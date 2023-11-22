<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php
// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if (isset($_POST['add_student'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $department = $_POST['department'];
	$dosbing = $_POST['dosbing'];
    $address = $_POST['address'];
    $user_role = $_POST['user_role'];
    $NIM = $_POST['NIM'];
    $status = 1;

    $query = "INSERT INTO tblemployees (FirstName, LastName, EmailId, Password, Gender, Dob, Department, Dosbing, Address, NIM, Status, role, location)
              VALUES ('$fname', '$lname', '$email', '$password', '$gender', '$dob', '$department', '$dosbing','$address', '$NIM', $status, '$user_role', '../vendors/images/logo-poltek.png')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Student Records Successfully Added');</script>";
        echo "<script>window.location = 'student.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
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
									<li class="breadcrumb-item active" aria-current="page">Student Module</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Student Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >First Name :</label>
											<input name="firstname" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Last Name :</label>
											<input name="lastname" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Gender :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Gender</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>NIM :</label>
											<input name="NIM" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date Of Birth :</label>
											<input name="dob" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Department :</label>
											<select name="department" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Department</option>
													<?php
													$query = mysqli_query($conn,"select * from tblprogramstudi");
													while($row = mysqli_fetch_array($query)){
													
													?>
													<option value="<?php echo $row['Prodi']; ?>"><?php echo $row['ProgramStudi']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Dosen Pembimbing :</label>
											<select name="dosbing" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Dosbing</option>
													<?php
													$query = mysqli_query($conn,"select * from tbldosbing");
													while($row = mysqli_fetch_array($query)){
													
													?>
													<option value="<?php echo $row['Dosbing']; ?>"><?php echo $row['Dosbing']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Role</option>
												<option value="Admin">Admin</option>
												<option value="HOD">Dosen</option>
												<option value="Student">Student</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_student" id="add_student" data-toggle="modal">Add&nbsp;Student</button>
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