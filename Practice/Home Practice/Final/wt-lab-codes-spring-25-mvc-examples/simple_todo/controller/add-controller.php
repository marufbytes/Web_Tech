<?php
session_start();
include_once("../model/TodoModel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$title = trim($_POST['title'] ?? '');
	if ($title !== '') {
		$m = new TodoModel();
		$m->addTodo($title);
	}
	// refresh session list and redirect to home
	$m = new TodoModel();
	$_SESSION['todos_list'] = $m->getAllTodos();
	header('Location: ../view/home-view.php');
	exit;
}

header('Location: ../view/login-view.php');
