<?php 
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/app/config/config.php";
if(isset($_SESSION['id'])){
    session_unset();
    session_destroy();

    Site::redirect("success","2","/");
}
