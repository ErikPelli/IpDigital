<?php
    require_once '../../utils/api.php';

    session_start();

    $vatNum = $_GET['vatNum'];
    $nonComplianceCode = $_GET['nonComplianceCode'];

    if (
        (checkChar($vatNum) && checkCharDb($vatNum))
        &&
        (checkChar($nonComplianceCode) && checkCharDb($nonComplianceCode))
    ) {
        $response = closeTicket($vatNum, $nonComplianceCode);

        if ($response["success"]) {
            header("Location: ../tickets.php");
        } else {
            echo 'Errore, non è stato possibile chiudere il ticket';
        }
    } else {
        echo "Inserimento dati non corretto";
    }
?>