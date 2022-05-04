<?php
    session_start();

    $_SESSION = array();
    session_destroy();

    echo "Successful disconnection, goodbye!";

    header("Location: ../sign-in.html");
?>