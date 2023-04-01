<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Multikart - Multi-purpose E-commerce Html Template</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">

    <!-- Price range icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/price-range.css') }}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify-icons.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">


    <!-- Notification css styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom_styles/notification.css') }}">


</head>

<body class="theme-color-1">

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('user.layout.navbar')
            <!--begin::Main-->
            @yield('content')
            <!--end::Main-->
            <!-- latest jquery-->
            <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

            <!-- fly cart ui jquery-->
            <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

            <!-- exitintent jquery-->
            <script src="{{ asset('assets/js/jquery.exitintent.js') }}"></script>
            <script src="{{ asset('assets/js/exit.js') }}"></script>

            <!-- slick js-->
            <script src="{{ asset('assets/js/slick.js') }}"></script>

            <!-- menu js-->
            <script src="{{ asset('assets/js/menu.js') }}"></script>

            <!-- lazyload js-->
            <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

            <!-- Bootstrap js-->
            <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

            <!-- Bootstrap Notification js-->
            <script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>

            <!-- Fly cart js-->
            <script src="{{ asset('assets/js/fly-cart.js') }}"></script>

            <!-- Theme js-->
            <script src="{{ asset('assets/js/theme-setting.js') }}"></script>
            <script src="{{ asset('assets/js/script.js') }}"></script>

            <!-- price range js -->
            <script src="{{ asset('assets/js/price-range.js') }}"></script>

            <script src="../assets/js/timer1.js"></script>

            <script>
                $(window).on('load', function() {
                    setTimeout(function() {
                        $('#exampleModal').modal('show');
                    }, 2500);
                });

                function openSearch() {
                    document.getElementById("search-overlay").style.display = "block";
                }

                function closeSearch() {
                    document.getElementById("search-overlay").style.display = "none";
                }
            </script>

            <script>
                function addToWishList(id){
                    console.log(id)

    }
    $("#mostafabtn").on("click" , function(){
        alert("hello") ;
    })
            </script>

            <!-- My Custom Scripts -->
            <!-- My Custom Scripts -->
            <script src="{{ asset('assets/js/ajax/ajax.js') }}"></script>

</body>

</html>
