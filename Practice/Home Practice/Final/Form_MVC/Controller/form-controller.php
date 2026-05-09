<?php
session_start();
// SESSION starts so we can check logged-in user.

if (!isset($_SESSION["username"])) {
    header("Location: login-controller.php");
    exit();
}
// If SESSION username does not exist, user cannot access this form.

include_once("../model/user-model.php");

$name = $age = $email = $phone = "";
$nameErr = $ageErr = $emailErr = $phoneErr = "";
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = trim($_POST["name"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters allowed";
        }
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = trim($_POST["age"]);

        if (!is_numeric($age)) {
            $ageErr = "Age must be numeric";
        } elseif ($age < 18 || $age > 40) {
            $ageErr = "Age must be between 18 and 40";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = trim($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = trim($_POST["phone"]);

        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneErr = "Phone must be 11 digits";
        }
    }

    if (
        empty($nameErr) &&
        empty($ageErr) &&
        empty($emailErr) &&
        empty($phoneErr)
    ) {

        $username = $_SESSION["username"];
        // SESSION gives current logged-in username.

        if (updateUserForm($username, $name, $age, $email, $phone)) {

            setcookie("phone", $phone, time() + 3600);
            // COOKIE stores phone number in browser for 1 hour.

            $success = "Form Submitted Successfully";

        } else {
            $error = "Database Error";
        }
    }
}

include("../view/form-view.php");
?>