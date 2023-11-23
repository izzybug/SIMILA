<?php include('../includes/config.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Print</title>

	<!-- Custom fonts for this template-->
	<link href="../src/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<style>
		body {
			font-family: Arial, sans-serif;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}

		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}

		h2 {
			text-align: center;
		}
	</style>
</head>
<body>
	<center>
		<h2>DAFTAR ISTILAH MEDIS</h2>
	</center>
	<br>
	<table>
		<tr>
			<th width="1%">No</th>
			<th>Istilah Medis</th>
			<th>Pembentukan Istilan Medis</th>
			<th>Arti</th>
		</tr>
		<?php
		$no = 1;
		$sql = mysqli_query($conn,"select * from daftar_istilah_medis");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['istilah_medis']; ?></td>
			<td><?php echo $data['pembentukan_istilah_medis']; ?></td>
			<td><?php echo $data['arti']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
	<script>
		window.print();
	</script>
</body>
</html>
