<?php
    require_once 'functions.php';


    function signUp($fiscalcode, $firstname, $lastname, $email, $password) {
        $jsonData = array(
            'fiscalCode' => $fiscalcode,
            'firstName' => $firstname,
            'lastName' => $lastname,
            'email' => $email,
            'password' => $password
        );
        return apiRequest('PUT', 'user', $jsonData);
    }

    function signIn($email, $password) {
        $jsonData = array(
            'email' => $email,
            'password' => $password
        );
        return apiRequest('POST', 'user', $jsonData);
    }

    function getUserData($email) {
        $jsonData = array(
            'email' => $email
        );
        return apiRequest('GET', 'user', $jsonData);
    }

    function getSettingsData($email) {
        $jsonData = array(
            'email' => $email
        );
        return apiRequest('GET', 'settings', $jsonData);
    }

    function editAccountSettings($email, $job, $role) {
        $jsonData = array(
            'email' => $email,
            'job' => $job,
            'role' => $role
        );
        return apiRequest('POST', 'settings', $jsonData);
    }

?>