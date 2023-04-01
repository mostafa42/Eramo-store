@extends('user.layout.guest')

@section('content')

<!-- section start -->
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="top-banner-wrapper">
                            <a><img src="{{ $sub_category->image_url }}" class="img-fluid blur-up lazyload" width="100%"
                                    style="height: 300px"></a>
                            <div class="top-banner-content small-section">
                                <h4>{{ $sub_category->title_en }}</h4>
                                <p> {{ $sub_category->description_en }} </p>
                            </div>
                        </div>
                        <div class="collection-product-wrapper">
                            <div class="product-top-filter">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product-filter-content">
                                            <div class="collection-grid-view">

                                            </div>
                                            <div class="collection-grid-view">
                                                <ul>
                                                    <li><img src="../assets/images/icon/2.png" alt=""
                                                            class="product-2-layout-view"></li>
                                                    <li><img src="../assets/images/icon/3.png" alt=""
                                                            class="product-3-layout-view"></li>
                                                    <li><img src="../assets/images/icon/4.png" alt=""
                                                            class="product-4-layout-view"></li>
                                                    <li><img src="../assets/images/icon/6.png" alt=""
                                                            class="product-6-layout-view"></li>
                                                </ul>
                                            </div>
                                            <div class="product-page-filter">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrapper-grid">
                                <div class="row margin-res">
                                    @if ($sub_category->products->count() > 0)
                                    @foreach ($sub_category->products as $product)
                                    <div class="col-lg-4 col-6 col-grid-box">
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href="#"><img src="{{ $product->primary_image_url }}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                <div class="back">
                                                    <a href="#"><img src="{{ $product->primary_image_url }}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <button onclick="add_to_cart_list({{ $product->id }})"
                                                        title="Add to cart"><i class="ti-shopping-cart"></i></button> 
                                                        <a href="javascript:void(0)" title="Add to Wishlist" onclick="add_to_wishlist({{ $product->id }})"><i
                                                            class="ti-heart" aria-hidden="true"></i></a> 
                                                            <a onclick="add_to_compare_list({{ $product->id }})" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <div>
                                                    <a href="product-page(no-sidebar).html">
                                                        <h6>{{ $product->title_en }}</h6>
                                                    </a>
                                                    <h6>{{ $product->category->title_en }}</h6>
                                                    <p>{{ $product->description_en }}</p>
                                                    <h4> {{ $product->real_price }} EG <span></span> <del>{{
                                                            $product->fake_price >= $product->real_price ? "" :
                                                            $product->fake_price . "EG" }} </del> </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <h3 style="margin-top: 30px; text-align: center">No Products</h3>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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