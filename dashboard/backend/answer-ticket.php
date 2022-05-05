<?php
    require_once '../../utils/api.php';

    session_start();

    $vatNum = $_GET['vatNum'];
    $nonComplianceCode = $_GET['nonComplianceCode'];
    $answer = $_GET['answer'];

    if (
        (checkChar($vatNum) && checkCharDb($vatNum))
        &&
        (checkChar($nonComplianceCode) && checkCharDb($nonComplianceCode))
        &&
        (checkChar($answer) && checkCharDb($answer))
    ) {
        $response = setTicketAnswer($vatNum, $nonComplianceCode, $answer);

        if ($response["success"]) {
            header("Location: ../tickets.php");
        } else {
            // API request faild
            header("Location: ../tickets.php?error=genericInternalError");
        }
    } else {
        header("Location: ../tickets.php?error=wrongDataInputFormat");
    }
?>