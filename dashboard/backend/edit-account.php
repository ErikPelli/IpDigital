<?php
    require_once '../../utils/api.php';

    session_start();

    $job = $_GET['job'];
    $role = $_GET['role'];

    if (
        (checkChar($job) && checkCharDb($job)) 
        &&
        (checkChar($role) && checkCharDb($role))
    ) {
        $response = editAccountSettings($_SESSION['email'], $job, $role);

        if ($response["success"]) {
            header("Location: ../account.php");
        } else {
            // API request faild
            header("Location: ../account.php?error=genericInternalError");
        }
    } else {
        header("Location: ../account.php?error=wrongDataInputFormat");
    }
?>