<?php
$host = "localhost";
$username = "silly_manager";
$password = "test123";
$database = "silly_db";

try {
	$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	print "Error: " . $e->getMessage() . "<br/>";
	die();
}

?>
