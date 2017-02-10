<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-10
 * Time: 16:01
 */
require_once "../config/config.php";
print_r($_GET);
$user = new User;
$id = $user->customQuery("SELECT id FROM users WHERE active = ?","SELECT",[[$_GET['token'],2]]);

if($id){
    $active = "active";
    $update = new User;
    $update->customQuery("UPDATE users SET active = 'active' WHERE id = ?","UPDATE",[[$id['id'],PDO::PARAM_INT]]);
    Site::redirect("success",1);
}else{
    Site::redirect("error",40);
}