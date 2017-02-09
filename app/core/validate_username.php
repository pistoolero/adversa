<?php
/**
 * Created by PhpStorm.
 * User: Win 8
 * Date: 2017-02-09
 * Time: 21:17
 */
$user = new User;
$username=strtolower($_POST['usercheck']);
$arr_user = $user->checkUsername($username);
$arr_user = $arr_user['username'];
if(strlen($arr_user) < 1){
    echo "Wolne!";
}else{
    echo "Zajęte!";
}
//if(strlen($username) > 1) {
//    if (in_array($username, $arr_user)) {
//        echo '<span class="label label-danger" style="padding: .1em;"><i class="fa fa-fw fa-close"></i>Nazwa użytkownika jest zajęta</span>';
//        exit;
//    } else if (preg_match("/^[a-zA-Z1-9]+$/", $username)) {
//        echo '<span class="label label-success" style="display: inline-block;padding: .1em;"><i class="fa fa-fw fa-check"></i>Nazwa użytkownika jest wolna</span>';
//    }
//}