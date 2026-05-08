<?php
session_start();
include_once("../model/TodoModel.php");

// Procedural login controller using lab4's `users` table (database: wt_b)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = trim($_POST['username']);
		$password = $_POST['password'];

		// connect to unified database (wt)
		$conn = new mysqli('localhost', 'root', '', 'wt');
		if ($conn->connect_error) {
			$_SESSION['error']['login'] = 'DB connection failed';
			header('Location: ../view/login-view.php');
			exit;
		}

		$u = $conn->real_escape_string($username);
		$sql = "SELECT * FROM users WHERE username = '$u' LIMIT 1";
		$result = $conn->query($sql);

		if ($result && $result->num_rows > 0) {
			$row = $result->fetch_assoc();
			// For this teaching example passwords are stored in plain text in lab4
			if ($row['password'] === $password) {
				// login success
				$_SESSION['username'] = $username;
				// load domain data and store in session for the home view
				$m = new TodoModel();
				$_SESSION['todos_list'] = $m->getAllTodos();
				header('Location: ../view/home-view.php');
				exit;
			} else {
				$_SESSION['error']['login'] = 'Invalid password';
				header('Location: ../view/login-view.php');
				exit;
			}
		} else {
			$_SESSION['error']['login'] = 'Invalid username';
			header('Location: ../view/login-view.php');
			exit;
		}
	}
}

// If not POST, redirect to login view
header('Location: ../view/login-view.php');
