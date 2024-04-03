<?php
session_start();
include('../includes/config.php');
if(isset($_POST['signin']))
{
	$email=$_POST['email'];
	$password=md5($_POST['password']);

	$sql ="SELECT * FROM users where email ='$email' AND password ='$password'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		    if ($row['role'] == 'admin') {
		    	$_SESSION['alogin']=$row['id'];
				$_SESSION['email']=$row['email'];
				$_SESSION['role'] = $row['role'];
			 	echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
		    }
		    // elseif ($row['role'] == 'student') {
		    // 	$_SESSION['alogin']=$row['id'];
			// 	$_SESSION['email']=$row['email'];
			// 	$_SESSION['role'] = $row['role'];
			//  	echo "<script type='text/javascript'> document.location = 'users/index.php'; </script>";
		    // }
		}
	} 
	else{
	  
	  echo "<script>alert('Invalid Details');</script>";

	}

}
// $_SESSION['alogin']=$_POST['username'];
// 	echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
?>

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
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<style>
		.img-fluid {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
		.text-center, .txt {
			color: #B33C69;
		}
		.btn {
			background-color: #B33C69;
			color: #fff;
		}
	</style>
</head>
<body class="login-page" style="background: url('../src/images/cool-background.svg') no-repeat center center fixed; background-size: cover;">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="container py-5 h-100">
					<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col col-xl-10">
						<div class="card" style="border-radius: 1rem;">
						<div class="row g-0">
							<div class="col-md-6 col-lg-5 d-none d-md-block">
							<img src="../src/images/Untitled-1.png"
								alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
							</div>
							<div class="col-md-6 col-lg-7 d-flex align-items-center">
							<div class="card-body p-4 p-lg-5 text-black">

								<form name="signin" method="post">

								<div class="d-flex align-items-center mb-3 pb-1">
									<div class="login-title">
										<h2 class="text-center">Welcome To SIMILA</h2>
									</div>
								</div>

								<h5 class="txt fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

								<div class="form-outline mb-4">
									<!-- <label class="form-label" for="email"></label> -->
									<input type="email" id="email" class="form-control form-control-lg" placeholder="Email address" name="email" id="email"/>
								</div>

								<div class="form-outline mb-4">
									<!-- <label class="form-label" for="form2Example27">Password</label> -->
									<input type="password" class="form-control form-control-lg" placeholder="Password" name="password" id="password"/>
								</div>

								<div class="pt-1 mb-4">
									<button class="btn btn-primary btn-lg btn-block" name="signin" id="signin" type="submit">Login</button>
								</div>

								<!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
								<!-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
									style="color: #393f81;">Register here</a></p> -->
								<br>
								<a href="#!" class="small text-muted">Terms of use.</a>
								<a href="#!" class="small text-muted">Privacy policy</a>
								</form>

							</div>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
		</div>
	</div>
	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
</body>
</html>