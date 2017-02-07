<?php 
function get_title(){
	$base = $_SERVER['HTTP_HOST'];
	$addr = $base;
	if(isset($_GET['nickname'])){
		$addr = $_GET['nickname'].' - '.$base;
	}else if(isset($_GET['page'])){
		switch ($_GET['page']) {
			case 'messages':
				$page = "Wiadomości";
				break;
			case 'settings':
				$page = "Ustawienia";
				break;
			case 'login':
				$page = "Logowanie";
				break;
			case 'register':
				$page = "Rejestracja";
				break;
			case 'team':
				$page = htmlentities($_GET['teamname']);
				break;
			
			default:
				$page = 'undefinied';
				break;
		}
		$addr = $page.' - '.$base;
	}
return $addr;

}