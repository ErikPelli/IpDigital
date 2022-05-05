<?php
    require_once '../../utils/api.php';

    session_start();

    $nonCompliance = $_GET['nonCompliance'];
    $resultComment = $_GET['resultComment'];

    if (
        (checkChar($nonCompliance) && checkCharDb($nonCompliance))
        &&
        (checkChar($resultComment) && checkCharDb($resultComment))
    ) {
        $response = setNonComplianceResultComment($nonCompliance, $resultComment);

        if ($response["success"]) {
            header("Location: ../non-compliances.php");
        } else {
            // API request faild
            header("Location: ../non-compliances.php?error=genericInternalError");
        }
    } else {
        header("Location: ../non-compliances.php?error=wrongDataInputFormat");
    }
?>