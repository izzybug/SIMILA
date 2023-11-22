<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
    $result = mysqli_query($conn, "SELECT * FROM daftar_istilah_medis WHERE id = $_GET[id]");
    $data = mysqli_fetch_array($result);
	if(isset($_POST['proses'])){
        $sql="update daftar_istilah_medis set 
        istilah_medis = '$_POST[istilah_medis]',
        pembentukan_istilah_medis = '$_POST[pembentukan_istilah_medis]',
        arti = '$_POST[arti]'
        where id = '$_POST[id]'";
        mysqli_query($conn,$sql);
    
    
        echo "<script>alert('Data telah diiubah')</script>";
        echo "<meta http-equiv=refresh content=1;URL='termin.php'>";
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
									<li class="breadcrumb-item active" aria-current="page">Student Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Data</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
                                <div class="row">
                                    <div class="col-md-12">
                                            <form action="" method="post">
                                            <div class="">
                                                <label>ISTILAH MEDIS :</label>
                                                <input type="text" name="istilah_medis" class="form-control" value="<?php echo $data['istilah_medis']; ?>">
                                                <input type="hidden" value="<?=$_GET['id']?>" name="id">
                                            </div>
                                            <br><br>
                                            <div class="">
                                                <label>PEMBENTUKAN ISTILAH MEDIS :</label>
                                                <input type="text" name="pembentukan_istilah_medis" class="form-control" value="<?php echo $data['pembentukan_istilah_medis']; ?>">
                                            </div>
                                            <br><br>
                                            <div class="">
                                                <label>ARTI :</label>
                                                <input type="text" name="arti" class="form-control" value="<?php echo $data['arti']; ?>">
                                            </div>
                                            <br>
                                            <input type="submit" class="btn btn-primary" value="Simpan" name="proses">
                                            <a href="termin.php" class="btn btn-secondary">Cancel</a>
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