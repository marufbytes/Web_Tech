<?php
include_once("../Config/db.php");

function registerUser($username, $password) {
    global $conn;

    $sql = "INSERT INTO users(username, password)
            VALUES('$username', '$password')";

    return $conn->query($sql);
}

function loginUser($username, $password) {
    global $conn;

    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'";

    return $conn->query($sql);
}

function updateUserForm($username, $name, $age, $email, $phone) {
    global $conn;

    $sql = "UPDATE users
            SET name='$name',
                age='$age',
                email='$email',
                phone='$phone'
            WHERE username='$username'";

    return $conn->query($sql);
}

function checkUsername($username) {
    global $conn;

    $sql = "SELECT * FROM users
            WHERE username='$username'";

    return $conn->query($sql);
}
?>