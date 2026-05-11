<?php
session_start();
// SESSION starts so login data can be stored on server.

include_once("../Model/user-model.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $remember = isset($_POST["remember"]);

    $result = loginUser($username, $password);

    if ($result->num_rows > 0) {

        $_SESSION["username"] = $username;
        // SESSION stores login proof on server.
        // Protected pages check this value.

        if ($remember) {
            setcookie("username", $username, time() + 86400);
            // COOKIE stores username in browser for 1 day.
            // Used for Remember Me auto-fill.
        }

        header("Location: form-controller.php");
        exit();

    } else {
        $error = "Invalid username or password";
    }
}

include("../iew/login-view.php");
?>