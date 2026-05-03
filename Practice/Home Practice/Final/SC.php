<?php
session_start();

$name="";
$message ="";
$messaageClass="";

//clear session and cookie
if(isset($_POST["clear"])){
    session_unset();
    session_destroy();

    setcookie("user_name_cookie","",time()-3600);

    $messaage="session and cookie have been cleared";
    $messaageClass="success";
}

else if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST["name"])){

        $name=trim($_POST["name"]);
        $_SESSION["user_name"]=$name;
        setcookie("user_name_cookie",$name,time()+3600);
        $message="session and cookie have been set successfully";
        $messaageClass="success";
    }

    else{
        $message="please enter your name";
        $messaageClass="error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session and cookie</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        input {
            padding: 8px;
            width: 300px;
            margin: 8px 0;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .box {
            border: 1px solid #ccc;
            padding: 15px;
            width: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h2>PHP SEssion and Cookie Example</h2>

    <form action="" method="post">
        <label for="">Enter your name: </label><br>
        <input type="text" name="name" placeholder="Enter name"><br>
        <input type="submit" value="Set session and cookie"><br>
        <input type="submit" value="Clear session and cookie"><br>
    </form>
    
    <?php
    if(!empty($messaage)){
        echo "<p class='$messageClass'>$message</p>";
    }
    ?>

    <div class="box">
        <h3>Session Output</h3>

        <?php
        if(isset($_SESSION["user_name"])){
            echo "<p> Sesssion name: " .$_SESSION["user_name"]. "</p>";
        }
        else{
            echo "< class='error'>No class found</p>";
        }
        ?>
    </div>
</body>
</html>