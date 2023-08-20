<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Electrical Shop | Electric Shop </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="{{ url('frontend/assets/css/bootstrap.min.css') }}" type="text/css">
    <link href="{{ url('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/style.css') }}" type="text/css">


</head>

<body>

    @include('frontend.fixed.header')


    <section>


        @include('sweetalert::alert')
        @yield('contents')

    </section>
    @include('frontend.fixed.footer')

    <!-- Js Plugins -->


    <script src="{{ url('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('frontend/assets/js/mixitup.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/main.js') }}"></script>



    <script>
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();
        obj.amount = $('#total_amount').val();

        let total = $('#total_amount').text();

        // total = total.split("$")[1];
        //obj.amount = total;
        $("#total_payment").val(total);
        $('#sslczPayBtn').prop('postdata', obj);
    </script>
    {{--
    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>
     --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
