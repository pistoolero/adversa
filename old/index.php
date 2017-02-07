<?php
ob_start();
session_start();
setlocale( LC_ALL, array( 'pl_PL', 'pl_PL.ISO8859-2', 'polish_pol' ) );
require_once 'core'.DIRECTORY_SEPARATOR.'database.php';
require_once 'core'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'ALL_helpers.php';
if(isset($_SESSION['id'])) {
    $user = getUser();
    keepAlive($user['user_id']);
}

require_once("views/main.php");
ob_end_flush();