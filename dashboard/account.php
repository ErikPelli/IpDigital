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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - ipDigital</title>

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
                            <a href="#" class="dropdown-item">Profile & account</a>
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
                            <li class="nav-item">
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
                                Account
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                        <div class="card-body p-4 text-center">
                            <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url(../static/avatars/000m.png)"></span>
                            <h3 class="m-0 mb-1"><a href="#"><?= $user_data["result"]["firstName"] . ' ' . $user_data["result"]["lastName"] ?></a></h3>
                            <div class="text-muted"><?= $settings_data["result"]["job"] ?></div>
                            <div class="mt-3">
                            <span class="badge bg-purple-lt"><?= $settings_data["result"]["role"] ?></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="#" class="card-btn" data-bs-toggle="modal" data-bs-target="#modal-account-details"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                            Account</a>
                            <a href="#" class="card-btn" data-bs-toggle="modal" data-bs-target="#modal-edit-account"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                                <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="12" y1="12" x2="12" y2="12.01"></line>
                                <path d="M3 13a20 20 0 0 0 18 0"></path>
                            </svg>
                            Work</a>
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
                                <li class="list-inline-item"><a href="./docs/index.html"
                                        class="link-secondary">Documentation</a></li>
                                <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a>
                                </li>
                                <li class="list-inline-item"><a href="https://github.com/PCTO-2122" target="_blank"
                                        class="link-secondary" rel="noopener">Source code</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2022
                                    <a href="." class="link-secondary">ipDigital</a>.
                                    All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        v1.0.0
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <!-- Account details modal -->
    <div class="modal modal-blur fade" id="modal-account-details" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="./backend/edit-account.php" method="get">
                    <div class="modal-header">
                        <h5 class="modal-title">Account Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Firstname & Lastname</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        placeholder="Firstname" value="<?= $user_data["result"]["firstName"] ?>" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        placeholder="Lastname" value="<?= $user_data["result"]["lastName"] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fiscal Code</label>
                            <input type="text" class="form-control" id="fiscalcode" name="fiscalcode"
                                placeholder="Password" value="<?= $user_data["result"]["fiscalCode"] ?>" disabled />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="text" class="form-control" id="job" name="job"
                                        placeholder="Email" value="<?= $_SESSION['email'] ?>" disabled>
                                </div>
                                <div class="col-auto align-self-center">
                                    <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>If you want to change your email address please contact a System Administrator</p>
                                        <p class='mb-0'><a href='mailto:administrator@ipdigital.com'>Contact</a></p>
                                        ">?</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" id="role" name="role"
                                placeholder="Password" value="************" disabled />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit account modal -->
    <div class="modal modal-blur fade" id="modal-edit-account" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="./backend/edit-account.php" method="get">
                    <div class="modal-header">
                        <h5 class="modal-title">Work Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Job</label>
                            <input type="text" class="form-control" id="job" name="job"
                                placeholder="Job name" value="<?= $settings_data["result"]["job"] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" id="role" name="role"
                                placeholder="Role name" value="<?= $settings_data["result"]["role"] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" id="company" name="company"
                                placeholder="Company VAT number" value="<?= $settings_data["result"]["company"] ?>" disabled />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
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