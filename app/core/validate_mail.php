<?php
/**
 * Created by PhpStorm.
 * User: Win 8
 * Date: 2017-02-09
 * Time: 21:18
 */
$user = new User;
$username=strtolower($_POST['usercheck']);
$arr_user = $user->checkMail($username);
if(strlen($username) > 1) {
    if (in_array($username, $arr_user)) {
        echo '<span class="label label-danger" style="padding: .1em;"><i class="fa fa-fw fa-close"></i>Adres e-mail jest zajęty</span>';
        exit;
    } else {
        echo '<span class="label label-success" style="display: inline-block;padding: .1em;"><i class="fa fa-fw fa-check"></i>Adres e-mail jest wolny</span>';
    }
}