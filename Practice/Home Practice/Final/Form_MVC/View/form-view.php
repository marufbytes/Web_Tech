<!DOCTYPE html>
<html>
<body>

<h2>Student Form</h2>

<p>
Welcome:
<b><?php echo $_SESSION["username"]; ?></b>
<!-- SESSION username is displayed here after login. -->
</p>

<!--No need-->
<?php 
$name = $age = $email = $phone = "";
$nameErr = $ageErr = $emailErr = $phoneErr = "";
$success = "";
$error = "";
 ?>

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

    Phone:
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <?php echo $phoneErr; ?>
    <br><br>

    <input type="submit" value="Submit">

</form>

<p><?php echo $success; ?></p>
<p><?php echo $error; ?></p>

<a href="../view/logout.php">Logout</a>

</body>
</html>