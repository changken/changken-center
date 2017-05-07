<?php

trait DBconnect {
	private $db;
	private function connect() {
		$dsn = DB_TYPE . ":host=" . DB_HOSTNAME . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

		try {
			$this->db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
		} catch (PDOException $e) {
			echo $e->getCode();
		}
	}
}
