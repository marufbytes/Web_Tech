<?php
include "config.php";

$id = $_GET["id"];

$sql = "DELETE FROM students WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Student record deleted successfully.";
} else {
    echo "Error: " . $conn->error;
}
?>

<br><br>
<a href="index.php">View Student Records</a>