<?php

class Database {
	private $host;
	private $username;
	private $password;
	private $database;
	private $conn;

	public function __construct($host, $username, $password, $database) {
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
	}

	public function openConnection() {
		try {
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", 
				$this->username, 
				$this->password);
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
		} catch (PDOException $e) {
			print "Error: " . $e->getMessage() . "<br>";
		}
	}

	public function registerUser($username, $password, $email) {

	}

	public function authenticateUser($username, $password) {
		$sql = "SELECT username FROM users WHERE username = ? AND password = ?";
	}
}


?>
