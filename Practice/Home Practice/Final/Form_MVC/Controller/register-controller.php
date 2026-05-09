<?php
include_once("../model/user-model.php");

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $error = "Please fill all fields";
    } else {
        if (registerUser($username, $password)) {
            $success = "Registration Successful";
        } else {
            $error = "Database Error";
        }
    }
}

include("../view/register-view.php");
?>