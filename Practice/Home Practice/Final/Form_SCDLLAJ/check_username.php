<?php
include "config.php";

$username = $_GET["username"];
// AJAX sends username here using GET method.

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(["available" => false]);
    // JSON response: username already exists.
} else {
    echo json_encode(["available" => true]);
    // JSON response: username is available.
}
?>