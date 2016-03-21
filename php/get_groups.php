<?php
session_start();

require_once('database.php');

$username = $_SESSION['username'];

if (isset($username)) {
	$database = new Database();

	$sql = 'SELECT groupname, leader FROM memberships WHERE username = ?';
	$result = $database->executeQuery($sql, array($username));

	$groups = $result;

	$_SESSION['groups'] = $groups;
}

?>
