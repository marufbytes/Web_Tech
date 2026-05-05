<?php
    session_start();
    if(isset($_POST['submit'])){
        $id         = $_REQUEST['id'];
        $username   = $_REQUEST['username'];
        $email      = $_REQUEST['email'];

        if($username == "" || $email == ""){
                echo "null username/email!";
        }else{
           
            $users = $_SESSION['users'];
            foreach ($users as &$u) {
                if($u['id'] == $id){
                    $u['username'] = $username;
                    $u['email'] = $email;
                    break;
                }
            }
            $_SESSION['users'] = $users;
            header('location: ../view/user_list.php');
            
        }
    }else{
        echo "invalid request! please submit form...";
    }

?>