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
    if(strlen($password) < 6){
        echo "too_short";
        exit;
    }
    if($password != $password_repeat){
        echo "not_same";
        exit;
    }
    echo "Kappa";
}