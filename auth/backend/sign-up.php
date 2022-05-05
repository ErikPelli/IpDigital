<?php
    require_once '../../utils/api.php';

    if (
        isset($_POST['firstname'])
        &&
        isset($_POST['lastname'])
        &&
        isset($_POST['fiscalcode'])
        &&
        isset($_POST['email'])
        &&
        isset($_POST['password'])
    ) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $fiscalcode = $_POST['fiscalcode'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (
            !empty($firstname)
            &&
            !empty($lastname)
            &&
            !empty($fiscalcode)
            &&
            !empty($email)
            &&
            !empty($password)
        ) {
            if (
                (checkChar($firstname) && checkCharDb($firstname)) 
                &&
                (checkChar($lastname) && checkCharDb($lastname))
                &&
                (checkChar($fiscalcode) && checkCharDb($fiscalcode))
                &&
                (checkChar($email) && checkCharDb($email))
                &&
                (checkChar($password) && checkCharDb($password))
            ) {
                $response = signUp($fiscalcode, $firstname , $lastname, $email, $password);
    
                if ($response["success"]) {
                    session_start();
                    $_SESSION['email'] = $email;
    
                    header("Location: ../../dashboard/index.php");
                } else {
                    // API request faild
                    echo 'Errore nella registrazione dell\'utente';
                }
            } else {
                echo "Inserimento dati non corretto";
            }
        }
    }
?>