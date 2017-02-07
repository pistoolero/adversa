<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-03-24
 * Time: 10:43
 */

ob_start();
session_start();

require_once('/../core/helpers/ALL_helpers.php');
// $user = getUser();
require_once('/../templates/header.php');
require_once('/../views/main.php');
require_once('/../templates/footer.php');
ob_end_flush();
?>

