<?php
    require_once '../../utils/api.php';

    session_start();

    $manager = $_GET['manager'];

    if (
        (checkChar($manager) && checkCharDb($manager)) 
    ) {
        $response = ""; // DA FINIRE

        if ($response["success"]) {
            header("Location: ../non-compliance.php");
        } else {
            echo 'Errore, non è stato possibile assegnare un manager';
        }
    } else {
        echo "Inserimento dati non corretto";
    }
?>