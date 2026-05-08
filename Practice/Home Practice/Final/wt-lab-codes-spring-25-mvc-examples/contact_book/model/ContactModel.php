<?php
require_once __DIR__ . '/../db.php';

class ContactModel
{
	private $conn;

	public function __construct()
	{
		$db = new DBConnection();
		$this->conn = $db->connect();
	}

	public function getAllContacts()
	{
		$sql = "SELECT id, name, email, phone, created_at FROM contacts ORDER BY id DESC";
		$result = $this->conn->query($sql);
		$list = [];
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}

	public function addContact($name, $email, $phone)
	{
		$n = $this->conn->real_escape_string($name);
		$e = $this->conn->real_escape_string($email);
		$p = $this->conn->real_escape_string($phone);
		$sql = "INSERT INTO contacts (name, email, phone, created_at) VALUES ('$n', '$e', '$p', NOW())";
		$this->conn->query($sql);
	}
}
