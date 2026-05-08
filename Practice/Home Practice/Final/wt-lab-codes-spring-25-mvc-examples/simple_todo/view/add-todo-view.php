<?php
// Simple form to add a new todo
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add Todo</title>
</head>

<body>
	<h1>Add Todo</h1>
	<form method="post" action="../controller/add-controller.php">
		<label>Title: <input type="text" name="title" required></label>
		<input type="submit" value="Add">
	</form>
	<p><a href="index.php">Back to List</a></p>
</body>

</html>