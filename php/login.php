<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
	require_once('database.php');
	require_once('connect_data.php');

	$database = new Database($db_host, $db_username, $db_password, $db_database);
	$database->openConnection();

	if (!$database->isConnected()) {
		die(header('location: ../connectionerror.html'));
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (strlen($username) == 0 || strlen($password) == 0) {
		$database->closeConnection();
		die(header('location: ../index.php?blank=true'));
	}

	$sql = 'SELECT username, password, salt FROM users WHERE username = ?';
	$result = $database->executeQuery($sql, array($username));

	if ($result != false) {
		$pwhash = $database->passwordHash($password, $result[0]['salt']);

		if ($pwhash === $result[0]['password']) {
			session_start();
			$_SESSION['database'] = $database;
			$_SESSION['username'] = $username;
			header('location: groups.php');
			exit;
		}
	}

	$database->closeConnection();
	die(header('location: ../index.php?failed=true'));
}

?>
