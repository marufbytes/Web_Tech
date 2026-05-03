<?php
include "config.php";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $registration_no = $_POST["registration_no"];
    $department = $_POST["department"];

    if (empty($name) || empty($email) || empty($registration_no) || empty($department)) {
        $error = "Please fill all the fields.";
    } else {
        $sql = "INSERT INTO students (name, email, registration_no, department)
                VALUES ('$name', '$email', '$registration_no', '$department')";

        if ($conn->query($sql) === TRUE) {
            $success = "Student record added successfully.";
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<h2>Add New Student</h2>

<form method="post" action="">
    Student Name: <input type="text" name="name"><br><br>

    Email: <input type="email" name="email"><br><br>

    Registration Number: <input type="text" name="registration_no"><br><br>

    Department: <input type="text" name="department"><br><br>

    <input type="submit" value="Add Student">
</form>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<a href="index.php">View Student Records</a>

</body>
</html>