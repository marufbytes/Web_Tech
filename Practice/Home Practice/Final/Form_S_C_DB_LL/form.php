<?php

session_start();
// Starts session so we can check login.

if (!isset($_SESSION["username"])) {

    header("Location: login.php");
    exit();
}
// If session does not exist, user cannot access form.

include "config.php";

$name = $age = $email = $phone = "";

$nameErr = $ageErr = $emailErr = $phoneErr = "";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name Validation
    if (empty($_POST["name"])) {

        $nameErr = "Name is required";

    } else {

        $name = trim($_POST["name"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {

            $nameErr = "Only letters allowed";
        }
    }

    // Age Validation
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

    // Email Validation
    if (empty($_POST["email"])) {

        $emailErr = "Email is required";

    } else {

        $email = trim($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $emailErr = "Invalid Email";
        }
    }

    // Phone Validation
    if (empty($_POST["phone"])) {

        $phoneErr = "Phone is required";

    } else {

        $phone = trim($_POST["phone"]);

        if (!preg_match("/^[0-9]{11}$/", $phone)) {

            $phoneErr = "Phone must be 11 digits";
        }
    }

    // Final Validation
    if (
        empty($nameErr) &&
        empty($ageErr) &&
        empty($emailErr) &&
        empty($phoneErr)
    ) {

        $username = $_SESSION["username"];

        $sql = "UPDATE users
                SET
                name='$name',
                age='$age',
                email='$email',
                phone='$phone'
                WHERE username='$username'";

        if ($conn->query($sql) === TRUE) {

            setcookie("phone", $phone, time() + 3600);

            // COOKIE stores phone number in browser for 1 hour.

            $success = "Form Submitted Successfully";

        } else {

            $error = "Database Error";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Student Form</h2>

<p>
Welcome:
<b><?php echo $_SESSION["username"]; ?></b>
</p>

<form method="post">

    Name:
    <input type="text" name="name"
           value="<?php echo $name; ?>">
    <?php echo $nameErr; ?>
    <br><br>

    Age:
    <input type="number" name="age"
           value="<?php echo $age; ?>">
    <?php echo $ageErr; ?>
    <br><br>

    Email:
    <input type="email" name="email"
           value="<?php echo $email; ?>">
    <?php echo $emailErr; ?>
    <br><br>

    Phone:
    <input type="text" name="phone"
           value="<?php echo $phone; ?>">
    <?php echo $phoneErr; ?>
    <br><br>

    <input type="submit" value="Submit">

</form>

<p><?php echo $success; ?></p>

<p ><?php echo $error; ?></p>

<a href="logout.php">Logout</a>

</body>
</html>