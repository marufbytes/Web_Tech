<?php
// $contacts provided by controller
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Contact Book</title>
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
	<h1>Contacts</h1>
	<p><a href="index.php?action=add">Add contact</a></p>
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Created</th>
		</tr>
		<?php foreach ($contacts as $c): ?>
			<tr>
				<td><?php echo htmlspecialchars($c['id']); ?></td>
				<td><?php echo htmlspecialchars($c['name']); ?></td>
				<td><?php echo htmlspecialchars($c['email']); ?></td>
				<td><?php echo htmlspecialchars($c['phone']); ?></td>
				<td><?php echo htmlspecialchars($c['created_at']); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>

</html>