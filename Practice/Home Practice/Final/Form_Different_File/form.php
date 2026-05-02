<!DOCTYPE html>
<html>
<head>
    <title>Form validation</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<h2>Registration Form Php validation</h2>

<form method="post" action="process.php">
    <label for="">Name: </label><br>
    <input type="text" name="name"><br><br>

    <label for="">Age: </label><br>
    <input type="number" name="age" min="10" max="100"><br><br>

    <label for="">Email: </label><br>
    <input type="email" name="email"><br><br>

    <label for="">Password: </label><br>
    <input type="password" name="password"><br><br>

    <label for="">Phone number: </label><br>
    <input type="text" name="phone"><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>