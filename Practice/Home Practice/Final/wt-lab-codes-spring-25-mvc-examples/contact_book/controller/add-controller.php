<?php
session_start();
include_once("../model/ContactModel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = trim($_POST['name'] ?? '');
	$email = trim($_POST['email'] ?? '');
	$phone = trim($_POST['phone'] ?? '');
	if ($name !== '') {
		$m = new ContactModel();
		$m->addContact($name, $email, $phone);
	}
	$m = new ContactModel();
	$_SESSION['contacts_list'] = $m->getAllContacts();
	header('Location: ../view/home-view.php');
	exit;
}

header('Location: ../view/login-view.php');
