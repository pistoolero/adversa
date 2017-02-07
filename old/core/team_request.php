<?php 
session_start();
require_once("helpers/ALL_helpers.php");
vd($_GET);
$var = new User();
$var -> id = $_GET['user'];
$var -> id2 = $_GET['captain'];
$var -> user_id = $var -> id;
$res = $var -> player_profile('userid');
vd($res);
$team = new Database();
$team -> table = 'teams';
$team -> pole = 'team_id';
$team -> data = true;
$team -> id = $_GET['teamid'];
$res2 = $team -> get_table_by_id();
$var -> id2 = $_GET['teamid'];
if($_GET['type'] == "invite"){
	$var ->send_team_request();
		$notify = new Notification;
		$notify -> message = "Użytkownik <strong>{$res['username']}</strong> poprosił o dołączenie do Twojej drużyny.";
		$notify -> user_id = $_GET['captain'];
		$notify -> send_notify();
		redirect("success",36,"/team/{$res2['team_id']}/{$res2['team_name']}");
}
