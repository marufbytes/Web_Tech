<?php
session_start();
include_once("../model/ContactModel.php");

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
			if ($row['password'] === $password) {
				$_SESSION['username'] = $username;
				$m = new ContactModel();
				$_SESSION['contacts_list'] = $m->getAllContacts();
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

header('Location: ../view/login-view.php');
