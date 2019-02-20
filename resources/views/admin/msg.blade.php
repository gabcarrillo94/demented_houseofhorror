<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<link href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/datatables/css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- //Timepicker -->

<link href="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/extras/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        The credentials you just entered are not correct
      </div>
    <?php endif; ?>

		<h2>Sign In</h2>
		<form action="{{ url('/auth/login') }}" method="post">
			<div class="username">
				<span class="username">Email:</span>
				<input type="text" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>

			<div class="login-w3">
					<input type="button" class="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>

				<div class="footer">
					 <p>© 2017 Demented. All Rights Reserved | Design by  HerdzDesign </p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>
