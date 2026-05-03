<?php
session_start(); // starts the session before any HTML output

$name = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["name"])) {

        $name = trim($_POST["name"]);

        $_SESSION["user_name"] = $name; // stores name in session on the server

        setcookie("user_name_cookie", $name, time() + 3600); // stores name in browser cookie for 1 hour

        $message = "Session and Cookie have been set successfully.";
    } else {
        $message = "Please enter your name.";
    }
}

if (isset($_POST["clear"])) {

    session_unset(); // removes all session variables

    session_destroy(); // destroys the current session

    setcookie("user_name_cookie", "", time() - 3600); // deletes the cookie by setting old expiry time

    $message = "Session and Cookie have been cleared.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Session and Cookie Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        input {
            padding: 8px;
            width: 300px;
            margin: 8px 0;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .box {
            border: 1px solid #ccc;
            padding: 15px;
            width: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h2>PHP Session and Cookie Example</h2>

    <form method="post" action="">
        <label>Enter Your Name:</label><br>
        <input type="text" name="name" placeholder="Enter name"><br>

        <input type="submit" value="Set Session and Cookie">
    </form>

    <form method="post" action="">
        <input type="submit" name="clear" value="Clear Session and Cookie">
    </form>

    <?php
    if (!empty($message)) {
        echo "<p class='success'>$message</p>";
    }
    ?>

    <div class="box">
        <h3>Session Output</h3>

        <?php
        if (isset($_SESSION["user_name"])) {
            echo "<p>Session Name: " . $_SESSION["user_name"] . "</p>"; // shows value stored in session
        } else {
            echo "<p class='error'>No session value found.</p>";
        }
        ?>
    </div>

    <div class="box">
        <h3>Cookie Output</h3>

        <?php
        if (isset($_COOKIE["user_name_cookie"])) {
            echo "<p>Cookie Name: " . $_COOKIE["user_name_cookie"] . "</p>"; // shows value stored in cookie
        } else {
            echo "<p class='error'>No cookie value found. Refresh after setting cookie.</p>";
        }
        ?>
    </div>

</body>
</html>