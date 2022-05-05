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
    <title>Dashboard - ipDigital</title>

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
                        <img src="../static/logo-white.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
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
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
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
                                Dashboard
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <div class="col-12">
                            <div class="row row-cards">
                                <?php
                                    $nonCompliancesAnalytics = getNonCompliancesAnalytics()["result"];
                                ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-blue text-white avatar">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-plus" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <?= $nonCompliancesAnalytics["totalNonCompliances"]["new"] ?> New
                                                    </div>
                                                    <div class="text-muted">
                                                        <?= $nonCompliancesAnalytics["days"][0]["new"] ?> today
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-green text-white avatar">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevrons-right-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-chevrons-right"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <polyline points="7 7 12 12 7 17"></polyline>
                                                            <polyline points="13 7 18 12 13 17"></polyline>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <?= $nonCompliancesAnalytics["totalNonCompliances"]["progress"] ?> In progress
                                                    </div>
                                                    <div class="text-muted">
                                                        <?= $nonCompliancesAnalytics["days"][0]["progress"] ?> today
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-yellow text-white avatar">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-refresh" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <?= $nonCompliancesAnalytics["totalNonCompliances"]["review"] ?> Review
                                                    </div>
                                                    <div class="text-muted">
                                                        <?= $nonCompliancesAnalytics["days"][0]["review"] ?> today
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-red text-white avatar">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-x" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <?= $nonCompliancesAnalytics["totalNonCompliances"]["closed"] ?> Closed
                                                    </div>
                                                    <div class="text-muted">
                                                        <?= $nonCompliancesAnalytics["days"][0]["closed"] ?> today
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Non compliance summary</h3>
                                            <div id="chart-mentions" class="chart-lg"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <?php
                                            $ticketsAnalytics = getTicketsAnalytics()["result"];
                                        ?>
                                        <div class="card-header border-0">
                                            <div class="card-title">Ticket activity</div>
                                        </div>
                                        <div class="position-relative">
                                            <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
                                                <div class="row g-2">
                                                    <div class="col-auto">
                                                        <div class="chart-sparkline chart-sparkline-square"
                                                            id="sparkline-activity"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div>Ticket: <?= $ticketsAnalytics["totalTickets"] ?></div>
                                                        <div class="text-muted">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-inline text-green" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <polyline points="3 17 9 11 13 15 21 7" />
                                                                <polyline points="14 7 21 7 21 14" />
                                                            </svg>
                                                            <?= $ticketsAnalytics["days"][0]["counter"] ?>
                                                            today
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="chart-development-activity"></div>
                                        </div>
                                    </div>
                                </div>
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

    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
                chart: {
                    type: "radialBar",
                    fontFamily: 'inherit',
                    height: 40,
                    width: 40,
                    animations: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    },
                },
                tooltip: {
                    enabled: false,
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: '75%'
                        },
                        track: {
                            margin: 0
                        },
                        dataLabels: {
                            show: false
                        }
                    }
                },
                colors: ["#206bc4"],
                series: [35],
            })).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 255,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: .16,
                    type: 'solid'
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [{
                    name: "Tickets",
                    data: [
                        <?php 
                            foreach($ticketsAnalytics["days"] as $day) {
                                echo $day["counter"] . ', ';
                            }
                        ?>
                    ]
                }],
                grid: {
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    <?php 
                        foreach($ticketsAnalytics["days"] as $day) {
                            echo "'" . $day["date"] . "', ";
                        }
                    ?>
                ],
                colors: ["#206bc4"],
                legend: {
                    show: false,
                },
                point: {
                    show: false
                },
            })).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Closed",
                    data: [
                        <?php
                            foreach($nonCompliancesAnalytics["days"] as $day) {
                                echo $day["closed"] . ', ';
                            }
                        ?>
                    ]
                }, {
                    name: "Review",
                    data: [
                        <?php
                            foreach($nonCompliancesAnalytics["days"] as $day) {
                                echo $day["review"] . ', ';
                            }
                        ?>
                    ]
                }, {
                    name: "In progress",
                    data: [
                        <?php
                            foreach($nonCompliancesAnalytics["days"] as $day) {
                                echo $day["progress"] . ', ';
                            }
                        ?>
                    ]
                }, {
                    name: "New",
                    data: [
                        <?php
                            foreach($nonCompliancesAnalytics["days"] as $day) {
                                echo $day["new"] . ', ';
                            }
                        ?>
                    ]
                }],
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                    xaxis: {
                        lines: {
                            show: true
                        }
                    },
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    <?php 
                        foreach($nonCompliancesAnalytics["days"] as $day) {
                            echo "'" . $day["date"] . "', ";
                        }
                    ?>
                ],
                colors: ["#d63939", "#f59f00", "#2fb344", "#206bc4"],
                legend: {
                    show: false,
                },
            })).render();
        });
      // @formatter:on
    </script>


    <!-- PLUGINS -->
    <script src="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-vendors.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>

</html>