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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>SIMILA Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Histori Kuis</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="wizard-content">
						<div class="card-box mb-30">
							<div class="pd-20">
								<a class="btn btn-primary float-right" style="margin-left: 10px;" href="kuis.php?q=1" ><i class="fa-solid fa-pen-to-square" style="margin-right:5px;"></i> Yuk Kuis</a>
								<h2 class="text-blue h4">HISTORI KUIS</h2>
							</div>
							<div class="pb-20">
								<table class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th class="table-plus">No</th>
											<th class="datatable-nosort">Nama</th>
											<th class="datatable-nosort">Pertanyaan</th>
											<th class="datatable-nosort">Pertanyaan Terjawab</th>
											<th>Benar</th>
											<th>Salah</th>
											<th>Skor</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												$tampil = mysqli_query($conn, "SELECT users_kuis.username, quiz.title, history.level, history.sahi, history.wrong, history.score 
												FROM history
												JOIN quiz ON history.eid = quiz.eid
												JOIN users_kuis ON history.id_users = users_kuis.id
												ORDER BY history.date DESC") or die('Error');
												
												$x = 1;
												while ($row = mysqli_fetch_array($tampil)) {
												?>  

												<td class="table-plus">
													<?php echo $x; ?>
												</td>
												<td><?php echo $row['username']; ?></td>
												<td><?php echo $row['title']; ?></td>
												<td><?php echo $row['level']; ?></td>
												<td><?php echo $row['sahi'];?></td>
												<td><?php echo $row['wrong'];?></td>
												<td><?php echo $row['score'];?></td>
										</tr>
										<?php $x++;}?>
									</tbody>
								</table>
							</div>
						</div>
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