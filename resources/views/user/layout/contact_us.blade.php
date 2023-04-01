@extends('user.layout.guest')

@section('content')

<!-- section start -->
<section class="contact-page section-b-space">
    <div class="container">
        <div class="row section-b-space">
            <div class="col-lg-6" style="margin: auto">
                <div class="contact-right">
                    <ul>
                        <li>
                            <div class="contact-icon"><img src="../assets/images/icon/phone.png"
                                    alt="Generic placeholder image">
                                <h6>Phone</h6>
                            </div>
                            <div class="media-body">
                                <p>{{ $contact_us->phone1 }}</p>
                                <p>{{ $contact_us->phone2 }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h6>Address</h6>
                            </div>
                            <div class="media-body">
                                <p>{{ $contact_us->address }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"><img src="../assets/images/icon/email.png"
                                    alt="Generic placeholder image">
                                <h6>Email</h6>
                            </div>
                            <div class="media-body">
                                <p>{{ $contact_us->email }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"><i class="fa fa-fax" aria-hidden="true"></i>
                                <h6>Social Media</h6>
                            </div>
                            <div class="media-body">
                                <p>Facebook : {{ $contact_us->facebook }}</p>
                                <p>LinedIn : {{ $contact_us->linkedIn }}</p>
                                <p>Instegtram : {{ $contact_us->instegram }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form class="theme-form">
                    <div class="form-row row">
                        <div class="col-md-6">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Your name"
                                required="">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Last Name</label>
                            <input type="text" class="form-control" id="last-name" placeholder="Email" required="">
                        </div>
                        <div class="col-md-6">
                            <label for="review">Phone number</label>
                            <input type="text" class="form-control" id="review" placeholder="Enter your number"
                                required="">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email" required="">
                        </div>
                        <div class="col-md-12">
                            <label for="review">Write Your Message</label>
                            <textarea class="form-control" placeholder="Write Your Message"
                                id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-solid" type="submit">Send Your Message</button>
                        </div>
                    </div>
                </form>
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