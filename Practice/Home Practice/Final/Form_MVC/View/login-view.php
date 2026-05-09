<!DOCTYPE html>
<html>
<body>

<h2>Login</h2>

<form method="post">

    Username:
    <input type="text" name="username"
           value="<?php echo $_COOKIE['username'] ?? ''; ?>">
    <!-- COOKIE value auto-fills username if Remember Me was checked. -->

    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <input type="checkbox" name="remember">
    Remember Me
    <!-- If checked, username will be saved in COOKIE. -->

    <br><br>

    <input type="submit" value="Login">

</form>

<p><?php echo $error; ?></p>

<a href="../controller/register-controller.php">Register</a>

</body>
</html>