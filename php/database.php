<?php

class Database {
	private $_host;
	private $_username;
	private $_password;
	private $_database;
	private $conn;

	public function __construct() {
		require('connect_data.php');
		$this->_host = $_host;
		$this->_username = $_username;
		$this->_password = $_password;
		$this->_database = $_database;
	}

	private function getConnection() {
		if (!isset($this->conn)) {
			try {
				$this->conn = new PDO("mysql:host=$this->_host;dbname=$this->_database",
					$this->_username, $this->_password);
			} catch (PDOException $e) {
				header('location: ../connectionerror.html');
			}
		}
		return $this->conn;
	}

	public function executeQuery($query, $param = null) {
		$result = false;
		try {
			$stmt = $this->getConnection()->prepare($query);
			$stmt->execute($param);
			$result = $stmt->fetchAll();
		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "\n query: " . $query;
			die($error);
		}
		return $result;
	}

	public function passwordHash($password, $salt) {
		return hash("SHA512", $salt . $password);
	}

	/*
	public function registerUser($username, $password, $email, $fname, $sname) {
		$sql = "INSERT INTO users VALUES(?, ?, ?, ?, ?, ?)";
		$salt = base64_encode(mcrypt_create_iv(12));
		print_r('SALTY: ' . $salt);
		$result = $this->executeQuery($sql, array($username, $this->passwordHash($password, $salt), $salt, $email, $fname, $sname));

		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	 */
}

?>
