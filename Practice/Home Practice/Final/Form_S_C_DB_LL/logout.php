<?php

session_start();

session_destroy();

// SESSION destroyed means login is removed.
// User must login again.

header("Location: login.php");
exit();

?>