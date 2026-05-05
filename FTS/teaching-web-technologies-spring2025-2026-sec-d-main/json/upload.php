<?php

    //$user = $_POST['user'];
    //sleep(3);
    //$data = json_decode($user);

    // if($data->username == ""){
    //     echo "Null username, please type first";
    // }else{
    //     echo "Your username is: ".$data->username;
    // }

    $user = ['username'=>'alamin', 'password'=>'123', 'email'=>'alamin@aiub.edu'];

    echo json_encode($user);

?>