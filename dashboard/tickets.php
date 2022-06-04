<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: ../auth/sign-in.php");
    }

    require_once '../utils/api.php';



    $ticketsAnalytics = getTicketsAnalytics()["result"];
    $ticketsAnalyticsTotal = $ticketsAnalytics["totalTickets"];
    $numPages = ceil($ticketsAnalyticsTotal / 10);

    if (!isset($_GET['page']) || ($_GET['page'] < 1) || ($_GET['page'] > $numPages)) {
        header("Location: ./tickets.php?page=1&number=10");
    } else {
        if (!isset($_GET['number']) || ($_GET['number'] < 1) || ($_GET['number'] > 50)) {
            header("Location: ./tickets.php?page={$_GET['page']}&number=10");
        }
    }

    $numPages = ceil($ticketsAnalyticsTotal / $_GET['number']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tickets - ipDigital</title>

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
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
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
                                Tickets
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="../public/ticket.php" class="btn btn-primary d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5"></path>
                                        <line x1="10" y1="14" x2="20" y2="4"></line>
                                        <polyline points="15 4 20 4 20 9"></polyline>
                                    </svg>
                                    Add new
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Shipping Code</th>
                                        <th>Description</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tickets = getTickets($_GET['number'], $_GET['page']);

                                        foreach($tickets["result"] as $ticket) {
                                            $ticketDetails = getTicket($ticket["vatNum"], $ticket["nonComplianceCode"]);

                                            echo '
                                                <tr>
                                                    <td class="text-muted">' . $ticket["vatNum"] . '-' . $ticket["nonComplianceCode"] . '</td>
                                                    <td class="text-muted">' . $ticketDetails["result"]["shippingCode"] . '</td>
                                                    <td>' . $ticketDetails["result"]["problemDescription"] . '</td>
                                                    <td class="text-muted">' . $ticketDetails["result"]["customerCompanyName"] . '</td>
                                                    <td class="text-muted">' . $ticketDetails["result"]["status"] . '</td>
                                                    <td>
                                                        <a href="./ticket.php?vatNum=' . $ticket["vatNum"] . '&nonComplianceCode=' . $ticket["nonComplianceCode"] . '">Details</a>
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing 
                                <span>
                                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                                        <div class="mx-2 d-inline-block">
                                            <input type="hidden" id="page" name="page" value="<?= $_GET['page']; ?>">
                                            <input type="text" id="number" name="number" class="form-control form-control-sm" value="<?= $_GET['number']; ?>" size="3" aria-label="Number filter">
                                        </div>
                                    </form>
                                </span> of&nbsp;
                                <span><?= $ticketsAnalyticsTotal ?></span>&nbsp;entries
                            </p>
                                <ul class="pagination m-0 ms-auto">
                                <li class="page-item <?=  ($_GET['page'] <= 1) ? "disabled" : '';  ?>">
                                    <a class="page-link" href="./tickets.php?page=<?= $_GET['page']-1; ?>&number=<?= $_GET['number']; ?>" tabindex="-1" aria-disabled="true">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/chevron-left</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                                        prev
                                    </a>
                                </li>
                                <?php
                                    for ($i = 1; $i <= $numPages; $i++) {
                                        if ($i == $_GET['page']) {
                                            echo "<li class='page-item active'><a class='page-link' href='./tickets.php?page={$i}&number={$_GET['number']}'>{$i}</a></li>";
                                        } else {
                                            echo "<li class='page-item'><a class='page-link' href='./tickets.php?page={$i}&number={$_GET['number']}'>{$i}</a></li>";
                                        }
                                    }
                                ?>
                                <li class="page-item <?=  ($_GET['page'] >= $numPages) ? "disabled" : '';  ?>">
                                    <a class="page-link" href="./tickets.php?page=<?= $_GET['page']+1; ?>&number=<?= $_GET['number']; ?>">
                                    next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/chevron-right</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            
                            if (!empty($error)) {
                                $errorMsg = "";

                                switch ($error) {
                                    case 'genericInternalError':
                                        $errorMsg = "We are sorry but your request could not be handled. Please try again. If the problem persists, contact your system administrator.";
                                        break;
                                    case 'wrongDataInputFormat':
                                        $errorMsg = "Please make sure you have completed all fields correctly.";
                                        break;
                                }

                                echo '<div class="text-danger">' . $errorMsg . '</div>';
                            }
                        }
                    ?>
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


    <!-- Add new non compliance modal -->
    <div class="modal modal-blur fade" id="modal-new-non-compliance" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="./backend/add-non-compliances.php" method="get">
                    <div class="modal-header">
                        <h5 class="modal-title">New non compliance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-label">Type</div>
                            <select class="form-select" id="type" name="type">
                                <?php
                                    $nonCompliancesType = getNonComplianceTypes();

                                    foreach($nonCompliancesType["result"] as $ncTypeCode) {
                                        echo '<option value=' . $ncTypeCode["code"] . '>' . $ncTypeCode["name"] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lot</label>
                            <select type="text" class="form-select" placeholder="Select a lot" id="lot" name="lot" value="">
                                <?php
                                    $lotList = getLots();

                                    foreach($lotList["result"] as $lot) {
                                        echo '<option value=' . $lot["shippingCode"] . '>' . $lot["shippingCode"] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <label class="form-label">Origin</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-4">
                                <label class="form-selectgroup-item">
                                    <input type="radio" id="nc-origin" name="nc-origin" value="internal" class="form-selectgroup-input"
                                        checked />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Internal</span>
                                            <span class="d-block text-muted">Insert charts and additional advanced
                                                analyses to
                                                be inserted in the report</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-selectgroup-item">
                                    <input type="radio" id="nc-origin" name="nc-origin" value="customer" class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Customer</span>
                                            <span class="d-block text-muted">Insert charts and additional advanced
                                                analyses to
                                                be inserted in the report</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-selectgroup-item">
                                    <input type="radio" id="nc-origin" name="nc-origin" value="supplier" class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Supplier</span>
                                            <span class="d-block text-muted">Insert charts and additional advanced
                                                analyses to
                                                be inserted in the report</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                            </div>
                        </div>
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


    <!-- PLUGINS -->
    <script src="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-vendors.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>

</html>