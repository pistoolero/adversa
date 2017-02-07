<?php 
function LoginUser($username) {
    include(__DIR__.'/../database.php');
    $query = "SELECT * FROM users WHERE username = :username";
    $guser = $db->Prepare($query);
    $guser -> bindParam(":username", $username, PDO::PARAM_STR);
    $guser -> Execute();
    $fuser = $guser -> fetch(PDO::FETCH_ASSOC);

    return $fuser;
}
function getUser() {
    include(__DIR__.'/../database.php');
    $query = "SELECT * FROM users WHERE user_id = :id";
    /** @var TYPE_NAME $db */
    $guser = $db->Prepare($query);
    $guser -> bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
    $guser -> Execute();
    $fuser = $guser -> fetch();

    return $fuser;
}
function insertIP($userid){
    $ip = $_SERVER['REMOTE_ADDR'];
    //$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/{$ip}/json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);

    if(!isset($result['city']) OR $result['city'] == "" OR $result['city'] == "null"){
        $country = "un";
        $city = "unknown";
    }else{
        $country = $result['country'];
        $city = $result['city'];
    }
    include(__DIR__.'/../database.php');
    $query = "INSERT INTO login_ip(login_date,user_id,ip_address,country,city) VALUES (:login_date,:user_id,:ip_address,:country,:city)";
    $sel = $db -> Prepare($query);
    $sel -> bindParam(":login_date",time(),PDO::PARAM_INT);
    $sel -> bindParam(":user_id",$userid,PDO::PARAM_INT);
    $sel -> bindParam(":ip_address",$ip,PDO::PARAM_STR);
    $sel -> bindParam(":country",$country,PDO::PARAM_STR);
    $sel -> bindParam(":city",$city,PDO::PARAM_STR);
    $sel -> Execute();


}
function check_privilage($privilage = NULL){
    if($privilage == NULL){
	    if(!isset($_SESSION['id'])){
	        return false;
	    }else{
	    	return true;
	    }
    }else{
        include(__DIR__.'/../database.php');
        $query = "SELECT * FROM users WHERE user_id = :id";
        /** @var TYPE_NAME $db */
        $guser = $db->Prepare($query);
        $guser -> bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
        $guser -> Execute();
        $fuser = $guser -> fetch();

        $query2 = "SELECT * FROM groups WHERE group_id = :group_id";
        $guser2 = $db->Prepare($query2);
        $guser2 -> bindParam(":group_id", $fuser['group_id'], PDO::PARAM_INT);
        $guser2 -> Execute();
        $privilages = $guser2 -> fetch();

        if($privilages[$privilage] == true){
        	return true;
        }else{
        	return false;
        }
    }

}