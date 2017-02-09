<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-08
 * Time: 14:07
 */
require_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'app/config/config.php';
if(isset($_POST['login'])){
    require_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'app/core/login.php';
}
if(isset($_POST['checkUsername'])){
    Site::load(CORE_PATH.'validate_username');
}
if(isset($_POST['checkEmail'])){
    Site::load(CORE_PATH.'validate_mail');
}
if(isset($_POST['register'])){
    Site::load(CORE_PATH.'register');
}