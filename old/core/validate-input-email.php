<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-03-24
 * Time: 12:31
 */
require_once("database.php");
require_once 'helpers'.DIRECTORY_SEPARATOR.'ALL_helpers.php';;
$username=strtolower($_POST['usercheck']);
$arr_user = checkMail($username);
if(strlen($username) > 1) {
    if (in_array($username, $arr_user)) {
        echo '<span class="label label-danger" style="padding: .1em;"><i class="fa fa-fw fa-close"></i>Adres e-mail jest zajęty</span>';
        exit;
    } else {
        echo '<span class="label label-success" style="display: inline-block;padding: .1em;"><i class="fa fa-fw fa-check"></i>Adres e-mail jest wolny</span>';
    }
}