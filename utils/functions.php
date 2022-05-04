<?php
    // Input Data Check
    $ammessi = "abcdefghijklmnopqrstuvwxyz";
    $ammessi .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $ammessi .= "0123456789";
    $ammessi .= "@.";
    $vietate = array("select", "insert", "update", "delete", "drop", "alter", "––", "'");

    // API
    $api_url = "http://46.101.116.238:8080/api/";

    function checkChar($data) {
        global $ammessi;
        $user_ok = true;

        for ($pos=0; $pos < strlen($data) && $user_ok; $pos++) {
            $car = substr($data, $pos, 1);
            if (strpos($ammessi, $car) === false)
                $user_ok = false;
        }

        return $user_ok;
    }
    
    function checkCharDb($data) {
        global $vietate;
        $user_ok = true;

        for ($k=0; $k <= 7 && $user_ok; $k++) {
            if (strpos($vietate[$k], $data) !== false)
                $user_ok = false;
        }

        return $user_ok;
    }

    function apiRequest($type, $path, $jsonData) {
        global $api_url;
        $url = $api_url . $path;
        $content = json_encode($jsonData);
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($content)));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $type);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json_response  = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($json_response, true);

        return $response;
    }

?>