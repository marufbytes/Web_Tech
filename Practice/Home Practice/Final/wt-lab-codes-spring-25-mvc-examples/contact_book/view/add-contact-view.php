<?php
// Add contact form
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add Contact</title>
</head>

<body>
	<h1>Add Contact</h1>
	<form method="post" action="../controller/add-controller.php">
		<div><label>Name: <input type="text" name="name" required></label></div>
		<div><label>Email: <input type="email" name="email"></label></div>
		<div><label>Phone: <input type="text" name="phone"></label></div>
		<input type="submit" value="Add">
	</form>
	<p><a href="index.php">Back to Contacts</a></p>
</body>

</html>