<?php

    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');

    if(!$con){
        echo "DB connection error!";
    }

    $sql1 = "insert into users values(null, 'Blockchain', 'Block123', 'block@gmail.com')";

    if(mysqli_query($con, $sql1)){
        echo "New user added! <br>";
    }else{
        echo "Not added<br>";
    }

    $sql = "select * from users";
    $result = mysqli_query($con, $sql);
    
    
    for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_assoc($result);
            print_r($row);
            echo "<br>";
    }
    mysqli_close($con);
?>