<?php
session_start();
if (isset($_SESSION['username'])) {
	header('Location: home-view.php');
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login - Product Catalog</title>
</head>

<body>
	<h1>Login</h1>
	<form method="post" action="../controller/login-controller.php">
		<input type="text" name="username" placeholder="username">
		<input type="password" name="password" placeholder="password">
		<input type="submit" value="Login">
	</form>
	<?php if (isset($_SESSION['error']['login'])) {
		echo $_SESSION['error']['login'];
	} ?>
</body>

</html>