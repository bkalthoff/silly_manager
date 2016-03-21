<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
	require_once('database.php');

	$database = new Database();

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (strlen($username) == 0 || strlen($password) == 0) {
		header('location: ../index.php?blank=true');
		exit;
	}

	$sql = 'SELECT username, password, salt FROM users WHERE username = ?';
	$result = $database->executeQuery($sql, array($username));

	if ($result != false) {
		$pwhash = $database->passwordHash($password, $result[0]['salt']);

		if ($pwhash === $result[0]['password']) {
			$_SESSION['database'] = $database;
			$_SESSION['username'] = $username;
			header('location: ../groups.php');
			exit;
		}
	}

	header('location: ../index.php?failed=true');
	exit;
}

?>
