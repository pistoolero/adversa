<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-08
 * Time: 14:07
 */

if(isset($_POST['login'])){
    require_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'app/config/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'app/core/login.php';
}