<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-08
 * Time: 14:20
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/app/config/config.php';

class User extends Database
{
    public function __construct()
    {
        $host = $_ENV['db_host'];
        $dbname = $_ENV['db_name'];
        $user = $_ENV['db_user'];
        $pass = $_ENV['db_pass'];
        parent::__construct($host, $dbname, $user, $pass);
    }

    public function userData($username){
        $this->customQuery("SELECT * FROM users WHERE username = ?","SELECT",[[$username,PDO::PARAM_STR]],false);
    }
}