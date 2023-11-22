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
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tambah Kuis</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Tambah Kuis</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
                        <?php
                            if(@$_GET['q']== 4 && !(@$_GET['step']) ) 
                            {
                                echo '<div class="row">
                                <div class="col-md-6"></div><div class="col-md-12">   
                                <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="name"></label>  
                                            <div class="col-md-12">
                                                <input id="name" name="name" placeholder="Masukkan tema latihan soal" class="form-control input-md" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="total"></label>  
                                            <div class="col-md-12">
                                                <input id="total" name="total" placeholder="Total Pertanyaan" class="form-control input-md" type="number">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="right"></label>  
                                            <div class="col-md-12">
                                                <input id="right" name="right" placeholder="Nilai satu Pertanyaan" class="form-control input-md" min="0" type="number">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="wrong"></label>  
                                            <div class="col-md-12">
                                                <input id="wrong" name="wrong" placeholder="Nilai jika salah semua" class="form-control input-md" min="0" type="number">
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
                            if(@$_GET['q']==4 && @$_GET['step']==2 ) 
                            {
                                echo ' 
                                <div class="row">
                                <div class="col-md-6"></div><div class="col-md-12"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
                                <fieldset>
                                ';
                        
                                for($i=1;$i<=@$_GET['n'];$i++)
                                {
                                    echo '<b>Pertanyaan No&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
                                                <div class="col-md-12">
                                                    <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Masukkan Pertanyaan No '.$i.' disini..."></textarea>  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="'.$i.'1"></label>  
                                                <div class="col-md-12">
                                                    <input id="'.$i.'1" name="'.$i.'1" placeholder="Masukkan option a" class="form-control input-md" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="'.$i.'2"></label>  
                                                <div class="col-md-12">
                                                    <input id="'.$i.'2" name="'.$i.'2" placeholder="Masukkan option b" class="form-control input-md" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="'.$i.'3"></label>  
                                                <div class="col-md-12">
                                                    <input id="'.$i.'3" name="'.$i.'3" placeholder="Masukkan option c" class="form-control input-md" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="'.$i.'4"></label>  
                                                <div class="col-md-12">
                                                    <input id="'.$i.'4" name="'.$i.'4" placeholder="Masukkan option d" class="form-control input-md" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="'.$i.'5"></label>  
                                                <div class="col-md-12">
                                                    <input id="'.$i.'5" name="'.$i.'5" placeholder="Masukkan option e" class="form-control input-md" type="text">
                                                </div>
                                            </div>
                                            <br />
                                            <b>Correct answer</b>:<br />
                                            <select id="ans'.$i.'" name="ans'.$i.'" placeholder="Pilih jawaban benar " class="form-control input-md" >
                                            <option value="a">Pilih Jawaban benar No '.$i.'</option>
                                            <option value="a"> option a</option>
                                            <option value="b"> option b</option>
                                            <option value="c"> option c</option>
                                            <option value="d"> option d</option>
                                            <option value="e"> option e</option> </select><br /><br />'; 
                                }
                                echo '<div class="form-group">
                                        <label class="col-md-12 control-label" for=""></label>
                                        <div class="col-md-12"> 
                                            <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                        </div>
                                    </div>

                                </fieldset>
                                </form></div>';
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