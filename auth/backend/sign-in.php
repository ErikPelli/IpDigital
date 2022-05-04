<?php
    require_once '../../utils/api.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (
        (checkChar($email) && checkCharDb($email))
        &&
        (checkChar($password) && checkCharDb($password))
    ) {
        $response = signIn($email, $password);

        if ($response["result"]["exists"]) {
            session_start();
            $_SESSION['email'] = $email;

            header("Location: ../../dashboard/index.php");
        } else {
            echo 'Password errata!';
        }
    } else {
        echo "Inserimento dati non corretto";
    }
?>