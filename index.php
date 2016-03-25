<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/general.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">

		<title>Silly Manager</title>
	</head>
	<body>
		<div id="container">
			<h1>Silly Manager</h1>
			<br>
			<div id="forms">
				<form method="post" id="form-login" class="form-horizontal text-center">
					<div class="form-group form-login">
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<div class="form-group form-login">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group form-login">
						<button type="button" id="btn-swapto-register" class="btn btn-md btn-success">Register</button>
						<button id="btn-login" class="btn btn-md btn-primary">Login</button>
					</div>
					<div class="form-group form-login">
						<div id="error-login" class="alert alert-danger hidden-start">Blank fields.</div>
						<div id="success-register" class="alert alert-success hidden-start"></div>
					</div>
				</form>
				<form method="post" id="form-register" class="form-horizontal text-center">
					<div class="form-group form-register">
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<div class="form-group form-register">
						<input type="text" class="form-control" name="fname" placeholder="Name">
					</div>
					<div class="form-group form-register">
						<input type="text" class="form-control" name="sname" placeholder="Surname">
					</div>
					<div class="form-group form-register">
						<input type="email" class="form-control" name="email" placeholder="E-mail">
					</div>
					<div class="form-group form-register">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group form-register">
						<input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
					</div>
					<div class="form-group form-register">
						<button type="button" id="btn-swapto-login" class="btn btn-md btn-primary">Back</button>
						<button id="btn-register" class="btn btn-md btn-success">Register</button>
					</div>
					<div class="form-group form-register">
						<div id="error-register" class="alert alert-danger hidden-start"></div>
					</div>
				</form>
			</div>
		</div>

		<script src="js/jquery.min.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>
