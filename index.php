<?php
    session_start();

    if (isset($_SESSION['email'])) {
        header("Location: ./dashboard/index.php");
    } else {
        header("Location: ./auth/sign-in.php");
    }
?>