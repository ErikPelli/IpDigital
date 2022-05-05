<?php
    require_once '../../utils/api.php';

    session_start();

    $resultsPerPage = $_GET['resultsPerPage'];
    $pageNumber = $_GET['pageNumber'];
    $search = $_GET['search'];
    
    if (
        (checkChar($resultsPerPage) && checkCharDb($resultsPerPage)) 
        &&
        (checkChar($pageNumber) && checkCharDb($pageNumber))
        &&
        (checkChar($search) && checkCharDb($search))
    ) {
        $response = getNonCompliances($resultsPerPage, $pageNumber, $search);

        if ($response["success"]) {
            header("Location: ../non-compliances.php");
        } else {
            echo 'Errore, non è stato possibile aggiungere la non conformità';
        }
    } else {
        echo "Inserimento dati non corretto";
    }
?>