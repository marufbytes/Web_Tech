<!DOCTYPE html>
<html>
<body>

<h2>Register</h2>

<form method="post">

    Username:
    <input type="text" name="username" id="username" onkeyup="checkUsername()">
    <!-- id is used by AJAX JavaScript to get username value instantly. -->

    <span id="msg"></span>
    <!-- AJAX result message will show here. -->

    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <input type="submit" value="Register">

</form>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<a href="../controller/login-controller.php">Login</a>

<script>
function checkUsername() {

    var username = document.getElementById("username").value;
    // AJAX uses id=username to collect current typed value.

    var xhttp = new XMLHttpRequest();
    // AJAX object created; it sends request without page reload.

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            // AJAX request completed and server response is successful.

            var data = JSON.parse(this.responseText);
            // JSON.parse converts JSON text from PHP into JavaScript object.

            if (data.available == true) {
                document.getElementById("msg").innerHTML = " Username Available";
            } else {
                document.getElementById("msg").innerHTML = " Username Already Exists";
            }
        }
    };

    xhttp.open("GET", "../ajax/check-username.php?username=" + username, true);
    // AJAX sends username to check-username.php using GET method.

    xhttp.send();
    // AJAX request is sent to server.
}
</script>

</body>
</html>