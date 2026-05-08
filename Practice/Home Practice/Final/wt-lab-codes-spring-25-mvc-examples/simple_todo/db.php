<?php
// Simple DB connection for Simple Todo app
class DBConnection
{
	private $hostname = 'localhost';
	private $db_username = 'root';
	private $db_password = '';
	private $db_name = 'wt';

	// Return a mysqli connection or die with an error message
	public function connect()
	{
		$conn = new mysqli($this->hostname, $this->db_username, $this->db_password, $this->db_name);
		if ($conn->connect_error) {
			die("DB connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
}
