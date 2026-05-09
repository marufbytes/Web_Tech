<?php
session_start();
// SESSION starts so current login session can be removed.

session_destroy();
// SESSION destroyed means login proof is removed.

header("Location: ../controller/login-controller.php");
exit();
?>