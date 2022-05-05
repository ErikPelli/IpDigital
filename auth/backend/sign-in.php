<?php
    require_once '../../utils/api.php';

    if (
        isset($_POST['email'])
        &&
        isset($_POST['password'])
    ) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (
            !empty($email)
            &&
            !empty($password)
        ) {
            if (
                (checkChar($email) && checkCharDb($email))
                &&
                (checkChar($password) && checkCharDb($password))
            ) {
                $response = signIn($email, $password);
    
                if ($response["result"]["exists"]) {
                    session_start();
                    $_SESSION['email'] = $email;
    
                    if(!empty($_POST["remember"])) {
                        setcookie("user_login", $_POST["email"], time()+ (10 * 365 * 24 * 60 * 60), "/dashboard/auth");
                    } else {
                        if (isset($_COOKIE["user_login"])) {
                            setcookie("user_login", "");
                        }
                    }
    
                    header("Location: ../../dashboard/index.php");
                } else {
                    // Wrong password
                    header("Location: ../sign-in.php?error=wrongPassword");
                }
            } else {
                // Wrong input data format
                header("Location: ../sign-in.php?error=wrongDataInputFormat");
            }
        }
    }
?>