<?php
    require_once 'functions.php';


    function signUp($fiscalCode, $firstName, $lastName, $email, $password) {
        $jsonData = array(
            'fiscalCode' => $fiscalCode,
            'firstName' => $firstName,
            'lastName' => $lastName,
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

    function getUsers() {
        $jsonData = array();
        return apiRequest('GET', 'details', $jsonData);
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


    function getNonCompliances($resultsPerPage, $pageNumber) {
        $jsonData = array(
            'resultsPerPage' => $resultsPerPage,
            'pageNumber' => $pageNumber
        );
        return apiRequest('GET', 'noncompliances', $jsonData);
    }

    function getNonComplianceDetails($nonComplianceCode) {
        $jsonData = array(
            'nonCompliance' => $nonComplianceCode
        );
        return apiRequest('GET', 'noncompliance', $jsonData);
    }

    function getNonComplianceTypes() {
        $jsonData = array();
        return apiRequest('PUT', 'noncompliances', $jsonData);
    }

    function getNonComplianceTypeDetails($nc) {
        $nonCompliancesType = getNonComplianceTypes();

        $response = "";
        foreach($nonCompliancesType["result"] as $ncTypeCode) {
            if ($nc["result"]["nonComplianceType"] == $ncTypeCode["code"]) {
                $response = array(
                    "name" => $ncTypeCode["name"],
                    "description" => $ncTypeCode["description"]
                );
            }
        }

        return $response;
    }

    function getNonComplianceManager($nc) {
        $manager = "";
        if (array_key_exists("managerEmail", $nc["result"])) {
            $manager = $nc["result"]["managerEmail"];
        } else {
            $manager = 'Unassigned Manager';
        }

        return $manager;
    }

    function addNonCompliance($nonComplianceOrigin, $shippingLot, $nonComplianceType, $comment) {
        $jsonData = array(
            'nonComplianceOrigin' => $nonComplianceOrigin,
            'nonComplianceType' => $nonComplianceType,
            'shippingLot' => $shippingLot,
            'comment' => $comment
        );
        return apiRequest('PUT', 'noncompliance', $jsonData);
    }

    function getNonComplianceStatus($nc) {
        $status = "";

        switch ($nc["result"]["origin"]) {
            case array_key_exists("result", $nc["result"]):
                $status = "Closed";
                break;
            case array_key_exists("checkEndDate", $nc["result"]):
                $status = "Review";
                break;
            case array_key_exists("analysisEndDate", $nc["result"]):
                $status = "Progress";
                break;
            default:
                $status = "New";
        }

        return $status;
    }

    function getNextNonComplianceStatus($currentStatus) {
        $nextStatus = "";

        switch ($currentStatus) {
            case "New":
                $nextStatus = "Progress";
                break;
            case "Progress":
                $nextStatus = "Review";
                break;
            case "Review":
                $nextStatus = "Closed";
                break;
            default:
                $nextStatus = "Closed";
        }

        return $nextStatus;
    }

    function getApiFormattedStatus($currentStatus) {
        $status = "";

        switch ($currentStatus) {
            case "New":
                $status = "analysys";
                break;
            case "Progress":
                $status = "check";
                break;
            case "Review":
                $status = "result";
                break;
            default:
                $status = "result";
        }

        return $status;
    }

    function updateNonComplianceStatus($nonCompliance, $status) {
        $jsonData = array(
            'nonCompliance' => $nonCompliance,
            'status' => $status
        );
        return apiRequest('POST', 'noncompliance', $jsonData);
    }

    function getLots() {
        $jsonData = array(
            'limit' => false
        );
        return apiRequest('POST', 'details', $jsonData);
    }

?>