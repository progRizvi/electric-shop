<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <title>Ogani E-commerce</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('backend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">






    <!-- Template Main CSS File -->
    <link href="{{ url('backend/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.4.1
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
   
    
</head>

<body>

    <!-- ======= Header ======= -->
    @include('backend.fixed.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('backend.fixed.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

    
        @yield('contents')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('backend.fixed.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- Vendor JS Files -->
    <script src="{{ url('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/php-email-form/validate.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


    <!-- Template Main JS File -->
    <script src="{{ url('backend/assets/js/main.js') }}"></script>
    

    @stack('js')

</body>

</html>