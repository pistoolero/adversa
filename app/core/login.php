<?php
/**
 * Created by PhpStorm.
 * User: Win 8
 * Date: 2017-02-08
 * Time: 00:24
 */

if(isset($_POST['login'])){
    $obj = new User;

    if(strlen($_POST['username']) < 5 || strlen($_POST['password']) < 5){
       echo "blank";
       exit;
    }
    $user = $obj->userData($_POST['username']);
    if($user) {
        extract($user);
    }
    if(strtolower($_POST['username']) != $user['username']){
        echo "username";
    }else{
        if($user['active'] != "active"){
            echo "active";
            exit;
        }
        if (password_verify($_POST['password'], $_POST['password'])) {
            session_start();
            //insertIP($user_id);
            echo "true";
            $_SESSION['id'] = $user_id;
            $_SESSION['sessid'] = session_id();
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $firstname;
            $_SESSION['surname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['register'] = $register;



        } else {
            echo "password";
        }
    }
}