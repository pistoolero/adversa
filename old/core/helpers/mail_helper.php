<?php
function checkMail($username) {
    require(__DIR__."/../database.php");
    $query = "SELECT email FROM users WHERE email = '".$username."'";
    $sql = $db -> Prepare($query);
    $sql -> Execute();
    $result = $sql -> fetch(PDO::FETCH_ASSOC);
    if(! $result['email']) {
        $result['email'] = "";
    }

    return $result;
}