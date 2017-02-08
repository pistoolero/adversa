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
    if(strtolower($_POST['username']) != $user['username']){
        echo "username";
    }else{
        if($active != "active"){
            echo "active";
            exit;
        }
        if (password_verify($_POST['password'], $password)) {
            session_start();
            //insertIP($user_id);
            echo "true";
            $_SESSION['id'] = $user_id;
            $_SESSION['sessid'] = session_id();
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;
            $_SESSION['register'] = $register;



        } else {
            echo "password";
        }
    }
}