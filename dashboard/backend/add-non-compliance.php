<?php
    require_once '../../utils/api.php';

    session_start();

    $type = $_GET['type'];
    $lot = $_GET['lot'];
    $origin = $_GET['nc-origin'];
    $details = $_GET['details'];

    if (
        (checkChar($type) && checkCharDb($type)) 
        &&
        (checkChar($lot) && checkCharDb($lot))
        &&
        (checkChar($origin) && checkCharDb($origin))
        &&
        (checkChar($details) && checkCharDb($details))
    ) {
        $response = addNonCompliance($origin, $lot, $type, $details);

        if ($response["success"]) {
            header("Location: ../non-compliances.php");
        } else {
            echo 'Errore, non è stato possibile aggiungere la non conformità';
        }
    } else {
        echo "Inserimento dati non corretto";
    }
?>