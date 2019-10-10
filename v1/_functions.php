<?php

function curl_json_get_contents($url,$authToken){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-yametrika+json', 'Authorization: OAuth' . $authToken]);
    //curl_setopt($ch, CURLOPT_ENCODING ,'UTF-8');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $obj = curl_exec($ch);
    curl_close($ch);
    return $obj;
}

?> 