<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-06-26
 * Time: 15:31
 */


/*
 * Connection to localhost database ace
 */
$db = new PDO('mysql:host=localhost;dbname=ace', 'root', '');
$db -> exec("set names utf8");