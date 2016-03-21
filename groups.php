<?php
session_start();

require('php/get_groups.php');

$username = $_SESSION['username'];
$groups = $_SESSION['groups'];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/sm.css" rel="stylesheet">
		<script src="bower_components/jquery/dist/jquery.min.js"></script>
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<title>Silly Manager</title>
	</head>
	<body>
		<h1>Silly Manager <small>logged in as <i><?php print $username; ?></i></small></h1>
		<ul class="nav nav-pills">
<?php 
$mode = 'class="active"';
foreach($groups as $group) {
	print '<li role="presentation" ' . $mode . '><a href="#">' . $group['groupname'] . '</a></li>';
	$mode = '';
}
?>
			<li role="presentation"><a href="#"> + </a></li>
		</ul>
	</body>
</html>
