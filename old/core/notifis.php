<?php 
header('Content-type: application/json');
require_once("helpers/ALL_helpers.php");
    $count = new Database();
	$count->id=$_POST['userid'];
	$count->pole2="seen";
	$count->id2 = 0;
	$count->data = false;
    $count->table = 'notifications';
    $count->pole="user_id";
    $not_c = $count->get_table_by_double_statement();
    $count->data = true;
    $count->multi = true;
    $data = $count->get_table_by_double_statement();
    if($not_c > 0){
    	$response['status'] = true;
    	$response['count'] = $not_c;
    	foreach($data as $not){
    		$ago = (time() - $not['sent']) * 1000;
    		$response['ago'] = $ago;
    		if($ago <= 1000){
    			$response['msg'] = $not['content'];
    			$response['new'] = true;
    		}
    	}
    }else{
    	$response['status'] = false;
    }
echo json_encode($response);
 ?>