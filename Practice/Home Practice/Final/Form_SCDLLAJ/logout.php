<?php
session_start();
// SESSION starts so current login session can be removed.

session_destroy();
// SESSION destroyed means user is logged out.

header("Location: login.php");
exit();
?>