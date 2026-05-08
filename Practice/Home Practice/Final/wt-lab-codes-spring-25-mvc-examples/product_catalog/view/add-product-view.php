<?php
// simple add product form
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add Product</title>
</head>

<body>
	<h1>Add Product</h1>
	<form method="post" action="../controller/add-controller.php">
		<div><label>Name: <input type="text" name="name" required></label></div>
		<div><label>Description: <textarea name="description"></textarea></label></div>
		<div><label>Price: <input type="number" step="0.01" name="price" required></label></div>
		<input type="submit" value="Add">
	</form>
	<p><a href="index.php">Back to Products</a></p>
</body>

</html>