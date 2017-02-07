<?php 
session_start();
require "helpers/ALL_helpers.php";
if(isset($_SESSION['id'])){
    session_unset();
    session_destroy();

    redirect("success","2","/");
}
