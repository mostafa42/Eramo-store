@extends('user.layout.guest')

@section('content')

    <!-- section start -->
    <section class="compare-section section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($compare_list->count() == 0)
                        <h3 style="text-align: center">empty compare list</h3>
                    @else
                        <div class="slide-4 no-arrow">

                            @foreach ($compare_list as $compare_list)
                                <div>
                                    <div class="compare-part">
                                        <button type="button" class="close-btn">
                                            <a href="{{ url('delete-item-compare/' . $compare_list->id) }}"><span
                                                    aria-hidden="true">×</span></a>
                                        </button>
                                        <div class="img-secton">
                                            <div>
                                                <img src="{{ $compare_list->product->primary_image_url }}"
                                                    class="img-fluid blur-up lazyload bg-img" alt="">
                                            </div>
                                            <a href="#">
                                                <h5>{{ $compare_list->product->title_en }}</h5>
                                            </a>
                                            <h5>{{ $compare_list->product->real_price }} EG</h5>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>description</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>{{ $compare_list->product->description ? $compare_list->product->description : 'no description' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>Category</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>{{ $compare_list->product->category->title_en }}</p>
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>size</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>XL, L, M, S, XS</p>
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>color</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>Red , Blue , Pink</p>
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>material</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>cotton</p>
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>availability</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>{{ $compare_list->product->stock > 0 ? 'In Stock' : 'Out Of Stock' }}</p>
                                            </div>
                                        </div>
                                        <div class="btn-part">
                                            @if ($compare_list->product->stock > 0)
                                                <a href="#" class="btn btn-solid">add to cart</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
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
                                                src="../assets/images/store/google.png" class="img-fluid"
                                                alt=""></a></li>
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
                                        <li><a
                                                href="{{ $my_account_section->link_en }}">{{ $my_account_section->title_en }}</a>
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
                                        <li><i class="fa fa-envelope"></i>Email Us: <a
                                                href="{{ $store_info->email }}">{{ $store_info->email }}</a>
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

@endsection
