<?php 
session_start();
require_once("helpers/ALL_helpers.php");
if($_POST['teamname'] == "" OR empty($_POST['teamname']) OR !isset($_POST['teamname']) OR $_POST['tag'] == "" OR empty($_POST['tag']) OR !isset($_POST['tag'])){
	echo "blank";
}else{
	$userid = $_SESSION['id'];
	$team = new Database();
	$team -> teamname = $_POST['teamname'];
	$team -> tag = $_POST['tag'];
	$team -> table = 'teams';
	$team -> pole = 'team_name';
	$team -> pole2 = 'team_tag';
	$team -> id = $team -> teamname;
	$team -> id2 = $team -> tag;
	$team -> logic = "OR";
	$team -> user_id = $userid;
	$result = $team -> get_table_by_double_statement();
	if(strlen($team->tag) > 6){
		echo "too_long";
		exit;
	}
	if(!isset($result['team_id'])){
		echo "true";
		$team -> new_team();
		$notify = new Notification;
		$notify -> message = "Drużyna <strong>{$team->teamname}</strong> została założona! Automatycznie zostałeś jej kapitanem.";
		$notify -> user_id = $team -> user_id;
		$notify -> send_notify();

	}else{
		if(strtolower($team->teamname) == strtolower($result['team_name'])){
			echo "name";
		}else{
			echo "tag";
		}
	}

}