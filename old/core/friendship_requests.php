<?php 
header('Content-type: application/json');
require_once("helpers/ALL_helpers.php");
    $count = new User();
	$count->id=$_POST['userid'];
	$count->data = false;
    $count->status="pending";
    $req_c = $count->get_friendship_requests();
  
    if($req_c > 0){
    	$response['status'] = true;
    	$response['count'] = $req_c;

    }else{
    	$response['status'] = false;
    }
echo json_encode($response);
 ?>