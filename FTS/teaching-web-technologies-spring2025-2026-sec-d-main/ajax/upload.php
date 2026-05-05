<?php

    $username = $_GET['username'];
    sleep(3);
    if($username == ""){
        echo "Null username, please type first";
    }else{
        echo "Your username is: ".$username;
    }

?>