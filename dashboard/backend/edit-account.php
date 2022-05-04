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
            echo 'Errore, non è stato possibile modificare i dati dell\'account';
        }
    } else {
        echo "Inserimento dati non corretto";
    }
?>