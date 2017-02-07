<?php
function ServerAPI($ServerID, $API_KEY, $type) {
    $url = "http://www.1shot1kill.pl/api_serwera?id=".$ServerID."&action=".$type."&pass=".$API_KEY;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   curl_close($ch);
    $json = json_decode($result,true);
    return $json;
}