<?php
function checkUsername($username) {
    require(__DIR__."/../database.php");
    $query = "SELECT username FROM users WHERE username = '".$username."'";
    $sql = $db -> Prepare($query);
    $sql -> Execute();
    $result = $sql -> fetch(PDO::FETCH_ASSOC);
    if(! $result['username']) {
        $result['username'] = "";
    }
    return $result;
}