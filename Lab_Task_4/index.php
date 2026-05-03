<?php
include "config.php";

$success = $error = "";

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body>

<h2>Student Records</h2>

<a href="add.php">Add New Student</a>
<br><br>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Registration Number</th>
        <th>Department</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["registration_no"] . "</td>";
            echo "<td>" . $row["department"] . "</td>";
            echo "<td>";
            echo "<a href='edit.php?id=" . $row["id"] . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . $row["id"] . "'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }

    } else {
        echo "<tr>";
        echo "<td colspan='5'>No student records found.</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>