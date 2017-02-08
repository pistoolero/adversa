<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-08
 * Time: 13:36
 */
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$_GET['page'] = generateRandomString(4).'-'.md5('403').'-'.generateRandomString(4);
require_once $_SERVER['DOCUMENT_ROOT'].'/index.php';
