<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: ../auth/sign-in.html");
    }

    require_once '../utils/api.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Non compliance - ipDigital</title>

    <!-- TABLER (https://github.com/tabler/tabler) -->
    <script src="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler.min.css" />

    <!-- PLUGINS -->
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-flags.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-payments.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-vendors.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
                                style="background-image: url(../static/avatars/000m.jpg)"></span>
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
                            <a href="#" class="dropdown-item">Set status</a>
                            <a href="#" class="dropdown-item">Profile & account</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="./account.php" class="dropdown-item">Settings</a>
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
                                <a class="nav-link" href="./non-compliance.php">
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
                                <a class="nav-link" href="./form-elements.html">
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
                                Non compliance
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add new
                                </a>
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-report" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
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
                                        <th>Name</th>
                                        <th>Manager</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-muted">C-001</td>
                                        <td>Convertitore di tensione bruciato</td>
                                        <td class="text-muted">
                                            <a href="#" class="text-reset">paweluna@howstuffworks.com</a>
                                        </td>
                                        <td class="text-muted">12 Dec, 2021</td>
                                        <td class="text-muted">Review</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal-report">Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">C-001</td>
                                        <td>Convertitore di tensione bruciato</td>
                                        <td class="text-muted">
                                            <a href="#" class="text-reset">paweluna@howstuffworks.com</a>
                                        </td>
                                        <td class="text-muted">12 Dec, 2021</td>
                                        <td class="text-muted">Review</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal-report">Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">C-001</td>
                                        <td>Convertitore di tensione bruciato</td>
                                        <td class="text-muted">
                                            <a href="#" class="text-reset">paweluna@howstuffworks.com</a>
                                        </td>
                                        <td class="text-muted">12 Dec, 2021</td>
                                        <td class="text-muted">Review</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal-report">Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">C-001</td>
                                        <td>Convertitore di tensione bruciato</td>
                                        <td class="text-muted">
                                            <a href="#" class="text-reset">paweluna@howstuffworks.com</a>
                                        </td>
                                        <td class="text-muted">12 Dec, 2021</td>
                                        <td class="text-muted">Review</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal-report">Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">C-001</td>
                                        <td>Convertitore di tensione bruciato</td>
                                        <td class="text-muted">
                                            <a href="#" class="text-reset">paweluna@howstuffworks.com</a>
                                        </td>
                                        <td class="text-muted">12 Dec, 2021</td>
                                        <td class="text-muted">Review</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal-report">Details</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="./docs/index.html" class="link-secondary">Documentation</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="./license.html" class="link-secondary">License</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary"
                                        rel="noopener">Source code</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2022
                                    <a href="." class="link-secondary">ipDigital</a>. All rights
                                    reserved.
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


    <!-- Add new non compliance modal -->
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New non compliance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Descriptive name" />
                    </div>
                    <label class="form-label">Type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-4">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input"
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
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input" />
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
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input" />
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
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <!-- SVG icon code -->
                        Submit
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
                new ApexCharts(document.getElementById("sparkline-activity"), {
                    chart: {
                        type: "radialBar",
                        fontFamily: "inherit",
                        height: 40,
                        width: 40,
                        animations: {
                            enabled: false,
                        },
                        sparkline: {
                            enabled: true,
                        },
                    },
                    tooltip: {
                        enabled: false,
                    },
                    plotOptions: {
                        radialBar: {
                            hollow: {
                                margin: 0,
                                size: "75%",
                            },
                            track: {
                                margin: 0,
                            },
                            dataLabels: {
                                show: false,
                            },
                        },
                    },
                    colors: ["#206bc4"],
                    series: [35],
                }).render();
        });
      // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
                new ApexCharts(
                    document.getElementById("chart-development-activity"),
                    {
                        chart: {
                            type: "area",
                            fontFamily: "inherit",
                            height: 255,
                            sparkline: {
                                enabled: true,
                            },
                            animations: {
                                enabled: false,
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        fill: {
                            opacity: 0.16,
                            type: "solid",
                        },
                        stroke: {
                            width: 2,
                            lineCap: "round",
                            curve: "smooth",
                        },
                        series: [
                            {
                                name: "Tickets",
                                data: [
                                    3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30,
                                    17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70,
                                ],
                            },
                        ],
                        grid: {
                            strokeDashArray: 4,
                        },
                        xaxis: {
                            labels: {
                                padding: 0,
                            },
                            tooltip: {
                                enabled: false,
                            },
                            axisBorder: {
                                show: false,
                            },
                            type: "datetime",
                        },
                        yaxis: {
                            labels: {
                                padding: 4,
                            },
                        },
                        labels: [
                            "2020-06-20",
                            "2020-06-21",
                            "2020-06-22",
                            "2020-06-23",
                            "2020-06-24",
                            "2020-06-25",
                            "2020-06-26",
                            "2020-06-27",
                            "2020-06-28",
                            "2020-06-29",
                            "2020-06-30",
                            "2020-07-01",
                            "2020-07-02",
                            "2020-07-03",
                            "2020-07-04",
                            "2020-07-05",
                            "2020-07-06",
                            "2020-07-07",
                            "2020-07-08",
                            "2020-07-09",
                            "2020-07-10",
                            "2020-07-11",
                            "2020-07-12",
                            "2020-07-13",
                            "2020-07-14",
                            "2020-07-15",
                            "2020-07-16",
                            "2020-07-17",
                            "2020-07-18",
                            "2020-07-19",
                        ],
                        colors: ["#206bc4"],
                        legend: {
                            show: false,
                        },
                        point: {
                            show: false,
                        },
                    }
                ).render();
        });
      // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
                new ApexCharts(document.getElementById("chart-mentions"), {
                    chart: {
                        type: "bar",
                        fontFamily: "inherit",
                        height: 240,
                        parentHeightOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        animations: {
                            enabled: false,
                        },
                        stacked: true,
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "50%",
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        opacity: 1,
                    },
                    series: [
                        {
                            name: "Closed",
                            data: [
                                2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4,
                                9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6,
                            ],
                        },
                        {
                            name: "Review",
                            data: [
                                2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4,
                                9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6,
                            ],
                        },
                        {
                            name: "In progress",
                            data: [
                                2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2,
                                12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0,
                            ],
                        },
                        {
                            name: "New",
                            data: [
                                1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1,
                                8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46,
                                6,
                            ],
                        },
                    ],
                    grid: {
                        padding: {
                            top: -20,
                            right: 0,
                            left: -4,
                            bottom: -4,
                        },
                        strokeDashArray: 4,
                        xaxis: {
                            lines: {
                                show: true,
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        type: "datetime",
                    },
                    yaxis: {
                        labels: {
                            padding: 4,
                        },
                    },
                    labels: [
                        "2020-06-20",
                        "2020-06-21",
                        "2020-06-22",
                        "2020-06-23",
                        "2020-06-24",
                        "2020-06-25",
                        "2020-06-26",
                        "2020-06-27",
                        "2020-06-28",
                        "2020-06-29",
                        "2020-06-30",
                        "2020-07-01",
                        "2020-07-02",
                        "2020-07-03",
                        "2020-07-04",
                        "2020-07-05",
                        "2020-07-06",
                        "2020-07-07",
                        "2020-07-08",
                        "2020-07-09",
                        "2020-07-10",
                        "2020-07-11",
                        "2020-07-12",
                        "2020-07-13",
                        "2020-07-14",
                        "2020-07-15",
                        "2020-07-16",
                        "2020-07-17",
                        "2020-07-18",
                        "2020-07-19",
                        "2020-07-20",
                        "2020-07-21",
                        "2020-07-22",
                        "2020-07-23",
                        "2020-07-24",
                        "2020-07-25",
                        "2020-07-26",
                    ],
                    colors: ["#d63939", "#f59f00", "#2fb344", "#206bc4"],
                    legend: {
                        show: false,
                    },
                }).render();
        });
      // @formatter:on
    </script>
</body>

</html>