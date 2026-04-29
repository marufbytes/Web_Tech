<?php

$name = $age = $email = $password = $phone = "";
$nameErr = $ageErr = $emailErr = $passwordErr = $phoneErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Age validation
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

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Password validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password must be filled up";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
        }
    }

    // Phone validation
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone must be filled up";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneErr = "Phone number must be 11 digits";
        }
    }

    // Success message if no errors
    if (empty($nameErr) && empty($ageErr) && empty($emailErr) && empty($passwordErr) && empty($phoneErr)) {
        $success = "Form submitted successfully!";
    }
}

// Function to clean input data
function test_input($data) {
    $data = trim($data);
    return $data;
}

?>

<!-- Display errors and success -->
<?php if ($success) echo "<p class='success'>$success</p>"; ?>
<?php
    echo "<p class='error'>$nameErr</p>";
    echo "<p class='error'>$ageErr</p>";
    echo "<p class='error'>$emailErr</p>";
    echo "<p class='error'>$passwordErr</p>";
    echo "<p class='error'>$phoneErr</p>";
?>