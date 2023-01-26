<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Siswa - PANS</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assetsm/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsm/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsm/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsm/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsm/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assetsm/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assetsm/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsm/vendors/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsm/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsm/css/shared/iconly.css') }}">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <style>
        label {
            color: black;
        }

        #spinner {
            opacity: 0;
            visibility: hidden;
            transition: opacity .5s ease-out, visibility 0s linear .5s;
            z-index: 99999;
        }

        #spinner.show {
            transition: opacity .5s ease-out, visibility 0s linear 0s;
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.componentsm.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')
            @include('layouts.componentsm.footer')
        </div>
    </div>
    <script src="{{ asset('assetsm/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assetsm/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assetsm/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assetsm/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assetsm/js/main.js') }}"></script>
    <script src="{{ asset('assetsm/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assetsm/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assetsm/js/pages/ui-apexchart.js') }}"></script>
    <script src="{{ asset('assetsm/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assetsm/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assetsm/js/pages/dashboard.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <style>
        .fontawesome-icons {
            text-align: center;
        }

        article dl {
            background-color: rgba(0, 0, 0, .02);
            padding: 20px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>
    <script>
        // Spinner
        var spinner = function() {
            setTimeout(function() {
                if ($('#spinner').length > 0) {
                    $('#spinner').removeClass('show');
                }
            }, 1000);
        };
        spinner();
    </script>
</body>
</html>
