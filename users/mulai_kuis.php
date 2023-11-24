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
									<li class="breadcrumb-item active" aria-current="page">Kuis</li>
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
						<?php if(@$_GET['q']==2) 
						{
							$result = mysqli_query($conn,"SELECT * FROM `quiz` where eid='$_GET[eid]'") or die('Error');
											$row = mysqli_fetch_array($result);
												$total = $row['total'];
												$eid = $row['eid'];
								echo '<div class="row">
								<div class="col-md-6"></div><div class="col-md-12">   
								<form class="form-horizontal title1" name="form" action="update.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'"  method="POST">
									<fieldset>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"></label>  
											<div class="col-md-12">
												<input id="username" name="username" placeholder="Masukkan Nama Anda" class="form-control input-md" type="text">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-12 control-label" for=""></label>
											<div class="col-md-12"> 
												<input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
											</div>
										</div>
									</fieldset>
								</form></div>';
											}
							?>
						<?php
							if(@$_GET['q']== 'quiz' && @$_GET['step']== 3) 
							{
								$eid=@$_GET['eid'];
								$sn=@$_GET['n'];
								$total=@$_GET['t'];
								$usr=@$_GET['usr'];
								$user=mysqli_query($conn,"SELECT * FROM users_kuis WHERE username='$usr'" )or die('Error');
								$q=mysqli_query($conn,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
								$row = mysqli_fetch_array($user);
								$usr = $row['id'];
								echo '<div class="panel" style="margin:5%">';
								while($row=mysqli_fetch_array($q) )
								{
									$qns=$row['qns'];
									$qid=$row['qid'];
									echo '<b>Pertanyaan &nbsp;'.$sn.'&nbsp;::<br /><br />'.$qns.'</b><br /><br />';
								}
								$q=mysqli_query($conn,"SELECT * FROM options WHERE qid='$qid' " );
								echo '<form action="update.php?q=quiz&step=3&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'&usr='.$usr.'" method="POST"  class="form-horizontal">
								<br />';

								while($row=mysqli_fetch_array($q) )
								{
									$option=$row['option'];
									$optionid=$row['optionid'];
									echo'<input type="radio" name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br /><br />';
								}
								echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
							}

							if(@$_GET['q']== 'result' && @$_GET['eid']) 
							{
								$eid=@$_GET['eid'];
								$usr=@$_GET['usr'];
								$q=mysqli_query($conn,"SELECT * FROM `history` WHERE id_users='$usr' " )or die('Error157');
								echo  '<div class="panel">
								<center><h1 class="title" style="color:#660033">Hasil</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

								while($row=mysqli_fetch_array($q) )
								{
									$s=$row['score'];
									$w=$row['wrong'];
									$r=$row['sahi'];
									$qa=$row['level'];
									echo '<tr style="color:black"><td>Total Pertanyaan</td><td>'.$qa.'</td></tr>
										<tr style="color:#99cc32"><td>Jawaban Benar&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
										<tr style="color:red"><td>Jawaban Salah&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
										<tr style="color:black"><td>Skor&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr> ';
								}
								$q=mysqli_query($conn,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
								while($row=mysqli_fetch_array($q) )
								{
									$s=$row['score'];
									
								}
								echo'<div class="pd-20"><a class="btn btn-primary" href="kuis.php?q=1" > Back</a></div>';
								echo '</table></div>';
							}
						?>
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