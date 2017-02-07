<?php
// GENEROWANIE LOSOWEGO CIĄGU ZNAKÓW
function GRS($length = 32,$special = false) {
  if($special == false){
    $characters = 'qwertyuiopasdfghjklzxcvbnm01234567890QWERTYUIOPASDFGHJKLZXCVBNM';
  }elseif($special == true){
        $characters = 'qwertyuiopasdfghjklzxcvbnm01234567890QWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*';
  }

    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}