<?php

include "config.php";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {

        $error = "Please fill all fields";

    } else {

        $sql = "INSERT INTO users(username, password)
                VALUES('$username', '$password')";

        if ($conn->query($sql) === TRUE) {

            $success = "Registration Successful";

        } else {

            $error = "Database Error";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>User Registration</h2>

<form method="post">

    Username:
    <input type="text" name="username"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <input type="submit" value="Register">

</form>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<a href="login.php">Go to Login</a>

</body>
</html>