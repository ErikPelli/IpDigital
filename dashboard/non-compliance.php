<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: ../auth/sign-in.php");
    }

    require_once '../utils/api.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Non compliance details - ipDigital</title>

    <!-- TABLER (https://github.com/tabler/tabler) -->
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler.min.css">
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img src="../static/logo-white.svg" width="110" height="32" alt="Tabler"
                            class="navbar-brand-image">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(../static/avatars/000m.png)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <?php
                                    $user_data = getUserData($_SESSION['email']);
                                    $settings_data = getSettingsData($_SESSION['email']);
                                    
                                    echo '
                                        <div>' . $user_data["result"]["firstName"] . ' ' . $user_data["result"]["lastName"] . '</div>
                                        <div class="mt-1 small text-muted">' . $settings_data["result"]["role"] . '</div>
                                    ';
                                ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="./account.php" class="dropdown-item">Profile & account</a>
                            <a href="../auth/backend/logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="./non-compliances.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/archive -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-archive" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Non compliance
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./tickets.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/ticket -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-ticket" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="15" y1="5" x2="15" y2="7"></line>
                                            <line x1="15" y1="11" x2="15" y2="13"></line>
                                            <line x1="15" y1="17" x2="15" y2="19"></line>
                                            <path
                                                d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Ticket
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none text-white">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                Non compliance details
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Info about #<?= $_GET['id'] ?></div>
                                <?php
                                    $ncDetails = getNonComplianceDetails($_GET['id']);
                                    $ncTypeDetails = getNonComplianceTypeDetails($ncDetails);
                                    $ncStatus = getNonComplianceStatus($ncDetails);
                                    $ncManager = getNonComplianceManager($ncDetails);
                                ?>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                                        <circle cx="9" cy="10" r="2"></circle>
                                        <line x1="15" y1="8" x2="17" y2="8"></line>
                                        <line x1="15" y1="12" x2="17" y2="12"></line>
                                        <line x1="7" y1="16" x2="17" y2="16"></line>
                                    </svg>
                                    Name: <strong><?= $ncTypeDetails["name"] ?></strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M9 17h6"></path>
                                        <path d="M9 13h6"></path>
                                    </svg>
                                    Description: <strong><?= $ncTypeDetails["description"] ?></strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-details" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
                                        <path d="M12 3v16"></path>
                                    </svg>
                                    Details: <strong><?= $ncDetails["result"]["comment"] ?></strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                    Manager: <strong><?= $ncManager ?></strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="11" r="3"></circle>
                                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                    </svg>
                                    Origin: <strong><?= $ncDetails["result"]["origin"] ?></strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notes" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="5" y="3" width="14" height="18" rx="2" />
                                        <line x1="9" y1="7" x2="15" y2="7" />
                                        <line x1="9" y1="11" x2="15" y2="11" />
                                        <line x1="9" y1="15" x2="13" y2="15" />
                                    </svg>
                                    Type: <strong><?= $ncDetails["result"]["nonComplianceType"] ?></strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                        <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                        <line x1="12" y1="12" x2="12" y2="21"></line>
                                        <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                        <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                                    </svg>
                                    Lot: <strong><?= $ncDetails["result"]["shippingLot"] ?></strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                        <path d="M9 17v-5"></path>
                                        <path d="M12 17v-1"></path>
                                        <path d="M15 17v-3"></path>
                                    </svg>
                                    Status: <strong><?= $ncStatus ?></strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                        <line x1="16" y1="3" x2="16" y2="7"></line>
                                        <line x1="8" y1="3" x2="8" y2="7"></line>
                                        <line x1="4" y1="11" x2="20" y2="11"></line>
                                        <line x1="10" y1="16" x2="14" y2="16"></line>
                                        <line x1="12" y1="14" x2="12" y2="18"></line>
                                    </svg>
                                    Creation date: <strong><?= $ncDetails["result"]["nonComplianceDate"] ?></strong>
                                </div>
                                <?php
                                    if ($ncStatus === "Closed") {
                                        echo '
                                            <div class="mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"></path>
                                                    <circle cx="18" cy="18" r="4"></circle>
                                                    <path d="M15 3v4"></path>
                                                    <path d="M7 3v4"></path>
                                                    <path d="M3 11h16"></path>
                                                    <path d="M18 16.496v1.504l1 1"></path>
                                                </svg>
                                                Analysis end date: <strong>' . $ncDetails["result"]["analysisEndDate"] . '</strong>
                                            </div>
                                            <div class="mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M19.823 19.824a2 2 0 0 1 -1.823 1.176h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 1.175 -1.823m3.825 -.177h9a2 2 0 0 1 2 2v9"></path>
                                                    <line x1="16" y1="3" x2="16" y2="7"></line>
                                                    <line x1="8" y1="3" x2="8" y2="4"></line>
                                                    <path d="M4 11h7m4 0h5"></path>
                                                    <line x1="11" y1="15" x2="12" y2="15"></line>
                                                    <line x1="12" y1="15" x2="12" y2="18"></line>
                                                    <line x1="3" y1="3" x2="21" y2="21"></line>
                                                </svg>
                                                Check end date: <strong>' . $ncDetails["result"]["checkEndDate"] . '</strong>
                                            </div>
                                            <div class="mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                                                    <path d="M18 14v4h4"></path>
                                                    <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
                                                    <rect x="8" y="3" width="6" height="4" rx="2"></rect>
                                                    <circle cx="18" cy="18" r="4"></circle>
                                                    <path d="M8 11h4"></path>
                                                    <path d="M8 15h3"></path>
                                                </svg>
                                                Result: <strong>' . $ncDetails["result"]["result"] . '</strong>
                                            </div>
                                        ';
                                    } elseif ($ncStatus === "Review") {
                                        echo '
                                            <div class="mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"></path>
                                                    <circle cx="18" cy="18" r="4"></circle>
                                                    <path d="M15 3v4"></path>
                                                    <path d="M7 3v4"></path>
                                                    <path d="M3 11h16"></path>
                                                    <path d="M18 16.496v1.504l1 1"></path>
                                                </svg>
                                                Analysis end date: <strong>' . $ncDetails["result"]["analysisEndDate"] . '</strong>
                                            </div>
                                        ';
                                    }
                                ?>
                            </div>
                            <div class="card-footer">
                                <?php
                                    if (($ncManager !== "Unassigned Manager") && ($ncStatus !== "Review") && ($ncStatus !== "Closed")) {
                                        echo '
                                            <a href="#" class="btn btn-warning d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-update-status">Update Status</a>
                                        ';
                                    }

                                    if ($ncStatus === "Review") {
                                        echo '
                                            <a href="#" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-close-non-compliance">Close</a>
                                        ';
                                    }

                                    if ($ncManager === "Unassigned Manager") {
                                        echo '
                                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-assign-manager">Assign Manager</a>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">v1.0.0</li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2022
                                    <a href="." class="link-secondary">ipDigital</a>.
                                    All rights reserved.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Close non compliance modal -->
    <div class="modal modal-blur fade" id="modal-close-non-compliance" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="./backend/close-non-compliance.php" method="get">
                    <div class="modal-header">
                        <h5 class="modal-title">Close Non Compliance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="nonCompliance" name="nonCompliance" value="<?= $_GET['id'] ?>">
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Result comment</label>
                                <textarea class="form-control" id="resultComment" name="resultComment" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-danger ms-auto" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Assign manager modal -->
    <div class="modal modal-blur fade" id="modal-assign-manager" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="./backend/assign-manager.php" method="get">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Non compliance Manager</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-label">Manager</div>
                            <select class="form-select" id="manager" name="manager">
                                <?php
                                    $managers = getUsers();

                                    foreach($managers["result"] as $manager) {
                                        echo '<option value=' . getUserData($manager["email"])["result"]["fiscalCode"] . '>' . $manager["email"] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" id="nonCompliance" name="nonCompliance" value="<?= $_GET['id'] ?>">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update status confirm -->
    <div class="modal modal-blur fade" id="modal-update-status" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="./backend/update-non-compliance-status.php" method="get">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                    <h3>Are you sure?</h3>
                    <div class="text-muted">Do you really want to update the non compliance status from <?= $ncStatus . ' to ' . getNextNonComplianceStatus($ncStatus) ?>.</div>
                    <input type="hidden" id="noncompliance" name="noncompliance" value="<?= $_GET['id'] ?>">
                    <input type="hidden" id="status" name="status" value="<?= $ncStatus ?>">
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                            Cancel
                        </a></div>
                        <div class="col">
                            <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">Update</button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- PLUGINS -->
    <script src="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-vendors.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>

</html>