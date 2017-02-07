<?php 
session_start();
require_once "/../core/helpers/ALL_helpers.php";
if(isset($_SESSION['steamid'])) {
    require_once "/../core/steamauth/userInfo.php";

    $wziete = get_table_by_id('steam_accounts', 'steamid64', $_SESSION['steamid']);
    $communityid = $_SESSION['steamid'];
//Get the map name
//See if the second number in the steamid (the auth server) is 0 or 1. Odd is 1, even is 0
    $authserver = bcsub($communityid, '76561197960265728') & 1;
//Get the third number of the steamid
    $authid = (bcsub($communityid, '76561197960265728')-$authserver)/2;
//Concatenate the STEAM_ prefix and the first number, which is always 0, as well as colons with the other two numbers
    $steamid = "STEAM_0:$authserver:$authid";
    $uid = $_SESSION['username'];
}
if($wziete){
    echo 'wziete';
   redirect("error",33,'/settings#tab2');

}else{
    $query = "INSERT INTO steam_accounts(user_id,steamid64,steamid) VALUES (:userid,:steam64,:steamid)";
    $add = $db -> Prepare($query);
    $add -> bindParam(':userid',$_SESSION['id'],PDO::PARAM_INT);
    $add -> bindParam(':steam64',$_SESSION['steamid'],PDO::PARAM_STR);
    $add -> bindParam(':steamid',$steamid,PDO::PARAM_STR);
    if($add -> Execute()){
           redirect("success",36,'/settings#tab2');
    }
}