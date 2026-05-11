<?php
include_once("../Model/user-model.php");

$username = $_GET["username"];
// AJAX sends username here through URL using GET.

$result = checkUsername($username);

if ($result->num_rows > 0) {
    echo json_encode(["available" => false]);

} else {
    echo json_encode(["available" => true]);
}
?>