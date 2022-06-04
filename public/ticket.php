<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create ticket - ipDigital</title>

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
                    <a href="#">
                        <img src="../static/logo-white.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                    </a>
                </h1>
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
                                Create Ticket
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="container-xl">
                        <form action="./backend/create-ticket.php" method="get" class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label required">VAT Number</label>
                                            <input type="text" class="form-control" name="example-required-input" placeholder="IT788945231">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Shiping Code</label>
                                            <input type="text" class="form-control" name="example-required-input" placeholder="0258463971">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Non-Compliance Code</label>
                                            <input type="text" class="form-control" name="example-required-input" placeholder="13">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="form-label-description">max 128</span></label>
                                            <textarea class="form-control" name="example-textarea-input" rows="6" maxlength="128" placeholder="Description.."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary ms-auto">Send data</button>
                                </div>
                            </div>
                        </form>
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


        <!-- PLUGINS -->
        <script src="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/js/tabler.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-flags.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-payments.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-vendors.min.css">
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>

</html>