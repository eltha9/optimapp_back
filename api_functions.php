<?php
$api = parse_ini_file('./config.ini', true);

define("GOOGLE_API",$api['api-key']['google-places']);
define("NAVITIA_API",$api['api-key']['navitia']);
//$curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, link');
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($curl);
// // curl_close($curl);

function curl_places($type,$lat,$lng){

    $coord = $lat.','.$lng;
    $radius = 1500;
    $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$coord."&type=".$type."&radius=".$radius."&key=".GOOGLE_API;
    // echo $url;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    // echo curl_error($curl);
    curl_close($curl);
    
    return json_decode($result);
}

function curl_place_by_id($id){
    $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=".$id."&key=".GOOGLE_API;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    // echo curl_error($curl);
    curl_close($curl);

    return json_decode($result);
}

function curl_journey(){//https://api.navitia.io/v1/coverage/fr-idf/journeys?from=2.419926%3B48.846453&to=2.512540%3B48.891560&

    $url = "https://api.navitia.io/v1/coverage/fr-idf/journeys?from=2.419926%3B48.846453&to=2.512540%3B48.891560&";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, NAVITIA_API . ":". " ");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    // echo curl_error($curl);
    curl_close($curl);

    echo $result;
}