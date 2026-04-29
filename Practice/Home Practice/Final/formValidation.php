<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        ...
    }
    ?>

    <form method = "post" action="<?php echo $_SERVER[PHP_SELF];?>">
        <label for="">Name: </label>
        <input type="text" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?> </span>
    </form>

    <?php if ($success) echo <"p class='success'>$success</p>"; ?>

    
</body>
</html>