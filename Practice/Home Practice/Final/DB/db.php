<?php
include "config.php";// file ta load korsii;

$success = $error="";

if($_SERVER["REQUEST_METHOD"]=="POST")
    {

$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];

if (empty($username)||empty($password)||empty($email))
    {
        $error="Please fill all the field";
    }
   else
    {
        $sql="INSERT INTO registration(username,password,email) VALUES ('$username','$password','$email')";
        if($conn->query($sql)=== TRUE)
            $success="Registration complete";
        else
            {
                $error= "Error" . $conn->error;
            }
        
    
        } 


    }


















?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        Email: <input type="email" name="email"><br><br>
        <input type="submit" value="Register">
    </form>

    <p style="color:green;"><?php echo $success; ?></p>
    <p style="color:red;"><?php echo $error; ?></p>
</body>
</html>
