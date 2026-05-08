<?php
session_start();

$todos_list = [];
$count = 0;
if (isset($_SESSION['todos_list'])) {
	$todos_list = $_SESSION['todos_list'];
	$count = count($todos_list);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home - Simple Todo</title>
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
	<h1>Home</h1>
	<p>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>!</p>
	<p><a href="add-todo-view.php">Add todo</a></p>
	<table>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Completed</th>
			<th>Created</th>
		</tr>
		<?php for ($i = 0; $i < $count; $i++): ?>
			<tr>
				<td><?php echo htmlspecialchars($todos_list[$i]['id']); ?></td>
				<td><?php echo htmlspecialchars($todos_list[$i]['title']); ?></td>
				<td><?php echo $todos_list[$i]['completed'] ? 'Yes' : 'No'; ?></td>
				<td><?php echo htmlspecialchars($todos_list[$i]['created_at']); ?></td>
			</tr>
		<?php endfor; ?>
	</table>
</body>

</html>