@extends('user.layout.guest')

@section('content')

<!-- section start -->
<section class="about-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-section">
                    <iframe width="100%" style="height: 400px" class="img-fluid blur-up lazyload" src="{{ $about_us->video_link }}" type="video/mp4">
                    </iframe>
                </div>
            </div>
            <div class="col-sm-12">
                <p>{{ $about_us->about_us_en }}</p>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<!-- footer start -->
<footer class="footer-light footer-expand pb-0">
    <div class="section-t-space section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    @foreach ($main_section_footer as $main_section_footer)
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{{ $main_section_footer->logo }}" alt="">
                        </div>
                        <p>{{ $main_section_footer->description }}</p>
                        <ul class="store-details">
                            <li><a href="{{ $main_section_footer->google_store_link }}"><img
                                        src="../assets/images/store/google.png" class="img-fluid" alt=""></a></li>
                            <li><a href="{{ $main_section_footer->app_store_link }}"><img
                                        src="../assets/images/store/app.png" class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                <div class="col offset-xxl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>my account</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                @foreach ($my_account_section as $my_account_section)
                                <li><a href="{{ $my_account_section->link_en }}">{{ $my_account_section->title_en }}</a>
                                </li>
                                @endforeach
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
                                @foreach ($why_we_choose as $why_we_choose)
                                <li><a href="{{ $why_we_choose->link_en }}">{{ $why_we_choose->title_en }}</a>
                                </li>
                                @endforeach
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
                                @foreach ($store_info as $store_info)
                                <li><i class="fa fa-map-marker"></i>{{ $store_info->location }}</li>
                                <li><i class="fa fa-phone"></i>Call Us: {{ $store_info->phone }}</li>
                                <li><i class="fa fa-envelope"></i>Email Us: <a href="{{ $store_info->email }}">{{
                                        $store_info->email }}</a>
                                </li>
                                <li><i class="fa fa-fax"></i>Fax: {{ $store_info->fax }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2023 powered by
                            Eramo</p>
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
                                <a href="#"><img src="../assets/images/icon/american-express.png" alt=""></a>
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

@endsection