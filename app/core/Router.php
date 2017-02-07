<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-01-17
 * Time: 16:40
 */
require_once CONFIG_PATH.'config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/core/external/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('');
// HOMEPAGE

//$router->map('GET','/home', function(){
//    require __DIR__.'home.php';
//});

$router->map('GET','/', 'home.php', 'home');
print_r($_GET);