<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
	require_once('database.php');

	$database = new Database();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$response = [];
	$invalidCreds = false;

	if (strlen($username) == 0 || strlen($password) == 0) {
		$response = [
			'error' => true,
			'msg' => 'Blank fields.'
		];
	} else {
		$query = 'SELECT password, salt FROM users WHERE username = ?';
		$result = $database->executeQuery($query, array($username));

		if (!empty($result)) {
			$pwhash = $database->passwordHash($password, $result[0]['salt']);

			if ($pwhash === $result[0]['password']) {
				$_SESSION['username'] = $username;
				$response['error'] = false;
			} else {
				$invalidCreds = true;
			}
		} else {
			$invalidCreds = true;
		}
	}

	if ($invalidCreds == true) {
		$response = [
			'error' => true,
			'msg' => 'Invalid credentials.'
		];
	}

	header('Content-Type: application/json');
	echo json_encode($response);
} else {
	$response = [
		'error' => true,
		'msg' => 'Fatal error, missing parameters.'
	];

	header('Content-Type: application/json');
	echo json_encode($response);
}

?>
