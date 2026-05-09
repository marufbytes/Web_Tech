
<?php

session_start(); 
// Starts session system so data can be stored on server using $_SESSION

include "config.php";

$name = $age = $email = $password = $phone = "";
$nameErr = $ageErr = $emailErr = $passwordErr = $phoneErr = "";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name Validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {

        $name = trim($_POST["name"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    // Age Validation
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {

        $age = trim($_POST["age"]);

        if (!is_numeric($age)) {
            $ageErr = "Age must be numeric";
        }
        elseif ($age < 18 || $age > 40) {
            $ageErr = "Age must be between 18 and 40";
        }
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {

        $email = trim($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }

    // Password Validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {

        $password = $_POST["password"];

        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
        }
    }

    // Phone Validation
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {

        $phone = trim($_POST["phone"]);

        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneErr = "Phone must be exactly 11 digits";
        }
    }

    // Final Validation Check
    if (
        empty($nameErr) &&
        empty($ageErr) &&
        empty($emailErr) &&
        empty($passwordErr) &&
        empty($phoneErr)
    ) {

        $_SESSION["student_name"] = $name;

        // SESSION stores data on server.
        // Here student's name will remain available until session/browser ends.

        setcookie("student_phone", $phone, time() + 3600);

        // COOKIE stores data in browser.
        // Here phone number will remain saved for 1 hour.

        $sql = "INSERT INTO students(name, age, email, password, phone)
                VALUES('$name', '$age', '$email', '$password', '$phone')";

        if ($conn->query($sql) === TRUE) {

            $success = "Registration Successful";

        } else {

            $error = "Database Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="post">

    Name:
    <input type="text" name="name" value="<?php echo $name; ?>">
    <?php echo $nameErr; ?>
    <br><br>

    Age:
    <input type="number" name="age" value="<?php echo $age; ?>">
    <?php echo $ageErr; ?>
    <br><br>

    Email:
    <input type="email" name="email" value="<?php echo $email; ?>">
    <?php echo $emailErr; ?>
    <br><br>

    Password:
    <input type="password" name="password">
    <?php echo $passwordErr; ?>
    <br><br>

    Phone:
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <?php echo $phoneErr; ?>
    <br><br>

    <input type="submit" value="Register">

</form>

<?php

if ($success) {
    echo "<p>$success</p>";
}

if ($error) {
    echo "<p>$error</p>";
}

?>

</body>
</html>