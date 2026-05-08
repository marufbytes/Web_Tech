<?php
session_start();

$contacts = [];
$count = 0;
if (isset($_SESSION['contacts_list'])) {
	$contacts = $_SESSION['contacts_list'];
	$count = count($contacts);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home - Contacts</title>
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
	<p>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>!</p>
	<p><a href="add-contact-view.php">Add contact</a></p>
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Created</th>
		</tr>
		<?php for ($i = 0; $i < $count; $i++): ?>
			<tr>
				<td><?php echo htmlspecialchars($contacts[$i]['id']); ?></td>
				<td><?php echo htmlspecialchars($contacts[$i]['name']); ?></td>
				<td><?php echo htmlspecialchars($contacts[$i]['email']); ?></td>
				<td><?php echo htmlspecialchars($contacts[$i]['phone']); ?></td>
				<td><?php echo htmlspecialchars($contacts[$i]['created_at']); ?></td>
			</tr>
		<?php endfor; ?>
	</table>
</body>

</html>