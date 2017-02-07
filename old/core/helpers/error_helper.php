<?php
function errorControl(){
    include_once "/../../core/error_control.php";
}
function set_error($error){

	setcookie("error",$error,time()+1,"/");

}
function set_success($success){

	setcookie("success",$success,time()+1,"/");
}
function redirect($type="error",$number,$location="/"){
	if($type=="error"){
		set_error($number);
		header("Location: ".$location);
		exit;
	}elseif($type=="success"){
		set_success($number);
		header("Location: ".$location);
		exit;
	}
}