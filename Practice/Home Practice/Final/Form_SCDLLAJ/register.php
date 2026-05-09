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
    <input type="text" name="username" id="username" onkeyup="checkUsername()">
    <span id="usernameMsg"></span>
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <input type="submit" value="Register">

</form>

<p><?php echo $success; ?></p>
<p><?php echo $error; ?></p>

<a href="login.php">Go to Login</a>

<script>
function checkUsername() {

    var username = document.getElementById("username").value;

    // AJAX starts here.
    // It sends username to PHP without reloading page.

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var data = JSON.parse(this.responseText);
            // JSON.parse converts PHP JSON response into JavaScript object.

            if (data.available == true) {
                document.getElementById("usernameMsg").innerHTML = " Username available";
            } else {
                document.getElementById("usernameMsg").innerHTML = " Username already taken";
            }
        }
    };

    xhttp.open("GET", "check_username.php?username=" + username, true);
    xhttp.send();
}
</script>

</body>
</html>