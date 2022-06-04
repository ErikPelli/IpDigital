<?php
    require_once '../../utils/api.php';

    session_start();

    $vatNum = $_GET['vatNum'];
    $shippingCode = $_GET['shippingCode'];
    $ncCode = $_GET['ncCode'];
    $description = $_GET['description'];

    if (
        (checkChar($vatNum) && checkCharDb($vatNum)) 
        &&
        (checkChar($shippingCode) && checkCharDb($shippingCode))
        &&
        (checkChar($ncCode) && checkCharDb($ncCode))
    ) {
        if (!empty($description)) {
            if(checkChar($description) && checkCharDb($description)) {
                $response = addTicket($vatNum, $shippingCode, $ncCode, $description);
            } else {
                header("Location: ../ticket.php?error=wrongDataInputFormat");
            }
        } else {
            $response = addTicket($vatNum, $shippingCode, $ncCode);
        }

        if ($response["success"]) {
            header("Location: ../ticket.php?success=ticketCreated");
        } else {
            // API request faild
            header("Location: ../ticket.php?error=genericInternalError");
        }
    } else {
        header("Location: ../ticket.php?error=wrongDataInputFormat");
    }
?>