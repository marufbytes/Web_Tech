<?php
session_start();

/* If already logged in, go to dashboard */
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $remember = isset($_POST["remember"]);

    /* Simple login check */
    if ($user === "admin" && $pass === "1234") {

        // SESSION = login proof (stored on server)
        $_SESSION["username"] = $user;

        // COOKIE = remember username (stored in browser)
        if ($remember) {
            setcookie("username", $user, time() + 86400 * 30, "/");
        }

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Page</h2>

<form method="post">
    Username:
    <input type="text" name="username"
           value="<?php echo $_COOKIE['username'] ?? ''; ?>">
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <label>
        <input type="checkbox" name="remember">
        Remember username (COOKIE)
    </label>
    <br><br>

    <input type="submit" value="Login">
</form>

<?php if ($error) echo "<p>$error</p>"; ?>

<p>Use: <b>admin / 1234</b></p>

</body>
</html>