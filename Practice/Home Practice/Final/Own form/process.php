<?php

$name=$age=$email=$passwrod=$phone="";
$nameErr=$ageErr=$emailErr=$passwrodErr=$phoneErr="";
$success="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(empty($_POST["name"])){
        $nameErr="Name is reqired";
    }
    else{
        $name=test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z-' ]*$", $name)){
            $nameErr="Name can contain only letters";
        }
    }

    function test_input($data){
        $date = trim($data);
        return $data;
    }

}
?>

<?php 
if ($success) echo "<p class='success'>$success</p>"
?>

<?php
    echo "<p class='error'>$nameErr</p>"
    echo "<p class='error'>$ageErr</p>"
    echo "<p class='error'>$emailErr</p>"
    echo "<p class='error'>$emailErr</p>"
    echo "<p class='error'>$phoneErr</p>"
?>