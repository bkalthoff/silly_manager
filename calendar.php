<?php
session_start();

require 'php/get_groups.php';

$username = $_SESSION['username'];
$group_select = $_SESSION['group_select'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/general.css" rel="stylesheet">
	<link href="css/groups.css" rel="stylesheet">

	<title>Silly Manager</title>
</head>

<body>
	<h1>Silly Manager <small>logged in as <i><?php echo $username; ?></i></small></h1>
	<ul class="nav nav-pills">
		<?php
		$mode = 'class="active"';
		foreach ($groups as $group) {
			echo '<li role="presentation" '.$mode.'><a href="#">'.$group['groupname'].'</a></li>';
			$mode = '';
		}
		?>
		<li role="presentation"><a href="#"> + </a></li>
	</ul>

	<script src="js/jquery.min.js"></script>
	<script src="js/calendar.js"></script>
</body>

</html>
