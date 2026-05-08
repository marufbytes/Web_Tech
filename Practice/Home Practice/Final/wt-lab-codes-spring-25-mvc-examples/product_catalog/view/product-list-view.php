<?php
// $products provided by controller
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Product Catalog</title>
	<style>
		table,
		th,
		td {
			border: 1px solid #ccc;
			border-collapse: collapse;
			padding: 6px;
		}
	</style>
</head>

<body>
	<h1>Products</h1>
	<p><a href="index.php?action=add">Add product</a></p>
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Created</th>
		</tr>
		<?php foreach ($products as $p): ?>
			<tr>
				<td><?php echo htmlspecialchars($p['id']); ?></td>
				<td><?php echo htmlspecialchars($p['name']); ?></td>
				<td><?php echo htmlspecialchars($p['description']); ?></td>
				<td><?php echo htmlspecialchars($p['price']); ?></td>
				<td><?php echo htmlspecialchars($p['created_at']); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>

</html>