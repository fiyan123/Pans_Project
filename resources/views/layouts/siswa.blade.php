<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Penilaian Siswa - PANS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets0/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets0/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets0/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets0/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets0/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assets0/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets0/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets0/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <img src="{{ asset('assetsm/vendors/svg-loaders/audio.svg') }}" class="me-4" style="width: 5rem"
            alt="audio">
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
        @include('layouts.components_siswa.navbar')
    <!-- Navbar End -->

    <!-- Carousel Start -->
        @include('layouts.components_siswa.carousel')
    <!-- Carousel End -->

    <!-- Categories Start -->
    <div class="container">
        <div class="col-lg-13">
            @yield('content')
        </div>
    </div>
    <!-- Categories Start -->

    <!-- Service Start -->
        @include('layouts.components_siswa.service')
    <!-- Service End -->

    {{-- About --}}
        @include('layouts.components_siswa.about')
    {{-- End About --}}

    <!-- Testimonial Start -->
        @include('layouts.components_siswa.testimonial')
    <!-- Testimonial End -->

    <!-- Footer Start -->
        @include('layouts.components_siswa.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets0/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets0/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets0/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets0/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets0/js/main.js') }}"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>
