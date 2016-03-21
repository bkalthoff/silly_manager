<?php
session_start();

require_once('database.php');

$username = $_SESSION['username'];

echo var_dump($_SESSION);

if (isset($username)) {
	$groups = false;

	$database = $_SESSION['database'];

	if (!$database->isConnected()) {
		$database->openConnection();
	}

	$sql = 'SELECT groupname, leader FROM memberships WHERE username = ?';
	$result = $database->executeQuery($sql, array($username));

	$groups = $result;

	$_SESSION['groups'] = $groups;
}

?>
