<?php
class Api_Controller {

}
class SteamAPI extends Api_Controller{
  public $steamid;
  public $list;

  public function summaries(){
    if(!isset($this->list)){
      $ids = $this->steamid;
    }else{
      $ids = $this->list;
    }
    $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".SteamAPI."&steamids=".$this->list;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);
    $json = json_decode($result,FALSE);
    if(!isset($json->response->players)){
        $json->status = "not_found";
    }
          return $json;
  }
  public function csgo_news(){
    $url = "http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=730&count=3&maxlength=300&format=json";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);
    $json = json_decode($result,FALSE);

          return $json;
     
  }
  public function GetGlobalAchievementPercentagesForCSGO(){
    $url = "http://api.steampowered.com/ISteamUserStats/GetGlobalAchievementPercentagesForApp/v0002/?gameid=730&format=json";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);
    $json = json_decode($result,FALSE);

          return $json;
     
  }
  public function GetFriendList(){
    $url = "http://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key=".SteamAPI."&steamid=".$this->steamid."&relationship=friend";
        $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);
    $json = json_decode($result,FALSE);

          return $json;
     
  }

  public function GetUserStatsForGame(){
    $url = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=".SteamAPI."&steamid=".$this->steamid;
            $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);
    $json = json_decode($result,FALSE);

          return $json;
     
  }



  
} 


function steam_acc($steamid64) {
    $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".SteamAPI."&steamids=".$steamid64;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);
    $json = json_decode($result,FALSE);
    if(!isset($json->response->players)){
    		$json->status = "not_found";
    }
    	    return $json;
}
function faceit_app($nickname) {
    $url = "https://api.faceit.com/api/nicknames/{$nickname}";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);
    $json = json_decode($result,FALSE);
            return $json;
}