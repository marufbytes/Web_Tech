<?php
require_once __DIR__ . '/../db.php';

class ProductModel
{
	private $conn;

	public function __construct()
	{
		$db = new DBConnection();
		$this->conn = $db->connect();
	}

	public function getAllProducts()
	{
		$sql = "SELECT id, name, description, price, created_at FROM products ORDER BY id DESC";
		$result = $this->conn->query($sql);
		$items = [];
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$items[] = $row;
			}
		}
		return $items;
	}

	public function addProduct($name, $description, $price)
	{
		$n = $this->conn->real_escape_string($name);
		$d = $this->conn->real_escape_string($description);
		$p = number_format($price, 2, '.', '');
		$sql = "INSERT INTO products (name, description, price, created_at) VALUES ('$n', '$d', $p, NOW())";
		$this->conn->query($sql);
	}
}
