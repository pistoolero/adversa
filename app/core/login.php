<?php
/**
 * Created by PhpStorm.
 * User: Win 8
 * Date: 2017-02-08
 * Time: 00:24
 */

if(isset($_POST['login'])){
    if($_POST['username'] == "" OR empty($_POST['username']) OR !isset($_POST['username'])){
        // redirect("error","9","/login");
        //echo "false";
    }
    $user = LoginUser($_POST['username']);
    if(!isset($user['username'])){
        $username = "";
    }else{
        extract($user, EXTR_PREFIX_SAME, "db");
    }
    if(strtolower($_POST['username']) != strtolower($username) OR !isset($username) OR empty($username) OR $username==""){
        // redirect("error","4","/login");
        echo "username";
    }else{
        if($active != "active"){
            //redirect("error","6","/login");
            echo "active";
            exit;
        }
        if (password_verify($_POST['password'], $password)) {
            session_start();
            insertIP($user_id);
            echo "true";
            $_SESSION['id'] = $user_id;
            $_SESSION['sessid'] = session_id();
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;
            $_SESSION['register'] = $register;

            //redirect("success","4","/");

        } else {
            //redirect("error","5","/login");
            echo "password";
        }
    }
}