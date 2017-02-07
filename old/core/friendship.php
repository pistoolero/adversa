<?php 
session_start();
require_once("helpers/ALL_helpers.php");
$var = new User;
$var -> id = $_GET['player'];
$var -> id2 = $_GET['friend'];

if($_GET['action'] == "add"){
	$var ->send_friend_request();
		$notify = new Notification;
		$notify -> message = "Otrzymałeś zaproszenie do znajomych od <strong>{$_GET['sname']}</strong>.";
		$notify -> user_id = $var -> id2;
		$notify -> send_notify();
		redirect("success",36,"/players/{$_GET['fname']}");
}
