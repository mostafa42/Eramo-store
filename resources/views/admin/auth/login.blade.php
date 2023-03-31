
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="App Admin Login">
<meta name="author" content="e-RAMO For Digital Solutions">
<meta name="description" content="App Admin Login" />
<link rel="canonical" href="https://www.e-ramo.net/">



<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href=" {{ asset('layouts/admin/img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('layouts/admin/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('layouts/admin/img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('layouts/admin/img/favicon/site.webmanifest') }}">

<!-- Sweet Alert -->
<link type="text/css" href=" {{ asset('layouts/admin/css/sweetalert2.min.css') }}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('layouts/admin/css/notyf.min.css') }}" rel="stylesheet">

<!-- Volt CSS -->

<link type="text/css" href="{{ asset('layouts/admin/css/volt.css') }} " rel="stylesheet">

<style>

.login-logo{
    width: 120px;
    height: 120px;
    border-radius: 1%;
    margin: 0 auto 20px auto;
    display: flex;
    object-fit: contain
}

</style>
</head>


<body>



    <main>

        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">




                <div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="">
                                <img class="login-logo" src="{{ asset('uploads/app/logo.png') }}" alt="">
                            </div>
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Login to Admin Dashboard</h1>
                            </div>


                            <form action="{{ route('admin.login') }}" class="mt-4" method="POST">
                                @csrf

                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email"> Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                        </span>
                                        <input  value="{{ old('email') }}" name="email" type="email" class="form-control" placeholder="example@company.com" id="email" autofocus required>
                                    </div>
                                </div>


                                @error('email')
                                <div class="d-flex justify-content-center mb-4">

                                    <div class="text-danger" >
                                        <strong>{{ $message }}</strong>
                                    </div>
                                </div>
                                @enderror

                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password"> Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                            </span>
                                            <input  name="password" type="password" placeholder="Password" class="form-control" id="password" >
                                        </div>
                                    </div>


                                    @error('password')
                                    <div class="d-flex justify-content-center mb-4">

                                        <div class="text-danger" >
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                    @enderror


                                    <!-- End of Form -->
                                    <div class="d-flex justify-content-between align-items-top mb-4">
                                        <div class="form-check">
                                            <input name="remember" class="form-check-input" type="checkbox"  id="remember">
                                            <label class="form-check-label mb-0" for="remember">
                                              Remember me
                                            </label>
                                        </div>
                                    </div>

                                    @error('credentials')
                                    <div class="d-flex justify-content-center mb-4">

                                        <div class="text-danger" >
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                    @enderror




                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800">Login</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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


</body>

</html>
