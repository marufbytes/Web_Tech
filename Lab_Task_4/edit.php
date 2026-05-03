<?php
include "config.php";

$success = $error = "";

$id = $_GET["id"];

$sql = "SELECT * FROM students WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $department = $_POST["department"];

    if (empty($name) || empty($email) || empty($department)) {
        $error = "Please fill all the fields";
    } else {

        $sql = "UPDATE students 
                SET name='$name', email='$email', department='$department'
                WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            $success = "Student record updated successfully";

            $sql = "SELECT * FROM students WHERE id='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student Record</h2>

<form method="post" action="">
    Student Name: 
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

    Email: 
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    Department: 
    <input type="text" name="department" value="<?php echo $row['department']; ?>"><br><br>

    <input type="submit" value="Update Student">
</form>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<a href="index.php">View Student Records</a>

</body>
</html>