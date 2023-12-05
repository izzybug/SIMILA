<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

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
									<li class="breadcrumb-item"><a href="index.php">Halaman Utama</a></li>
									<li class="breadcrumb-item active" aria-current="page">Kerjakan Kuis</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Yuk Kuis</h4></h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<?php if(@$_GET['q']==1) 
						{
							$result = mysqli_query($conn,"SELECT * FROM `quiz` ORDER BY date DESC") or die('Error');
							echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
							<tr><td><center><b>No</b></center></td><td><center><b>Pertanyaan</b></center></td><td><center><b>Total Pertanyaan</b></center></td><td><center><b>Total Skor</center></b></td><td><center><b>Aksi</b></center></td></tr>';
							$c=1;
							while($row = mysqli_fetch_array($result)) {
								$title = $row['title'];
								$total = $row['total'];
								$sahi = $row['sahi'];
								$eid = $row['eid'];
								echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center><b><a href="mulai_kuis.php?q=2&step=2&eid='.$eid.'&n=1&t='.$total.'" class="btn sub1" style="color:#ffff;margin:0px;background:green"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1">Start</span></a></b></center></td></tr>';
							}
							$c=0;
							echo '</table></div></div>';
						}?>

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