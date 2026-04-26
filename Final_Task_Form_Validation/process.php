<?php
session_start();

$name = $email = $username = $password = $confirm = $age = $gender = $course = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $errors[] = "Name is required";
    } else {
        $name = trim($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $errors[] = "Name must contain only letters";
        }
    }

    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email";
        }
    }

    if (empty($_POST["username"])) {
        $errors[] = "Username is required";
    } else {
        $username = $_POST["username"];
        if (strlen($username) < 5) {
            $errors[] = "Username must be at least 5 characters";
        }
    }

    if (empty($_POST["password"])) {
        $errors[] = "Password required";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 6) {
            $errors[] = "Password must be at least 6 characters";
        }
    }

    if ($_POST["password"] != $_POST["confirm_password"]) {
        $errors[] = "Passwords do not match";
    }

    if (empty($_POST["age"])) {
        $errors[] = "Age required";
    } else {
        $age = $_POST["age"];
        if ($age < 18) {
            $errors[] = "Age must be 18 or above";
        }
    }

    if (!isset($_POST["gender"])) {
        $errors[] = "Gender must be selected";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["course"])) {
        $errors[] = "Select a course";
    } else {
        $course = $_POST["course"];
    }

    if (!isset($_POST["terms"])) {
        $errors[] = "You must accept Terms & Conditions";
    }

    if (empty($errors)) {

        $_SESSION["username"] = $username;

        setcookie("username", $username, time() + (86400 * 30), "/");

        echo "<h2>Registration Successful!</h2>";

        echo "<b>Name:</b> $name <br>";
        echo "<b>Email:</b> $email <br>";
        echo "<b>Username:</b> $username <br>";
        echo "<b>Age:</b> $age <br>";
        echo "<b>Gender:</b> $gender <br>";
        echo "<b>Course:</b> $course <br>";

        if (isset($_COOKIE["username"])) {
            echo "<p>Welcome back (cookie): " . $_COOKIE["username"] . "</p>";
        }

        echo "<p>Session user: " . $_SESSION["username"] . "</p>";

    } else {
        echo "<h3>Errors:</h3>";
        foreach ($errors as $e) {
            echo "<p style='color:red;'>$e</p>";
        }
    }
}
?>