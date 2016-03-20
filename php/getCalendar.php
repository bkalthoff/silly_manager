<?php

class Calendar {
	private $username;
	private $database;

	public function __construct($username, $database) {
		$this->username = $username;
		$this->database = $database;

		if (!$this->database->isConnected()) {
			die('Connection to database lost.');
		}
	}
	
	public function getCalendar() {

	}
}

?>
