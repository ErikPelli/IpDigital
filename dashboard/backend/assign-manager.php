<?php
    require_once '../../utils/api.php';

    session_start();

    $nonCompliance = $_GET['nonCompliance'];
    $manager = $_GET['manager'];

    if (
        (checkChar($nonCompliance) && checkCharDb($nonCompliance)) 
        &&
        (checkChar($manager) && checkCharDb($manager)) 
    ) {
        $response = updateNonComplianceManager($nonCompliance, $manager);

        if ($response["success"]) {
            header("Location: ../non-compliance.php?id={$nonCompliance}");
        } else {
            // API request faild
            header("Location: ../non-compliances.php?error=genericInternalError");
        }
    } else {
        header("Location: ../non-compliances.php?error=wrongDataInputFormat");
    }
?>