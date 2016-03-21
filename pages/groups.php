<?php
session_start();

require('../php/get_groups.php');

$username = $_SESSION['username'];
$session = $_SESSION;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/sm.css" rel="stylesheet">

		<title>Silly Manager</title>
	</head>
	<body>
		<h1>Silly Manager <small>logged in as <?php print $username; ?></small></h1>
		<?php echo var_dump($session); ?>
		<?php echo session_id(); ?>
	</body>
</html>
