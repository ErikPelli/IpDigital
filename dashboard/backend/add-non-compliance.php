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
    ) {
        if (!empty($details)) {
            if(checkChar($details) && checkCharDb($details)) {
                $response = addNonCompliance($origin, $lot, $type, $details);
            } else {
                header("Location: ../non-compliances.php?error=wrongDataInputFormat");
            }
        } else {
            $response = addNonCompliance($origin, $lot, $type);
        }

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