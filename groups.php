<?php
session_start();

require 'php/get_groups.php';

$username = $_SESSION['username'];
$groups = $_SESSION['groups'];
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
	<div id="container">
		<h1>Silly Manager <small>logged in as <i><?php echo $username; ?></i></small></h1>
		<div id="groups">
			<?php
            foreach ($groups as $group) {
                echo '<button class="btn btn-primary">'.$group['groupname'].'</button>';
                echo '<br>';
            }
            ?>
			<button id="btn-showform" class="btn btn-default"> + </button>
		</div>
		<div class="forms hidden-start">
			<form method="post" id="form-group" class="form-horizontal text-center">
				<div class="form-group">
					<input type="text" class="form-control" name="groupname" placeholder="Group name">
				</div>
				<div class="form-group">
					<button type="button" id="btn-hideform" class="btn btn-md btn-primary">Back</button>
					<button id="btn-creategroup" class="btn btn-md btn-success">Create</button>
				</div>
				<div class="form-group">
					<div class="alert alert-danger hidden-start"></div>
					<div class="alert alert-success hidden-start"></div>
				</div>
			</form>
		</form>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/groups.js"></script>
</body>

</html>
