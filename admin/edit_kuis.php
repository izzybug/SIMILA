<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT * from `exam_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    } else {
        ?>
        <center>Unknown Exam ID</center>
        <style>
            #uni_modal {
                display: none;
            }
        </style>
        <div class="text-right">
            <button class="btn btn-gradient-dark btn-flat"><i class="fa fa-times"></i> Close</button>
        </div>
        <?php
        exit;
    }
}
?>
<?php
	if(isset($_POST['proses'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $passing_score = $_POST['passing_score'];
        $status = $_POST['status'];

        // Update data with the specified ID
        $sql = "UPDATE exam_list SET 
                title = '$title', 
                category_id = '$category_id', 
                description = '$description', 
                passing_score = '$passing_score', 
                status = '$status' 
                WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Data telah diubah')</script>";
            echo "<meta http-equiv=refresh content=1;URL='list_kuis.php'>";
        } else {
            echo "<script>alert('Failed to update data')</script>";
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
                                        <input type="hidden" name="id" value="<?= isset($id) ? $id : ''; ?>">
                                        <div class="form-group">
                                            <label for="title" class="control-label">Title</label>
                                            <input name="title" id="title" type="text" class="form-control rounded-0" value="<?= isset($title) ? $title : ''; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id" class="control-label">Category</label>
                                            <select name="category_id" id="category_id" class="form-control rounded-0 select2" >
                                                <option value="" disabled <?= !isset($category_id) ? "selected" : "" ?>></option>
                                                <?php
                                                $category = $conn->query("SELECT * FROM `category_list` WHERE delete_flag = 0 AND `status` = 1 " . (isset($category_id) ? " OR id = '{$category_id}'" : "") . " ORDER BY `name` ASC");
                                                while ($row = $category->fetch_assoc()) :
                                                ?>
                                                    <option value="<?= $row['id'] ?>" <?= isset($category_id) && $category_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label">Description</label>
                                            <textarea name="description" id="description" rows="3" class="form-control rounded-0 no-resize" ><?= isset($description) ? $description : ''; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="passing_score" class="control-label">Passing Score</label>
                                            <input name="passing_score" id="passing_score" type="number" min="0" class="form-control rounded-0 text-right" value="<?= isset($passing_score) ? $passing_score : 0; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="control-label">Status</label>
                                            <select name="status" id="status" class="custom-select" >
                                                <option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                                                <option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="proses" class="btn btn-primary">Save changes</button>
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