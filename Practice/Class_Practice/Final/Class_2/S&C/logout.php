<?php
session_start();

/* Remove login */
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>

<h2>You are logged out</h2>

<p>
SESSION destroyed.<br>
COOKIE may still exist, but login is gone.
</p>

<a href="login.php">Login Again</a>

</body>
</html>