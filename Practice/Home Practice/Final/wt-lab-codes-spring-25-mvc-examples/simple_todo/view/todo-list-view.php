<?php
// $todos is provided by the controller
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Simple Todo - List</title>
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
	<h1>Todo List</h1>
	<p><a href="index.php?action=add">Add new todo</a></p>
	<table>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Completed</th>
			<th>Created</th>
		</tr>
		<?php foreach ($todos as $t): ?>
			<tr>
				<td><?php echo htmlspecialchars($t['id']); ?></td>
				<td><?php echo htmlspecialchars($t['title']); ?></td>
				<td><?php echo $t['completed'] ? 'Yes' : 'No'; ?></td>
				<td><?php echo htmlspecialchars($t['created_at']); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>

</html>