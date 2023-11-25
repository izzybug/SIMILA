<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php 
if(isset($_POST['proses'])) {
      $name = $_POST['name'];
      $sahi = $_POST['sahi'];
      $wrong = $_POST['wrong'];
      $sql = "UPDATE quiz SET title= '$name' , sahi = '$sahi' , wrong= '$wrong' where eid='$_GET[eid]'";
      mysqli_query($conn,$sql) or die(mysqli_error());
      echo "<script>alert('Data telah diiubah')</script>";
      echo "<meta http-equiv=refresh content=1;URL='list_kuis.php'>";
    }
?>
<body>
    <?php include('includes/navbar.php')?>
    <?php include('includes/right_sidebar.php')?>
    <?php include('includes/left_sidebar.php')?>

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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Kuis</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Edit Kuis</h4>
                            <p class="mb-20"></p>
                        </div>
                    </div>
                    <div class="wizard-content">
                        <div class="row">
                            <div class="col-md-6"></div>
                                <div class="col-md-12"> 
                                    <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM quiz WHERE eid = '$_GET[eid]'");
                                    $data = mysqli_fetch_array($result);
                                    ?>
                                    <form action="" method="POST">
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="name">Judul</label>  
                                                <div class="col-md-12">
                                                    <input id="name" name="name" value="<?php echo $data['title']; ?>" class="form-control input-md" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="sahi">Total Point</label>  
                                                <div class="col-md-12">
                                                    <input id="sahi" name="sahi" value="<?php echo $data['sahi']; ?>"  class="form-control input-md" min="0" type="number">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="wrong">Nilai jika salah semua:</label>  
                                                <div class="col-md-12">
                                                    <input id="wrong" name="wrong" value="<?php echo $data['wrong']; ?>" class="form-control input-md" min="0" type="number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for=""></label>
                                                <div class="col-md-12"> 
                                                     <input type="submit" style="margin-left:45%; color:#ffff; background-color:#B33C69" class="btn" value="Simpan" name="proses">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
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
