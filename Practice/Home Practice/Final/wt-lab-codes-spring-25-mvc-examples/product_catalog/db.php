<?php
// DB connection for Product Catalog example
class DBConnection
{
	private $hostname = 'localhost';
	private $db_username = 'root';
	private $db_password = '';
	private $db_name = 'wt';

	public function connect()
	{
		$conn = new mysqli($this->hostname, $this->db_username, $this->db_password, $this->db_name);
		if ($conn->connect_error) {
			die("DB connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
}
