<?php
session_start();

/* Session check = security */
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<p>
✅ You can see this page because a SESSION exists.
</p>

<p>
Logged in as (from SESSION):
<b><?php echo $_SESSION["username"]; ?></b>
</p>

<?php
/* Cookie is just extra info */
if (isset($_COOKIE["username"])) {
    echo "<p>Cookie remembers username: " . $_COOKIE["username"] . "</p>";
} else {
    echo "<p>No cookie found.</p>";
}
?>

<br>
<a href="logout.php">Logout</a>

</body>
</html>
``