<?php

class Database {
	private $db_host;
	private $db_username;
	private $db_password;
	private $db_database;
	private $conn;

	public function __construct($db_host, $db_username, $db_password, $db_database) {
		$this->db_host = $db_host;
		$this->db_username = $db_username;
		$this->db_password = $db_password;
		$this->db_database = $db_database;
	}

	public function openConnection() {
		try {
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", 
				$this->db_username, 
				$this->db_password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Error: " . $e->getMessage() . "<br>";
			die();
			return false;
		}
		return true;
	}

	public function closeConnection() {
		$this->conn = null;
		unset($this->conn);
	}

	public function isConnected() {
		return isset($this->conn);
	}

	private function executeQuery($query, $param = null) {
		try {
			$stmt = $this->conn->prepare($query);
			$stmt->execute($param);
			$result = $stmt->fetchAll();
		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "\n query: " . $query;
			die($error);
		}
	}

	private function passwordHash($password, $salt) {
		return hash("SHA512", $salt . $password);
	}

	public function registerUser($username, $password, $email, $fname, $sname) {
		$sql = "INSERT INTO users VALUES(?, ?, ?, ?, ?, ?)";
		$salt = mcrypt_create_iv(16);
		$result = $this->executeQuery($sql, array($username, passwordHash($password, $salt), $salt, $email, $fname, $sname));

		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function authenticateUser($username, $password) {
		$sql = "SELECT username FROM users WHERE username = ?";
		$result = $this->executeQuery($sql, array($username));

		if (mysql_num_rows($result) > 0) {
			$pwhash = passwordHash($password, $result[0]['salt']);

			if ($pwhash === $result[0]['password']) {
				return true;
			}
		}
		return false;
	}
}


?>
