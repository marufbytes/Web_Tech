<?php
require_once __DIR__ . '/../db.php';

class TodoModel
{
	private $conn;

	public function __construct()
	{
		$db = new DBConnection();
		$this->conn = $db->connect();
	}

	// Return all todos as an array
	public function getAllTodos()
	{
		$sql = "SELECT id, title, completed, created_at FROM todos ORDER BY id DESC";
		$result = $this->conn->query($sql);
		$todos = [];
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$todos[] = $row;
			}
		}
		return $todos;
	}

	// Insert a new todo (simple, no prepared statements for clarity)
	public function addTodo($title)
	{
		$titleEscaped = $this->conn->real_escape_string($title);
		$sql = "INSERT INTO todos (title, completed, created_at) VALUES ('$titleEscaped', 0, NOW())";
		$this->conn->query($sql);
	}
}
