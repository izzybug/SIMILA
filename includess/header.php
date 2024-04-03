<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SIMILA</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../vendors/images/logo-poltek.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../vendors/images/logo-poltek.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../vendors/images/logo-poltek.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
	(function() {
		'use strict';
		window.dataLayer = window.dataLayer || [];
		function gtag() {
		dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-119386393-1');
	})();
	</script>
	<style>
		.img-fluid {
			width: 100px;
			height: 350px;
			object-fit: cover;
		}
		.avatar-photo {
			width: 150px; /* Sesuaikan lebar gambar dengan kebutuhan Anda */
			height: 150px; /* Sesuaikan tinggi gambar dengan kebutuhan Anda */
			border-radius: 50%; /* Mengatur sudut gambar menjadi setengah lingkaran */
			object-fit: cover; /* Untuk memastikan gambar tetap berada di dalam lingkaran tanpa terdistorsi */
		}
		.widget-data {
			text-align: center;
		}
		.card-box {
            overflow: hidden;
        }

        .materi-list {
            padding: 10px 0;
        }

        .materi-list li {
            margin-bottom: 10px;
        }

        @media screen and (min-width: 1001px) and (max-width: 1500px) {
            .card-box {
                min-height: 150px;
            }
        }

	</style>

</head>
<?php include('includes/config.php'); ?>