<?php
session_start();

$name = "";
$message = "";
$messageClass = "";

// Clear session and cookie
if (isset($_POST["clear"])) {

    session_unset();
    session_destroy();

    setcookie("user_name_cookie", "", time() - 3600);

    $message = "Session and Cookie have been cleared.";
    $messageClass = "success";
}

// Set session and cookie
else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["name"])) {

        $name = trim($_POST["name"]);

        $_SESSION["user_name"] = $name;

        setcookie("user_name_cookie", $name, time() + 3600);

        $message = "Session and Cookie have been set successfully.";
        $messageClass = "success";
    } else {

        $message = "Please enter your name.";
        $messageClass = "error";
    }
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

    <!-- Form for setting session and cookie -->
    <form method="post" action="">
        <label>Enter Your Name:</label><br>

        <input type="text" name="name" placeholder="Enter name"><br>

        <input type="submit" value="Set Session and Cookie">
    </form>

    <!-- Form for clearing session and cookie -->
    <form method="post" action="">
        <input type="submit" name="clear" value="Clear Session and Cookie">
    </form>

    <!-- Message output -->
    <?php
    if (!empty($message)) {
        echo "<p class='$messageClass'>$message</p>";
    }
    ?>

    <!-- Session output -->
    <div class="box">
        <h3>Session Output</h3>

        <?php
        if (isset($_SESSION["user_name"])) {
            echo "<p>Session Name: " . $_SESSION["user_name"] . "</p>";
        } else {
            echo "<p class='error'>No session value found.</p>";
        }
        ?>
    </div>

    <!-- Cookie output -->
    <div class="box">
        <h3>Cookie Output</h3>

        <?php if (isset($_COOKIE["user_name_cookie"])) : ?>
            <p>Cookie Name: <?php echo $_COOKIE["user_name_cookie"]; ?></p>
        <?php else : ?>
            <p class="error">No cookie value found. Refresh after setting cookie.</p>
        <?php endif; ?>
    </div>

</body>

</html>