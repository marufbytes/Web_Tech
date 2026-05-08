<?php
session_start();
include_once("../model/ProductModel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = trim($_POST['name'] ?? '');
	$description = trim($_POST['description'] ?? '');
	$price = floatval($_POST['price'] ?? 0);
	if ($name !== '') {
		$m = new ProductModel();
		$m->addProduct($name, $description, $price);
	}
	$m = new ProductModel();
	$_SESSION['products_list'] = $m->getAllProducts();
	header('Location: ../view/home-view.php');
	exit;
}

header('Location: ../view/login-view.php');
