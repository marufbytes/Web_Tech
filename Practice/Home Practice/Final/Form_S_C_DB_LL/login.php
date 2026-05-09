<?php

session_start();
// SESSION starts so login information can be stored on server.

include "config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $remember = isset($_POST["remember"]);

    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $_SESSION["username"] = $username;

        // SESSION stores login proof on server.
        // If session exists, user stays logged in.

        if ($remember) {

            setcookie("username", $username, time() + 86400);

            // COOKIE stores username in browser for 1 day.
            // "Remember Me" keeps username saved.
        }

        header("Location: form.php");
        exit();

    } else {

        $error = "Invalid Username or Password";
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Login</h2>

<form method="post">

    Username:
    <input type="text"
           name="username"
           value="<?php echo $_COOKIE['username'] ?? ''; ?>">
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <input type="checkbox" name="remember">
    Remember Me
    <br><br>

    <input type="submit" value="Login">

</form>

<p>
    <?php echo $error; ?>
</p>

<a href="register.php">New User? Register Here</a>

</body>
</html>