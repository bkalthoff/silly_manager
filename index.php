<?php 
session_start(); 
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/sm.css" rel="stylesheet">

		<title>Silly Manager</title>
	</head>
	<body>
		<h1>Silly Manager</h1>
		<br>
		<div id="login">
			<form method="post" action="php/login.php" class="form-horizontal text-center">
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-md btn-primary">Login</button>
<?php

if ($_GET['blank']) {
	echo '<div class="alert alert-danger fade in">Blank fields.</div>';
} else if ($_GET['failed']) {
	echo '<div class="alert alert-danger fade in">Invalid credentials.</div>';
}

?>
				</div>
			</form>
		</div>
	</body>
</html>
