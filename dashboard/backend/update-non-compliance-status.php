<?php
    require_once '../../utils/api.php';

    session_start();

    $nonCompliance = $_GET['noncompliance'];
    $status = getApiFormattedStatus($_GET['status']);

    if (
        (checkChar($nonCompliance) && checkCharDb($nonCompliance))
        &&
        (checkChar($status) && checkCharDb($status))
    ) {
        $response = updateNonComplianceStatus($nonCompliance, $status);

        if ($response["success"]) {
            header("Location: ../non-compliances.php");
        } else {
            echo 'Errore, non è stato possibile modificare lo stato della non conformità';
        }
    } else {
        echo "Inserimento dati non corretto";
    }
?>