@extends('user.layout.guest')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->



    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>create account</h3>

                    <div style="width: 40%; margin: auto">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>


                    <div class="theme-card">
                        <form class="theme-form" action="{{ url('register') }}" method="POST">
                            @csrf
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter name" required="" value="{{ old('name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email"
                                        name="email" required="" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="name">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Enter phone" required="" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Birth date</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date"
                                        placeholder="Birth date" required="" value="{{ old('birth_date') }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="email">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" required="" value="{{ old('address') }}">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-3">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Choose Gender ----</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="country_id">Country</label>
                                    <select name="country_id" class="form-control" id="country">
                                        <option value="">Choose Country ----</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->title_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="city_id">City</label>
                                    <select name="city_id" class="form-control" id="cities">

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="region_id">Region</label>
                                    <select name="region_id" class="form-control" id="regions">

                                    </select>
                                </div>
                            </div><br><br>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="password" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="review" name="confirm_password"
                                        placeholder="Confirm your password" required="">
                                </div><button type="submit" class="btn btn-solid w-auto">create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->


    <!-- footer start -->
    <footer class="footer-light">
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>about</h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo"><img src="../assets/images/icon/logo.png" alt=""></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col offset-xl-1">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>my account</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">mens</a></li>
                                    <li><a href="#">womens</a></li>
                                    <li><a href="#">clothing</a></li>
                                    <li><a href="#">accessories</a></li>
                                    <li><a href="#">featured</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>why we choose</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">shipping & return</a></li>
                                    <li><a href="#">secure shopping</a></li>
                                    <li><a href="#">gallary</a></li>
                                    <li><a href="#">affiliates</a></li>
                                    <li><a href="#">contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>Multikart Demo Store, Demo store India
                                        345-659</li>
                                    <li><i class="fa fa-phone"></i>Call Us: 123-456-7898</li>
                                    <li><i class="fa fa-envelope"></i>Email Us: Support@Multikart.com</li>
                                    <li><i class="fa fa-fax"></i>Fax: 123456</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="footer-end">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2017-18 themeforest powered by
                                pixelstrap</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="payment-card-bottom">
                            <ul>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/visa.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/mastercard.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/paypal.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/american-express.png"
                                            alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/discover.png" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->


    <div class="scroll-setting-box">
        <div id="setting_box" class="setting-box">
            <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
            <div class="setting_box_body">
                <div onclick="closeSetting()">
                    <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                    </div>
                </div>
                <div class="setting-body">
                    <div class="setting-title">
                        <div>
                            <img src="../assets/images/icon/logo.png" class="img-fluid" alt="">
                            <h3>50+ <span>demos</span> <br> suit for any type of online store.</h3>
                        </div>
                    </div>
                    <div class="setting-contant">
                        <div class="row demo-section">
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-4.html" class="demo-text">
                                        <h4>Vegetables 4 <span>New</span>
                                            <h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-5.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-5.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-5.html" class="demo-text">
                                        <h4>Vegetables 5 <span>New</span>
                                            <h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="gradient.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/gradient.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="gradient.html" class="demo-text">
                                        <h4>gradient<h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="index.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="index.html" class="demo-text">
                                        <h4>fashion</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-2.html" class="demo-text">
                                        <h4>fashion 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-3.html" class="demo-text">
                                        <h4>fashion 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-4.html" class="demo-text">
                                        <h4>fashion 4</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-5.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-5.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-5.html" class="demo-text">
                                        <h4>fashion 5</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-6.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-6.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-6.html" class="demo-text">
                                        <h4>fashion 6</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-7.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-7.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-7.html" class="demo-text">
                                        <h4>fashion 7</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture.html" class="demo-text">
                                        <h4>furniture</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture-2.html" class="demo-text">
                                        <h4>furniture 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture-dark.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture-3.html" class="demo-text">
                                        <h4>furniture dark</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-1.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-1.html" class="demo-text">
                                        <h4>electronics</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-2.html" class="demo-text">
                                        <h4>electronics 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-3.html" class="demo-text">
                                        <h4>electronics 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo.html" class="demo-text">
                                        <h4>marketplace</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-2.html" class="demo-text">
                                        <h4>marketplace 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-3.html" class="demo-text">
                                        <h4>marketplace 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-4.html" class="demo-text">
                                        <h4>marketplace 4</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables.html" class="demo-text">
                                        <h4>vegetables</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-2.html" class="demo-text">
                                        <h4>vegetables 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-3.html" class="demo-text">
                                        <h4>vegetables 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery.html" class="demo-text">
                                        <h4>jewellery</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery-2.html" class="demo-text">
                                        <h4>jewellery 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery-3.html" class="demo-text">
                                        <h4>jewellery 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="bags.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/bag.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="bags.html" class="demo-text">
                                        <h4>bag</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="watch.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/watch.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="watch.html" class="demo-text">
                                        <h4>watch</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="medical.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/medical.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="medical.html" class="demo-text">
                                        <h4>medical</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="perfume.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/perfume.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="perfume.html" class="demo-text">
                                        <h4>perfume</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="yoga.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/yoga.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="yoga.html" class="demo-text">
                                        <h4>yoga</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="christmas.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/christmas.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="christmas.html" class="demo-text">
                                        <h4>christmas</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="bicycle.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/bicycle.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="bicycle.html" class="demo-text">
                                        <h4>bicycle</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marijuana.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marijuana.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marijuana.html" class="demo-text">
                                        <h4>marijuana</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="gym-product.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/gym.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="gym-product.html" class="demo-text">
                                        <h4>gym</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="tools.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/tools.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="tools.html" class="demo-text">
                                        <h4>tools</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="shoes.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/shoes.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="shoes.html" class="demo-text">
                                        <h4>shoes</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="books.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/books.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="books.html" class="demo-text">
                                        <h4>books</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="kids.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/kids.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="kids.html" class="demo-text">
                                        <h4>kids</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="game.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/game.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="game.html" class="demo-text">
                                        <h4>game</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="beauty.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/beauty.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="beauty.html" class="demo-text">
                                        <h4>beauty</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="left_sidebar-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/left-sidebar.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="left_sidebar-demo.html" class="demo-text">
                                        <h4>left sidebar</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="video-slider.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/video-slider.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="video-slider.html" class="demo-text">
                                        <h4>video slider</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="metro.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/metro.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="metro.html" class="demo-text">
                                        <h4>metro</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="goggles.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/goggles.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="goggles.html" class="demo-text">
                                        <h4>goggles</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="flower.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/flower.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="flower.html" class="demo-text">
                                        <h4>flower</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="light.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/light.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="light.html" class="demo-text">
                                        <h4>light</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="nursery.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/nursery.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="nursery.html" class="demo-text">
                                        <h4>nursery</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="pets.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/pets.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="pets.html" class="demo-text">
                                        <h4>pets</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="video.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/video.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="video.html" class="demo-text">
                                        <h4>video</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="lookbook-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/lookbook.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="lookbook-demo.html" class="demo-text">
                                        <h4>lookbook</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="full-page.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/full-page.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="full-page.html" class="demo-text">
                                        <h4>full page</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="instagram-shop.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/instagram.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="instagram-shop.html" class="demo-text">
                                        <h4>instagram</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="parallax.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/parallax.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="parallax.html" class="demo-text">
                                        <h4>parallax</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- theme setting -->


    <!-- tap to top start -->
    <div class="tap-top">
        <div><i class="fa fa-angle-double-up"></i></div>
    </div>
    <!-- tap to top end -->
@endsection
