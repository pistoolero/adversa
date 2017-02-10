<?php
/**
 * Created by PhpStorm.
 * User: Win 8
 * Date: 2017-02-09
 * Time: 21:36
 */
if(isset($_POST['register'])) {
    $user = new User;
    $password = $_POST['password'];
    $username = $_POST['username'];
    $password_repeat = $_POST['password_repeat'];
    $mail = $_POST['mail'];
    if(!empty($user->checkUsername($username)['username'])){
        echo "username_taken";
        exit;
    }
    if(!empty($user->checkMail($mail)['mail'])){
        echo "mail_taken";
        exit;
    }
    if(strlen($username) < 4){
        echo "too_short_user";
        exit;
    }
    if(strlen($mail) < 6 || !strpos($mail,"@")){
        echo "wrong_mail";
        exit;
    }

    if(strlen($password) < 6){
        echo "too_short";
        exit;
    }
    if($password != $password_repeat){
        echo "not_same";
        exit;
    }
    $user->register($username, $password, $mail);
    echo "true";
}