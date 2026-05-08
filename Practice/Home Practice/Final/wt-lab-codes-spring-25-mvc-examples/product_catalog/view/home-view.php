<?php
session_start();

$products = [];
$count = 0;
if (isset($_SESSION['products_list'])) {
	$products = $_SESSION['products_list'];
	$count = count($products);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home - Products</title>
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
	<p>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>!</p>
	<p><a href="add-product-view.php">Add product</a></p>
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Created</th>
		</tr>
		<?php for ($i = 0; $i < $count; $i++): ?>
			<tr>
				<td><?php echo htmlspecialchars($products[$i]['id']); ?></td>
				<td><?php echo htmlspecialchars($products[$i]['name']); ?></td>
				<td><?php echo htmlspecialchars($products[$i]['description']); ?></td>
				<td><?php echo htmlspecialchars($products[$i]['price']); ?></td>
				<td><?php echo htmlspecialchars($products[$i]['created_at']); ?></td>
			</tr>
		<?php endfor; ?>
	</table>
</body>

</html>