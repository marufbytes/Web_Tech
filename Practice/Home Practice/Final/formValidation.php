<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>

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
    <h2>Registration Form</h2>
    
    <?php
    $name = $age =$email = $password =$phone = "";
    $nameErr=$ageErr=$emailErr=$passwordErr=$phoneErr="";
    $success="";

    if(empty($_POST["name"])){
        $nameErr="Name is required";
    }
    else{
        $name=test_input($_POST[name]){
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
                $nameErr="Only letters and white space allowed";
            }
        }
    }

    if(empty($_POST["age"])){
        $ageErr = "Age is required";
    }
    else{
        $age= test_input($_POST["age"]);
        if(!is_numeric($age)){
            $ageErr= "Age must be a number";
        }
        elseif($age>=100 || age<10){
            $ageErr= "Must be betewee 10 to 100"
        }
    }

    if(empty($_POST["email"])){
        $emailErr="Email is required";
    }
    else{
        $email = test_input($)
    }

    ?>
    
</body>
</html>