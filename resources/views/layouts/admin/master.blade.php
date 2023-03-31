<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>@yield('title', config('app.name'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="App Admin Dashboard">
    <meta name="author" content="e-RAMO For Digital Solutions">
    <meta name="description" content="App Admin Dashboard" />
    <link rel="canonical" href="https://www.e-ramo.net/">



    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href=" {{ asset('layouts/admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('layouts/admin/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('layouts/admin/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('layouts/admin/img/favicon/site.webmanifest') }}">

    <!-- Sweet Alert -->
    <link type="text/css" href=" {{ asset('layouts/admin/css/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('layouts/admin/css/notyf.min.css') }}" rel="stylesheet">

    <!-- fontAwsome -->
    <link type="text/css" href="{{ asset('layouts/admin/css/all.min.css') }}" rel="stylesheet">


    <!-- dropfy CSS -->
    <link type="text/css" href="{{ asset('layouts/admin/css/dropify.css') }} " rel="stylesheet">

    <!-- select2 CSS -->
    <link type="text/css" href="{{ asset('layouts/admin/css/select2.min.css') }} " rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('layouts/admin/css/volt.css') }} " rel="stylesheet">


    <!-- style CSS -->
    <link type="text/css" href="{{ asset('layouts/admin/css/style.css') }} " rel="stylesheet">


    @yield('styles')
</head>

<body>
    {{-- loader --}}
    @include('layouts.admin._loader')
    {{-- loader --}}


    {{-- sidebar --}}

    @include('layouts.admin._sidebar')
    {{-- sidebar --}}

    <main class="content">


        {{-- nav --}}
        @include('layouts.admin._nav')

        {{-- nav --}}


        {{-- dashboard content --}}
        <div class="app-wrapper" style="min-height: 80vh">
            @yield('content')
        </div>
        {{-- dashboard content --}}


        {{-- footer --}}
        @include('layouts.admin._footer')

        {{-- footer --}}


    </main>

    <script src="{{ asset('layouts/admin/js/jquery.min.js') }}"></script>

    <!-- Core -->
    <script src="{{ asset('layouts/admin/js/popper.min.js') }}"></script>
    <script src=" {{ asset('layouts/admin/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('layouts/admin/js/on-screen.umd.min.js') }}"></script>

    <!-- Slider -->
    <script src="{{ asset('layouts/admin/js/nouislider.min.js') }}"></script>

    <!-- Smooth scroll -->
    <script src=" {{ asset('layouts/admin/js/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Charts -->
    <script src="{{ asset('layouts/admin/js/chartist.min.js') }}"></script>
    <script src="{{ asset('layouts/admin/js/chartist-plugin-tooltip.min.js') }}"></script>

    <!-- Datepicker -->
    <script src="{{ asset('layouts/admin/js/datepicker.min.js') }}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{ asset('layouts/admin/js/sweetalert2.all.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src=" {{ asset('layouts/admin/js/datepicker.min.js') }}"></script>

    <!-- Notyf -->
    <script src="{{ asset('layouts/admin/js/notyf.min.js') }}"></script>

    <!-- Simplebar -->
    <script src="{{ asset('layouts/admin/js/simplebar.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js "></script>

    <!-- Volt JS -->
    <script src="{{ asset('layouts/admin/js/volt.js') }}"></script>


    <!-- dropify JS -->
    <script src="{{ asset('layouts/admin/js/dropify.js') }}"></script>

    <!-- select2.min JS -->
    <script src="{{ asset('layouts/admin/js/select2.min.js') }}"></script>

    <!-- main JS -->
    <script src="{{ asset('layouts/admin/js/main.js') }}" type="module"></script>

    <!-- My Custom Jquery Scripts -->
    <script type="text/javascript">
        $('#image').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });

        $('#image2').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image2').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>

    @include('partials._errors')
    @include('partials._session')
    @yield('scripts')




</body>

</html>
