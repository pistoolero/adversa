<?php 
	
	session_start();
	require_once("helpers/ALL_helpers.php");
	$clear = new Notification();
	$clear -> user_id = $_SESSION['id'];
	$clear -> clear_unseen();

 ?>