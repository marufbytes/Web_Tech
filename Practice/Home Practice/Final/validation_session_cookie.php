<?php
session_start(); // starts a PHP session so we can store user data temporarily on the server

$name = $age = $email = $password = $phone = "";
$nameErr = $ageErr = $emailErr = $passwordErr = $phoneErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = test_input($_POST["age"]);
        if (!is_numeric($age)) {
            $ageErr = "Age must be a number";
        } elseif ($age < 10 || $age > 100) {
            $ageErr = "Age must be between 10 and 100";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format (must contain @)";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneErr = "Phone number must be exactly 11 digits";
        }
    }

    if (empty($nameErr) && empty($ageErr) && empty($emailErr) && empty($passwordErr) && empty($phoneErr)) {
        $success = "Form submitted successfully! All fields are valid.";

        $_SESSION["user_name"] = $name; // stores the user's name in session, available until browser/session ends
        $_SESSION["user_email"] = $email; // stores the user's email in session, useful on other PHP pages

        setcookie("user_phone", $phone, time() + 3600); // stores phone number in browser cookie for 1 hour
    }
}

function test_input($data) {
    $data = trim($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Form Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        input {
            margin: 8px 0;
            padding: 8px;
            width: 320px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Registration Form - PHP Validation</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $name; ?>" >
        <span class="error">* <?php echo $nameErr; ?></span><br><br>

        <label>Age:</label><br>
        <input type="number" name="age" value="<?php echo $age; ?>" min="10" max="100" >
        <span class="error">* <?php echo $ageErr; ?></span><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $email; ?>" >
        <span class="error">* <?php echo $emailErr; ?></span><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" >
        <span class="error">* <?php echo $passwordErr; ?></span><br><br>

        <label>Phone Number (11 digits):</label><br>
        <input type="text" name="phone" maxlength="11" value="<?php echo $phone; ?>" >
        <span class="error">* <?php echo $phoneErr; ?></span><br><br>

        <input type="submit" value="Submit" style="padding: 12px 25px; font-size: 16px;">
    </form>

    <?php if ($success) echo "<p class='success'>$success</p>"; ?>

</body>
</html>