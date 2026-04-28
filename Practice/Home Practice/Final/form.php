<!DOCTYPE html>
<html>
<head>
    <title>Form validation</title>
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
    <h2>Registration Form Php validation</h2>

    <?php
    $name=$age=$email=$password=$phone= "";
    $nameErr=$ageErr=$emailErr=$passwordErr=$phoneErr="";
    $success="";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        //name
        if(empty($_POST["name"])){
            $nameErr="Name is required";
        }
        else{
            $name=test_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
                $nameErr="Only letters and white space allowed";
            }
        }

        //age
        if(empty($_POST["age"])){
            $ageErr="Age is required";
        }
        else{
            $age=(test_input($_POST["age"]));
            if(!is_numeric($age)){
                $ageErr="Age must be a number";
            }
            elseif($age<10 || $age>100){
                $ageErr="Age must be between 10 and 100";
            }
        }

        //email
        if(empty($_POST["email"])){
            $emailErr="Email is required";
        }
        else{
            $email=test_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr= "Invalid email";
            }
        }

        //Password
        if(empty($_POST["password"])){
            $passwordErr="Password must be filled up";
        }
        else{
            $password=$_POST["password"];
            if(strlen($password)<8){
                $passwordErr="Password must be at least 8 characters";
            }
        }

        //phone
        if(empty($_POST["phone"])){
            $phoneErr="Phone must be filled up";
        }
        else{
            $phone=test_input($_POST["phone"]);
            if(!preg_match("/^[0-9]{11}$/",$phone)){
                $phoneErr="Phone number must be 11 digits";
            }
        }

        if(empty($nameErr) && empty($ageErr) && empty($emailErr) && empty($passwordErr) && empty($phoneErr)){
            $success="Form submitted successfully!";
        }
    }

    function test_input($data){
        $data=trim($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <label for="">Name: </label><br>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?> </span> <br><br>

        <label for="">Age: </label><br>
        <input type="number" name="age" value="<?php echo $age; ?>" min="10" max="100">
        <span class="error">* <?php echo $ageErr; ?> </span> <br><br>

        <label for="">Email: </label> <br>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?> </span> <br><br>

        <label for="">Password: </label><br>
        <input type="password" name="password">
        <span class="error">* <?php echo $passwordErr; ?> </span> <br><br>

        <label for="">Phone number: </label><br>
        <input type="text" name="phone" value="<?php echo $phone; ?>">
        <span class="error">* <?php echo $phoneErr; ?> </span><br><br>

        <input type="submit" value="Submit">

    </form>

    <?php if ($success) echo "<p class='success'>$success</p>"; ?>

</body>
</html>